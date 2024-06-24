<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BaseService
{
    protected $VNPAY_URL = 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html';
    protected $VNPAY_RETURN_URL = 'http://localhost:8000/resultView';
    protected $VNPAY_TMNCODE = 'PYY55LE8';
    protected $VNPAY_HASH_SECRET = 'JEBPLUFFDQLMZCCGNKWFJXOBIHBISEST';
    protected $VNPAY_ORDER_INFO = 'Noi dung thanh toan';
    protected $VNPAY_ORDER_TYPE = 'billpayment';
    protected $VNPAY_BANK_CODE = 'NCB';
}