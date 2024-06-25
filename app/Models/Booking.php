<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        "transaction_id",
        "room_id", 
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

    public function room()
    {
        return $this->hasOne(Room::class, "id", "room_id");
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class, "id", "transaction_id");
    }

    public function coupon()
    {
        return $this->hasOne(Coupon::class, "id", "coupon_id");
    }
}
