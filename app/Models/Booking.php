<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        "transaction_id",
        "room_id", 
        "user_id", 
        "coupon_id",
        "fullname",
        "booking_code",
        "email",
        "address", 
        "city",
        "zip_code",
        "country",
        "phone_number",
        "special_request", 
        "arrival_time",
        "status",
        "start_date",
        "end_date",
        "total_price",
        "room_quantity"
    ];

    public function coupon()
    {
        return $this->hasOne(Coupon::class, "id", "coupon_id");
    }

    public function room() :HasOne
    {
        return $this->hasOne(Room::class, 'id', 'room_id');
    }
}
