<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BaseService
{
    protected $VNPAY_URL = 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html';
    protected $VNPAY_RETURN_URL = 'http://localhost:8000/resultView';
    protected $VNPAY_TMNCODE = '95DAANF8';
    protected $VNPAY_HASH_SECRET = '8J6GSCA6D9C03RU09ISN6TH33LPTEZSG';
    protected $VNPAY_ORDER_INFO = 'Noi dung thanh toan';
    protected $VNPAY_ORDER_TYPE = 'billpayment';
    protected $VNPAY_BANK_CODE = 'NCB';
}