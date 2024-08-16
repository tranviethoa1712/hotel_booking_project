<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponAdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupon.show', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCouponRequest $request)
    {
        $data = $request->validated();
        $data['code'] = str()->random();

        if(Coupon::create($data)) {
            return redirect()->back()->with('message', 'Create Coupon Successfully!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCouponRequest $request, string $id)
    {
        $data = $request->validated();

        $coupon = Coupon::find($id);

        // check if start_at and expired_at are empty
        if(empty($data['start_at'])) {
            $data['start_at'] = $coupon['start_at'];
        }
        if(empty($data['expired_at'])) {
            $data['expired_at'] = $coupon['expired_at'];
        }

        $data['updated_at'] = Carbon::now();

        // update
        if($coupon->update($data)) {
            return redirect()->back()->with('message', 'Coupon was updated!');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $coupon = Coupon::find($id);
        $code = $coupon->code;
        if($coupon->delete()){
            return redirect()->back()->with('message', "Voucher \"$code\" was deleted!");
        }
        return redirect()->back()->with('failed', "Voucher \"$code\" was not deleted! Something is wrong.");
    }
}