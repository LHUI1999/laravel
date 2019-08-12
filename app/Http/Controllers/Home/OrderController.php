<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\CarController;

use App\Models\Goods;
use App\Models\Address;

use App\Models\Orderinfo;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    //结算页面
    public function account()
    {
    	if(!empty($_SESSION['car'])){
            foreach($_SESSION['car'] as $k=>$v){
                if($v->select == '1'){
                    $data[$k] = $v;
                }
            }
    		dump($data);
    	}else{
    		$data = [];
    		// return view('home.car.empty');
    	}
        if(empty($_SESSION['address'])){
            $_SESSION['address'] = Address::where('uid',$_SESSION['user']->id)->first();
            dump($_SESSION['address']);
        }else{
            $_SESSION['address']=[];
        }
        
        // if(!isset($_SESSION['adderss'])){
        // $_SESSION['address']=[];


        // }else{
        //     dump($_SESSION['address']);
        // }
    	//总价格
    	$pricecount = CarController::priceCount();
        //收货地址
        $address = Address::where('uid',$_SESSION['user']->id)->get();
    	return view('home.order.account',['data'=>$data,'pricecount'=>$pricecount,'address'=>$address]);
    }

    public function pay(Request $request)
    {
    	//检测登录
    	// if(session('home_login')){

    	// }

    	//检查地址
    	dump($request->all());

    }

    public function index(Request $request)
    {
        //商品信息
        $data = Goods::where('id',$request->id)->first();
        //收货地址
        $address = Address::where('uid',$_SESSION['user']->id)->get();
        
        return view('home.order.account',['data'=>$data,'address'=>$address]);
    }

    public function addr(Request $request)
    {
        $address = Address::where('id',$request->id)->first();
        // dd($address);
        $_SESSION['address']=$address;
        // dd($_SESSION['address']);
        return back();
    }   

}
