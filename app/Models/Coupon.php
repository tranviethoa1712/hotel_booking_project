<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'code',
        'value',
        'amount',
        'type',
        'uses',
        'max_uses',
        'max_uses_user',
        'start_at',
        'expired_at',
        'updated_at'
    ];
}
