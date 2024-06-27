<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingUserController
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService;
    }

    /**
     * Booking Details
     */
    public function viewBookingDetails($booking_id)
    {
        $booking = Booking::find($booking_id);

        return view('home.viewBookingDetails', [
            'booking' => $booking,
        ]);
    }

    public function book_room(BookingRequest $request)
    {
        $data = $request->validated();
        $data['vnpay'] = true;
        return $this->userService->vnpayProcessing($data);
    }

    public function resultView(Request $request)
    {
        $result = $this->userService->checkVnpayReturn($request);
        if ($result['messageCode'] == "00") {

            $booking = Booking::select('id')->where('booking_code', '5465')->get();
            $booking_id = '';
            foreach($booking as $id)
            {
                $booking_id = $id->id;
            }
            return view('home.resultBookingView', compact('booking_id'));
        } else {
            echo "failed";
        }
    }

    public function my_booking() 
    {
        $user = Auth::user();
        $bookingUser = $user->bookings->where('end_date', '>', date('Y-m-d H:i:s'));

        return view('home.my_bookings', [
            'bookings' => $bookingUser,
        ]);
    }
}
