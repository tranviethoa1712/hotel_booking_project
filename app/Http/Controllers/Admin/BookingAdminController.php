<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingAdminController
{
    /**
     * Manage bookings
     */
    public function bookings()
    {
        $bookings = Booking::all();
        return view('admin.bookings', compact('bookings'));  
    }

    public function book_room(BookingRequest $request)
    {
        $data = $request->validated();
        // check booked room on the date
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];
        
        $isBooked = Booking::where('status', '!=', 'reject')
        ->where('room_id', $data['room_id'])
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

    /**
     * Remove the booking.
     */
    public function delete_booking($id)
    {
        $booking = Booking::find($id);
        $name = $booking->name;
        $arrival_date = $booking->start_date;
        $leaving_date = $booking->end_date;
        $booking->delete();
        return redirect()->back()->with('message', "Booking of \"$name\" at \"$arrival_date\" to \"$leaving_date\" was deleted!");
    }

    public function status_approve($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'approve';
        $booking_name = $booking->name;
        $booking->save();

        if($booking->save()){
        return redirect()->back()->with('success', "Status booking of \"$booking_name\" was updated!");
        }
        return redirect()->back()->with('error', "Some thing is wrong!");
    }

    public function status_reject($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'reject';
        $booking_name = $booking->name;
        if($booking->save()){
            return redirect()->back()->with('success', "Status booking of \"$booking_name\" was updated!");
        }
        return redirect()->back()->with('error', "Some thing is wrong!");
    }
}
