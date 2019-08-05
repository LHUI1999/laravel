<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\CarController;

class OrderController extends Controller
{
    //结算页面
    public function account()
    {
    	if(!empty($_SESSION['car'])){
    		$data = $_SESSION['car'];
    	}else{
    		$data = [];
    		// return view('home.car.empty');
    	}
    	//总价格
    	$pricecount = CarController::priceCount();
    	return view('home.order.account',['data'=>$data,'pricecount'=>$pricecount]);
    }

    public function pay(Request $request)
    {
    	//检测登录
    	// if(session('home_login')){

    	// }

    	//检查地址
    	dump($request->all());
    }
}
