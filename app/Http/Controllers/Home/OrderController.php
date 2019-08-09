<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\CarController;
use App\Models\Orderinfo;
use Illuminate\Support\Facades\DB;

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
	
	// 订单管理
	public function index()
	{
		$id = $_SESSION['user']->id;
		// dd($id);
		$orders = DB::table('orders')->where('uid',$id)->get();
		// dd($orders);
		$aa = DB::table('orders')->first();
		// dd($aa->id);
		$data = Orderinfo::where('oid',$aa->id)->get();
		// dd($data);
		return view('home.order.index',['data'=>$data,'orders'=>$orders]);
	}
}
