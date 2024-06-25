<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "booking_code", 
        "bank_code", 
        "bank_tran_no",
        "transaction_no",
        "content",
        "amount",
        "pay_date", 
    ];
}
