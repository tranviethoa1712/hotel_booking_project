<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function book_room(BookingRequest $request)
    {
        $data = $request->validated();

        // check booked room on the date
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];

        $isBooked = Booking::where('room_id', $data['room_id'])
        ->where('start_date', '<=', $end_date)
        ->where('end_date', '>=', $start_date)->exists();

        if($isBooked) {
            return redirect()->back()->with('messageBooked', 'The room is already booked, please try different date');
        } else {
            if(Booking::create($data)){
                return redirect()->back()->with('message', 'Booking success!');
            }
        } 
        return redirect()->back();
    }
}
