<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
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
                return view('home.index');
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
        return view('home.index');
    }

    public function create_room()
    {
        return view('admin.create_room');
    }

    public function store_room(StoreRoomRequest $request) 
    {
        $data = $request->validated();

        /**
         * @var $image \Illuminate\Http\UploadFile
         */
        $image = $data['image'] ?? null;
        // $image = $request->image ?? null;
        if($image) {
            $generatedImageName = 'admin/' . time() . '-' 
            . $image->getClientOriginalName();

            //move to a folder
            $image->move(('storage/admin'), $generatedImageName);
        }
        
        $data['image'] = $generatedImageName;
        $room = new Room;
 
        if($room->create($data)) {
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
        $room->delete();
        $image_path = public_path('storage') . '/'. $room->image;
        File::delete($image_path);
        return to_route('admin.view_room')->with('success', "Room \"$name\" was deleted!");
    }
}
