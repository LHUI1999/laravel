<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CenterController extends Controller
{
    //个人中心首页
    public function index()
    {
    	return view('home.center.index');
    }

}
