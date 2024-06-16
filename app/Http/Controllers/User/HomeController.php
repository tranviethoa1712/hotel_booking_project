<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\AvailableRoomForTheDayRequest;
use App\Http\Requests\BookingNeedsOfCustomer;
use App\Http\Requests\SendContactRequest;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\Gallery;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class HomeController
{
    public function room_details($id)
    {
        $room = Room::find($id);

        $user = User::find(Auth::id());

        // collect coupon_id that user using
        $couponsOfUser = $user->coupons;
        $coupons = [];
        foreach ($couponsOfUser as $coupon) {
            $coupons[] = Coupon::get()->where('id', $coupon->pivot->coupon_id);
        }
        if($coupons) {
            return view('home.room_details', [
                'room' => $room,
                'coupons' => $coupons
            ]);
        }
        return view('home.room_details', [
            'room' => $room,
        ]);

    }

    public function contact(SendContactRequest $request)
    {
        $data = $request->validated();
        if(Contact::create($data)){
            return redirect()->back()->with('message', 'Contact success!');
        }
        return redirect()->back();
    }

    public function our_rooms()
    {
        $rooms = Room::all();
        return view('home.our_rooms', compact('rooms'));
    }

    public function our_galleries()
    {
        $galleries = Gallery::all();
        return view('home.our_galleries', compact('galleries'));
    }

    public function contact_view()
    {
        return view('home.contact_view');
    }

    public function roomAvailableForTheDate(AvailableRoomForTheDayRequest $request)
    {
        $data = $request->validated();
        $start_date = $data['startDate'];
        $end_date = $data['endDate'];
    
        // check Rooms booked
        $isBooked = Booking::where('status', '!=', 'reject')
                        ->where('start_date', '<=', $end_date)
                        ->where('end_date', '>=', $start_date)->exists();
        $room = Room::class;
       
        // if any room booked in that time => filter and return available room
        if($isBooked === true) {
            $bookedRoom = Booking::get()->where('status', '!=' , 'reject')
            ->where('start_date', '<=', $end_date)
            ->where('end_date', '>=', $start_date);
            $arrayIdBookedRoom = [];
            foreach($bookedRoom as $booking) {
                $arrayIdBookedRoom[] = $booking->room_id;
            }
            $roomAvailableForTheDate = Room::get()->whereNotIn('id', $arrayIdBookedRoom);

            if(empty($roomAvailableForTheDate)) {
                return redirect()->back()->with('roomsBooked', 'There is no available room!');
            }
            return redirect('our_rooms')->with('roomAvailableForTheDate', $roomAvailableForTheDate);
        } 
        // else: return all room available
        else {
            $room = Room::all();
            return redirect('our_rooms')->with('allRoomAvailableForTheDate', $room);
        }
    }

    public function changSearchRoom($start_date, $end_date, $room_type)
    {
        // check Rooms booked
        $isBooked = Booking::where('status', '!=', 'reject')
                        ->where('start_date', '<=', $end_date)
                        ->where('end_date', '>=', $start_date)
                        ->exists();
       
        // if any room booked in that time => filter and return available room
        if($isBooked === true) {
            $bookedRoom = Booking::get()->where('status', '!=' , 'reject')
            ->where('start_date', '<=', $end_date)
            ->where('end_date', '>=', $start_date);
            $arrayIdBookedRoom = [];
            foreach($bookedRoom as $booking) {
                $arrayIdBookedRoom[] = $booking->room_id;
            }
            $roomAvailableForTheDate = Room::get()->where('room_type', $room_type)->whereNotIn('id', $arrayIdBookedRoom);

            if(!$roomAvailableForTheDate) {
                return 'All of this ' . $room_type . 'room type is not available from ' . $start_date . ' to ' . $end_date;
            }
            return json_encode($roomAvailableForTheDate);
        } else {
            $roomAvailableForTheDate = Room::get()->where('room_type', $room_type);
            return json_encode($roomAvailableForTheDate);
        }
    }

    public function aboutUs() 
    {
        return view('home.aboutUs');
    }

    public function booking_view(BookingNeedsOfCustomer $request) 
    {
        $data = $request->validated();
        return view('home.booking_view');
    }
}
