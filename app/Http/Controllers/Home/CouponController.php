<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    // 优惠券
    public function index()
    {
        return view('home.coupon.index');
    }
}
