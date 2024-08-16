<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Booking;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_title',
        'image',
        'description',
        'max_guest',
        'number_of_room',
        'price',
        'wifi',
        'room_type'
    ];


    public function booking() :HasMany
    {
        return $this->hasMany(Booking::class);
    }
}