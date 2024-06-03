<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Models\Contact;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);
        return view('home.room_details', compact('room'));
    }

    public function contact(SendContactRequest $request)
    {
        $data = $request->validated();
        if(Contact::create($data)){
            return redirect()->back()->with('message', 'Contact success!');
        }
        return redirect()->back();
    }
}
