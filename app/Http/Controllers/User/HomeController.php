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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class HomeController
{
    public function changeSearchRoom($start_date, $end_date, $room_type)
    {
        $roomAvailableForTheDate = [];  
        $roomAvailableForTheDate = Room::get()->where('room_type', $room_type);

        foreach($roomAvailableForTheDate as $roomAvailable) {
            // calc all quantity to compare in view
            $bookedRoomForId = Booking::all()->where('room_id', $roomAvailable->id)
            ->where('status', '!=' , 'reject')
            ->where('start_date', '<=', $end_date)
            ->where('end_date', '>=', $start_date)
            ->where('end_date', '>' , date('Y-m-d H:i:s'));
            foreach($bookedRoomForId as $booking) {
                $roomAvailable->number_room_booked += $booking->room_quantity;
            }
        }         
        return json_encode($roomAvailableForTheDate);
    }

    public function room_details($id)
    {
        // collect rooms
        $room = Room::find($id);
        $room_type = $room->room_type;
        $start_date = date("Y-m-d H:i:s");
        $end_date = date("Y-m-d H:i:s", strtotime("+2 day"));

        $roomAvailableForTheDate = [];  
        $roomAvailableForTheDate = Room::get()->where('room_type', $room_type);

        foreach($roomAvailableForTheDate as $roomAvailable) {
            // calc all quantity to compare in view
            $bookedRoomForId = Booking::all()->where('room_id', $roomAvailable->id)
            ->where('status', '!=' , 'reject')
            ->where('start_date', '<=', $end_date)
            ->where('end_date', '>=',$start_date)
            ->where('end_date', '>' , date('Y-m-d H:i:s'));
            foreach($bookedRoomForId as $booking) {
                $roomAvailable->number_room_booked += $booking->room_quantity;
            }
        }            

        // collect coupon_id that user using
        $user = User::find(Auth::id());
        if($roomAvailableForTheDate) {
            if($user) {
                $couponsOfUser = $user->coupons
                ->where('expired_at', '>', date('Y-m-d H:i:s'))
                ;
                $coupons = [];
 
                foreach ($couponsOfUser as $coupon) {
                    $checkStatus = DB::table('user_coupons')
                    ->where('coupon_id', $coupon->pivot->coupon_id)
                    ->where('user_id', Auth::id())
                    ->get();
                
                    if($checkStatus[0]->status == 'unused') {
                        $coupons[] = DB::table('coupons')
                        ->where('id', $coupon->pivot->coupon_id)
                        ->get();
                    } 
                }

                if($coupons) {    
                    return view('home.room_details', [
                        'rooms' => $roomAvailableForTheDate,
                        'room' => $room,
                        'coupons' => $coupons,
                        'start_date' => $start_date,
                        'end_date' => $end_date
                    ]);
                } else {
                    return view('home.room_details', [
                        'rooms' => $roomAvailableForTheDate,
                        'room' => $room,
                        'start_date' => $start_date,
                        'end_date' => $end_date
                    ]);
                }
            }
            return view('home.room_details', [
                'rooms' => $roomAvailableForTheDate,
                'room' => $room,
                'start_date' => $start_date,
                'end_date' => $end_date
            ]);
        }
        return view('home.room_details', [
            'fullRooms' => 'Please choose another date!',
            'room' => $room,
            'start_date' => $start_date,
            'end_date' => $end_date
        ]);
    }

    public function roomAvailableForTheDate(AvailableRoomForTheDayRequest $request)
    {
        $data = $request->validated();
        $start_date = $data['startDate'];
        $end_date = $data['endDate'];
        $room_type = $data['room_type'];
    
        $roomAvailableForTheDate = [];  
        $roomAvailableForTheDate = Room::get()->where('room_type', $room_type);

        foreach($roomAvailableForTheDate as $roomAvailable) {
            // calc all quantity to compare in view
            $bookedRoomForId = Booking::all()->where('room_id', $roomAvailable->id)
            ->where('status', '!=' , 'reject')
            ->where('start_date', '<=', $end_date)
            ->where('end_date', '>=',$start_date)
            ->where('end_date', '>' , date('Y-m-d H:i:s'));
            foreach($bookedRoomForId as $booking) {
                $roomAvailable->number_room_booked += $booking->room_quantity;
            }
        }
        
        return redirect('our_rooms')->with('roomAvailableForTheDate', $roomAvailableForTheDate);
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

    public function aboutUs() 
    {
        return view('home.aboutUs');
    }

    public function booking_view(BookingNeedsOfCustomer $request) 
    {
        $data_get = $request->  validated();
        $data_get['startDate'] = $data_get['startDateHidden'];
        $data_get['endDate'] = $data_get['endDateHidden'];
        $data_get['startDateHidden'] = date('D d M Y', strtotime($data_get['startDateHidden']));
        $data_get['endDateHidden'] = date('D d M Y', strtotime($data_get['endDateHidden']));
        $room = Room::find($data_get['roomIdUsed']);

        return view('home.booking_view', [
            'data_get' => $data_get,
            'room_type' => $room->room_type,
            'max_guest' => $room->max_guest
        ]);
    }
}
