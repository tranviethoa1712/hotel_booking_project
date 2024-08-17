<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\AvailableRoomForTheDayRequest;
use App\Http\Requests\SendContactRequest;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Room;
use App\Services\UserService;

class HomeController
{
    private $userService;
    public function __construct()
    {
        $this->userService = new UserService;
    }
    public function changeSearchRoom($start_date, $end_date, $room_type)
    {
        $roomAvailableForTheDate = $this->userService->roomTypeSearch($start_date, $end_date, $room_type);
        return json_encode($roomAvailableForTheDate);
    }

    public function room_details($id)
    {
        return $this->userService->getRoomDetailAndAllRoomTypeRelevant($id);
    }

    public function roomAvailableForTheDate(AvailableRoomForTheDayRequest $request)
    {
        $data = $request->validated();
        $roomAvailableForTheDate = $this->userService->roomAvailableForTheDate($data);

        return redirect('our_rooms')->with('roomAvailableForTheDate', $roomAvailableForTheDate);
    }

    public function contact(SendContactRequest $request)
    {
        $data = $request->validated();
        if (Contact::create($data)) {
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
}