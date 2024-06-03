<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id()) 
        {
            $usertype = Auth()->user()->usertype;
            if($usertype == 'user') 
            {
                $galleries = Gallery::all();
                $rooms = Room::all();
                return view('home.index', compact('rooms', 'galleries'));
            } 
            else if($usertype == 'admin')
            {
                return view('admin.index');
            }
            else 
            {
                return redirect()->back();
            }
        }
    }

    public function home()
    {
        $rooms = Room::all();
        $galleries = Gallery::all();
        return view('home.index', compact('rooms', 'galleries'));
    }

    public function create_room()
    {
        return view('admin.create_room');
    }

    public function store_room(StoreRoomRequest $request) 
    {
        $data = $request->validated();

        $image = $data['image'] ?? null;
        $generatedImageName = '';
        if($image) {
            $generatedImageName = 'admin/' . time() . '-' 
            . $image->getClientOriginalName();

            //move to a folder
            $image->move(('storage/admin'), $generatedImageName);
        }
        
        $data['image'] = $generatedImageName;
 
        if(Room::create($data)) {
            return redirect()->back()->with('message', 'Room was created!');
        } else {
            return redirect()->back();
        }
    }

    public function view_room()
    {
        $rooms = Room::all();
        return view('admin.view_room', compact('rooms'));
    }

    public function edit_room($id)
    {
        $room = Room::find($id);
        return view('admin.edit_room', compact('room'));
    }

     /**
     * Update the specified resource in storage.
     */
    public function update_room(UpdateRoomRequest $request, $id)
    {
        $data = $request->validated();
        $room = Room::find($id);

        /**
         * @var $image \Illuminate\Http\UploadFile
         */
        $image = $data['image'] ?? null;
        if($image) {
            $generatedImageName = 'admin/' . time() . '-' 
            . $image->getClientOriginalName();
            
            //move to a folder
            $image->move(('storage/admin'), $generatedImageName);
            if ($room->image) {
                $image_path = public_path('storage') . '/'. $room->image;
                File::delete($image_path);
            }
        } else {
            $generatedImageName = $room->image;
        }
        
        $data['image'] =  $generatedImageName;
        if($room->update($data)) {
            return redirect()->back()->with('message', 'Room was updated!');
        } else {
            return redirect()->back();;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete_room($id)
    {
        $room = Room::find($id);
        $name = $room->room_title;
        $image_path = public_path('storage') . '/'. $room->image;
        $room->delete();
        File::delete($image_path);
        return to_route('admin.view_room')->with('success', "Room \"$name\" was deleted!");
    }

    public function bookings()
    {
        $bookings = Booking::all();
        return view('admin.bookings', compact('bookings'));  
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

    // Gallery
    public function gallery()
    {
        $galleries = Gallery::all();
        return view('admin.gallery', compact('galleries'));
    }

    public function store_gallery(StoreGalleryRequest $request) 
    {
        $data = $request->validated();
        $image = $data['image'] ?? null;
        $generatedImageName = '';
        if($image) {
            $generatedImageName = 'gallery/' . time() . '-' 
            . $image->getClientOriginalName();
            //move to a folder
            $image->move(('storage/gallery'), $generatedImageName);
        }
        $data['image'] = $generatedImageName;
        $gallery = new Gallery;
        if($gallery->create($data)) {
            return redirect()->back()->with('message', "Create gallery successfully!");
        } 
        return redirect()->back();
    }

    public function delete_gallery($id)
    {
        $gallery = Gallery::find($id);
        $image_path = public_path('storage') . '/'. $gallery->image;
        $gallery->delete();
        File::delete($image_path);
        return redirect()->back()->with('message', "The gallery was deleted!");
    }

    public function contacts()
    {
        $contacts = Contact::all();
        return view('admin.contacts', compact('contacts'));
    }

    public function send_mail($id )
    {
        $data = Contact::find($id);
        return view('admin.send_mail', compact('data'));
    }


}
