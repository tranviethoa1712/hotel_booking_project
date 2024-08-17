<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use Illuminate\Support\Facades\File;

class RoomAdminController extends BaseAdminController
{
    /**
     * Manage Rooms
     */

    public function create()
    {
        return view('admin.room.create_room');
    }
    
    public function store(StoreRoomRequest $request) 
    {
        $data = $request->validated();
        $image = $data['image'] ?? null;

        $generatedImageName = '';
        if($image) {
            $generatedImageName = 'admin/' . time() . '-' 
            . $image->getClientOriginalName();
            //move to a folder
            $image->move('storage/admin/',  $generatedImageName);
        }       
        $data['image'] = $generatedImageName;
        if(Room::create($data)) {
            return redirect()->back()->with('message', 'Room was created!');
        } else {
            return redirect()->back();
        }
    }

    public function getAll()
    {
        $rooms = Room::all();
        return view('admin.room.view_room', compact('rooms'));
    }

    /**
     * edit room view
     */
    public function update($id)
    {
        $room = Room::find($id);
        return view('admin.room.edit_room', compact('room'));
    }

    /**
     * update room
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
            return redirect()->back();
        }
    }

    /**
     * delete room
     */
    public function delete($id)
    {
        $room = Room::find($id);
        $name = $room->room_title;
        $image_path = public_path('storage') . '/'. $room->image;
        $room->delete();
        File::delete($image_path);
        return to_route('admin.room.view_room')->with('success', "Room \"$name\" was deleted!");
    }
}