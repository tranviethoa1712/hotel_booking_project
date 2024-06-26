<?php

namespace App\Http\Controllers\User;

use App\Models\Coupon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CouponController 
{
    public function index()
    {
        $user = User::find(Auth::id());
        $coupons = DB::table('coupons')
        ->where('expired_at', '>', date('Y-m-d H:i:s'))
        ->whereRaw('uses <= max_uses')
        ->get();
        // collect coupon_id that user using
        $couponsOfUser = $user->coupons;
        $couponIdArray = [];
        
        foreach ($couponsOfUser as $coupon) {
            $couponIdArray[] = $coupon->pivot->coupon_id;
        }

        if($couponIdArray) {
            return view('home.coupon_view', [
                'couponIdArray' => $couponIdArray,
                'coupons' => $coupons
            ]);
        }

        return view('home.coupon_view', compact('coupons'));
    }

    public function getCouponsOfUser() 
    {
        $user = User::find(Auth::id());

        // collect coupon_id that user using
        $couponsOfUser = $user->coupons->where();
        
        $coupons = [];
        foreach ($couponsOfUser as $coupon) {
            $coupons[] = Coupon::get()->where('id', $coupon->pivot->coupon_id);
        }
    }

    public function couponToUser($id)
    {
        $user_id = Auth::id();
        $insertToCouponUser = DB::insert('insert into user_coupons (user_id, coupon_id) values (?, ?)', [$user_id, $id]);
        if($insertToCouponUser) {
            return 'success';
        }
        return 'false';
    }
}
