<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreGalleryRequest;
use App\Models\Gallery;
use App\Models\Room;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController
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
}
