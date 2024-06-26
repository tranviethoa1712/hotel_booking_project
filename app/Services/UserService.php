<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Coupon;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserService extends BaseService
{
    protected $user_id;
    public function __construct()
    {
        $this->user_id = User::find(Auth::id());
    }

    public function vnpayProcessing($requestData)
    {
        // thông tin khách hàng
        $fullname = $requestData['fullname'];
        $email = $requestData['email'];
        $address = $requestData['address'];
        $phoneNumber = $requestData['phone_number'];
        $totalPrice = $requestData['total_price']; 

        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        
        $vnpUrl = $this->VNPAY_URL;
        $vnpReturnurl = $this->VNPAY_RETURN_URL;
        $vnpTmnCode = $this->VNPAY_TMNCODE;//Mã website tại VNPAY 
        $vnpHashSecret = $this->VNPAY_HASH_SECRET; //Chuỗi bí mật
        
        $vnpTxnRef = rand(00, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này 
    
        $vnpOrderInfo = strtoupper($fullname . 'chuyen khoan');
        $vnpOrderType = $this->VNPAY_ORDER_TYPE;
        $vnpAmount = $totalPrice * 100;
        $vnpLocale = 'vn';
        $vnpBankCode = $this->VNPAY_BANK_CODE;
        $vnpIpAddr = $_SERVER['REMOTE_ADDR'];
        $vnpBillFirstName = '';
        $vnpBillLastName = '';

        if (isset($fullname) && trim($fullname) != '') {
            $name = explode(' ', $fullname);
            $vnpBillFirstName = array_shift($name);
            $vnpBillLastName = array_pop($name);
        }

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnpTmnCode,
            "vnp_Amount" => $vnpAmount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnpIpAddr,
            "vnp_Locale" => $vnpLocale,
            "vnp_OrderInfo" => $vnpOrderInfo,
            "vnp_OrderType" => $vnpOrderType,
            "vnp_ReturnUrl" => $vnpReturnurl,
            "vnp_TxnRef" => $vnpTxnRef,
            "vnp_Bill_FirstName" => $vnpBillFirstName,
            "vnp_Bill_LastName" => $vnpBillLastName,
            "vnp_Bill_Email" => $email,
            "vnp_Bill_Address" => $address,
            "vnp_Bill_Mobile" => $phoneNumber,
        );
        
        if (isset($vnpBankCode) && $vnpBankCode != "") {
            $inputData['vnp_BankCode'] = $vnpBankCode;
        }
        
        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnpUrl = $vnpUrl . "?" . $query;
        if (isset($vnpHashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnpHashSecret);//  
            $vnpUrl .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnpUrl);
            if ($requestData['vnpay']) {
                $this->submitBooking($requestData, $vnpTxnRef);
                header('location: ' . $vnpUrl);
                die();
            } else {
                echo json_encode($returnData);
            }
    }

    public function submitBooking($data, $vnpTxnRef)
    {
        // check booked room on the date
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];

        $data['status'] = 'waiting';
        $data['booking_code'] = $vnpTxnRef;
        $data['user_id'] = $this->user_id->id;
        
        $isBooked = Booking::where('status', '!=', 'reject')
        ->where('room_id', $data['room_id'])
        ->where('start_date', '<=', $end_date)
        ->where('end_date', '>=', $start_date)->exists();
    
        if($isBooked) {
            return redirect('user.our_rooms', $data['room_id'])->with('messageBooked', 'The room is already booked, please try different date');
        } else {
            if(Booking::create($data)){
                //update status voucher used in user_coupons table
                $coupon = Coupon::find($data['coupon_id']);
                $coupon->uses = $coupon->uses + 1;
                $coupon->save();
                DB::update(
                    'update user_coupons set status = ? where user_id = ? and coupon_id = ?',
                    ['used', Auth::id(), $data['coupon_id']]
                );
            } else {
                return redirect()->back()->with('message', 'Booking failed!');
            }
        } 
        return redirect()->back();
    }

    public function submitTransaction($bookingCode, $vnpBankCode, $vnpBankTranNo, $vnpTranNo, $vnpOrderInfo, $vnpAmount, $vnpPayDate)
    {
        $data = [];
        $data['booking_code'] = $bookingCode;
        $data['bank_code'] = $vnpBankCode;
        $data['bank_tran_no'] = $vnpBankTranNo;
        $data['transaction_no'] = $vnpTranNo;
        $data['content'] = $vnpOrderInfo;
        $data['amount'] = (string)$vnpAmount;
        $data['pay_date'] = $vnpPayDate;
        DB::table('transactions')->insert($data);
    }

        /**
     * vnpay return to result page. Result page do this
     */
    public function checkVnpayReturn($requestData)
    {
        $inputData = array();
        $returnData = array();
        // die(var_dump($requestData->getGet));
        foreach ($requestData->query() as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        $vnpSecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $this->VNPAY_HASH_SECRET);
        
        $vnpTranNo = $inputData['vnp_TransactionNo']; // Mã giao dịch tại VNPAY
        $vnpBankCode = $inputData['vnp_BankCode']; // Ngân hàng thanh toán
        $vnpBankTranNo = $inputData['vnp_BankTranNo']; // Ngân hàng thanh toán
        $vnpAmount = $inputData['vnp_Amount']/100; // Số tiền thanh toán VNPAY phản hồi
        $vnpPayDate = $inputData['vnp_PayDate']; // Số tiền thanh toán VNPAY phản hồi
        $vnpOrderInfo = $inputData['vnp_OrderInfo']; // Số tiền thanh toán VNPAY phản hồi
        
        $status = 0; // Là trạng thái thanh toán của giao dịch chưa có IPN lưu tại hệ thống của merchant chiều khởi tạo URL thanh toán.
        $bookingCode = $inputData['vnp_TxnRef'];
        
            //Check Orderid    
            //Kiểm tra checksum của dữ liệu
            if ($secureHash == $vnpSecureHash) {
                //Lấy thông tin đơn hàng lưu trong Database và kiểm tra trạng thái của đơn hàng, mã đơn hàng là: $orderId            
                //Việc kiểm tra trạng thái của đơn hàng giúp hệ thống không xử lý trùng lặp, xử lý nhiều lần một giao dịch
                //Giả sử: $order = mysqli_fetch_assoc($result);   
        
                $booking = $this->getBooking($bookingCode);

                // die(var_dump($val));                      
                if ($booking != NULL) {
                    foreach($booking as $column) {
                        if($column["total_price"] == $vnpAmount) //Kiểm tra số tiền thanh toán của giao dịch: giả sử số tiền kiểm tra là đúng. ($booking["total_price"] == $vnpAmount)
                        {
                            if ($column["status"] != NULL && $column["status"] == 'waiting') {
                                if ($inputData['vnp_ResponseCode'] == '00' || $inputData['vnp_TransactionStatus'] == '00') {
                                    $status = 1; // Trạng thái thanh toán thành công
                                    // Insert dữ liệu lên db
                                    $this->submitTransaction($bookingCode, $vnpBankCode, $vnpBankTranNo, $vnpTranNo, $vnpOrderInfo, $vnpAmount, $vnpPayDate);
                                } else {
                                    die('loi khac');
                                    $status = 2; // Trạng thái thanh toán thất bại -> lỗi
                                    $returnData['messageCode'] = '404';
                                    $returnData['message'] = 'Thanh toán thất bại!';
                                }
                                // Cập nhật kết quả thanh toán, tình trạng đơn hàng vào DB
                                $this->updateBookingStatus($column["id"], $status); // Update status booking
                                // insert order và online_payment nếu thành công
      
                                //Trả kết quả về cho VNPAY: Website/APP TMĐT ghi nhận yêu cầu thành công                
                                $returnData['messageCode'] = '00';
                                $returnData['message'] = 'Xác nhận thành công!';
                            } else {
                                $returnData['messageCode'] = '02';
                                $returnData['message'] = 'Đơn hàng đã được xác nhận sẵn!';
                            }
                        }
                        else {
                        $returnData['messageCode'] = '04';
                        $returnData['message'] = 'Số tiền hóa đơn không đúng';
                        }
                    }  
                } else {
                    $returnData['messageCode'] = '01';
                    $returnData['message'] = 'Đơn hàng không được tìm thấy';
                }
            } else {
                $returnData['messageCode'] = '97';
                $returnData['message'] = 'Invalid signature';
            }
        //Trả lại VNPAY theo định dạng JSON
        return $returnData;
    }

    public function getBooking($bookingCode)
    {
        $booking = Booking::get()->where('booking_code', $bookingCode);
        return $booking;
    }

    public function updateBookingStatus($booking_id, $status)
    {
        $booking = Booking::find($booking_id);
 
        if($status == 1) {
            $booking->status = 'approve';
        } else {
            $booking->status = 'reject';
        }
        
        $booking->save();
    }
}