<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\CarController;

use App\Models\Goods;
use App\Models\Address;
use App\Models\Orders;

use App\Models\Orderinfo;
use Illuminate\Support\Facades\DB;
use Hash;


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

    	}else{
    		$data = [];
    		// return view('home.car.empty');
    	}
        if(empty($_SESSION['address'])){
            $_SESSION['address'] = DB::table('address')->where('uid',$_SESSION['user']->id)->first();
            
        }

    	//总价格
    	$pricecount = CarController::priceCount();
        //收货地址
        $address = Address::where('uid',$_SESSION['user']->id)->get();

    	return view('home.order.account',['data'=>$data,'pricecount'=>$pricecount,'address'=>$address]);
    }

    public function pay(Request $request)
    {
        // dd($request->all());
        $liuyan = $request->liuyan;
        //设置单号
        $order = rand(100000000,999999999);
        return view('home.order.pay',['order'=>$order,'liuyan'=>$liuyan]);

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
        // $_SESSION['address']=Address::where('id',$request->id)->first();
        $_SESSION['address']=DB::table('address')->where('id',$request->id)->first();
        // dd($_SESSION['address']);
        return back();
    }   
    //支付成功
    public function success(Request $request)
    {   
        // dd($request->all());
        $pass = DB::table('users_pay')->where('uid',$_SESSION['user']->id)->first();
        if($request->pay == null){
             echo "<script>alert('请选择支付方式')</script>";
            return redirect('/home/order/account');
        }
        if(!Hash::check($request->pass,$pass->pay)){
            echo "<script>alert('支付密码不正确')</script>";
            return redirect('/home/order/account');
        }
        //价格
        $pricecount = CarController::priceCount();
        //数量
         //已选商品
        $goods = 0;
        foreach($_SESSION['car'] as $k=> $v)
        {
            if($v->select==1){
                $goods+=$v->num;
            }
        }
        $order = new Orders;
        $order->order = $request->input('order');
        $order->uid = $_SESSION['user']->id;
        $order->price = $pricecount;
        $order->num = $goods;
        $order->addr = $_SESSION['address']->addr;
        $order->uname = $_SESSION['address']->uname;
        $order->phone = $_SESSION['address']->phone;
        $order->pay = $request->pay;
        $order->liuyan = $request->input('liuyan');
        if($order->save()){
            //减少库存
            foreach($_SESSION['car'] as $k=> $v)
            {
                if($v->select==1){
                    $goods = Goods::find($v->id);
                    // dump($goods);
                    $goods->num = $goods->num-1;
                    $goods->save();

                     //订单详情
                    $orderinfo = new Orderinfo;
                    $orderinfo->oid = $order->id;
                    $orderinfo->gid = $v->id;
                    $orderinfo->num = $v->num;
                    $orderinfo->save();

                }
            }
           
            return redirect('/home/order/over');
        }
    }
    public function over()
    {
        //价格
            

        $pricecount = CarController::priceCount();
        return view('home.order.success',['pricecount'=>$pricecount]);
    }

}
