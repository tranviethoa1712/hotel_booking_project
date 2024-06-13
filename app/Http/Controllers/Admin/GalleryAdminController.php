<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreGalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryAdminController extends BaseAdminController
{
    /**
     * Manage gallery
     */
    
    public function create()
    {
        $galleries = Gallery::all();
        return view('admin.gallery', compact('galleries'));
    }
    
    public function getAll()
    {
        //
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

    public function update($item)
    {
        //
    }

    public function delete($id)
    {
        $gallery = Gallery::find($id);
        $image_path = public_path('storage') . '/'. $gallery->image;
        $gallery->delete();
        File::delete($image_path);
        return redirect()->back()->with('message', "The gallery was deleted!");
    }
}
