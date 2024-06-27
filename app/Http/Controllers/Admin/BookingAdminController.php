<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Room;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingAdminController
{
    /**
     * Manage bookings
     */
    public function bookings()
    {
        $bookings = Booking::all();
        return view('admin.booking.bookings', compact('bookings'));  
    }

    /**
     * Booking Details
     */
    public function view_booking_details($booking_id)
    {
        $booking = Booking::find($booking_id);

        return view('admin.booking.view_booking_details', [
            'booking' => $booking
        ]);
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
