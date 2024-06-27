<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\StoreGalleryRequest;
use App\Models\Gallery;
use App\Models\Room;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;

class AdminController extends BaseAdminController
{
    protected $auth;

    public function __construct() {
        $this->auth = auth()->user();
    }
    public function index()
    {
        if(Auth::id()) 
        {
            $usertype = Auth()->user()->usertype;
            if($usertype == 'user') 
            {
                $galleries = Gallery::all();
                $rooms = Room::all();
                return view("home.index", [
                    "galleries" => $galleries,
                    'rooms' => $rooms,
                    'queryParams' => request()->query() ?: null,
                    'message' => session('message')
                ]);
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
        $galleries = Gallery::all();
        $rooms = Room::all();
        return view("home.index", [
            "galleries" => $galleries,
            'rooms' => $rooms,
            'queryParams' => request()->query() ?: null,
            'message' => session('message')
        ]);
    }

    public function create()
    {
        //
    }
    public function getAll() 
    {
        //
    }
    public function update($item) 
    {
        //
    }
    public function delete($item) 
    {
        //
    }

    public function transactions()
    {
        $transactions = Transaction::all();
        foreach($transactions as $transaction) {
            $convertPaydateTime = strtotime($transaction->pay_date);
            $transaction->pay_date = date('Y-m-d',$convertPaydateTime);
        }

        return view('admin.transactions', compact('transactions'));
    }
}
