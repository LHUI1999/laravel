<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\CarController;
use App\Models\Goods;
use App\Models\Address;
use App\Models\Orders;
use App\Models\Orderinfo;
use DB;
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
    //订单支付页
    public function pay(Request $request)
    {
        //留言
        $liuyan = $request->liuyan;
         $pay = DB::table('users_pay')->where('uid',$_SESSION['user']->id)->first();
        //设置单号

        $order = rand(100000000,999999999);
        return view('home.order.pay',['order'=>$order,'liuyan'=>$liuyan,'pay'=>$pay]);
    }
    //选择地址
    public function addr(Request $request)
    {   
        //查到地址
        $address = Address::where('id',$request->id)->first();
        //将地址写入session
        $_SESSION['address']=DB::table('address')->where('id',$request->id)->first();
        return back();
    }   
    //订单生成
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
        $order->status = 0;
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
    //订单完成
    public function over()
    {
        //价格
        $pricecount = CarController::priceCount();
        return view('home.order.success',['pricecount'=>$pricecount]);
    }
    //待付款
    public function cancel(Request $request)
    {
         //已选商品
        $goods = 0;
        foreach($_SESSION['car'] as $k=> $v)
        {
            if($v->select==1){
                $goods+=$v->num;
            }
        }
        //价格
        $pricecount = CarController::priceCount();

        $order = new Orders;
        $order->order = $request->input('order');
        $order->uid = $_SESSION['user']->id;
        $order->price = $pricecount;
        $order->num = $goods;
        $order->addr = $_SESSION['address']->addr;
        $order->uname = $_SESSION['address']->uname;
        $order->phone = $_SESSION['address']->phone;
        $order->pay = null;
        $order->liuyan = $request->input('liuyan');
        $order->status = 1;
        if($order->save()){
            foreach($_SESSION['car'] as $k=> $v)
            {
                if($v->select==1){
                    //订单详情
                    $orderinfo = new Orderinfo;
                    $orderinfo->oid = $order->id;
                    $orderinfo->gid = $v->id;
                    $orderinfo->num = $v->num;
                    $orderinfo->save();
                }
            }
                    return redirect('/home/car/index');

        }

    }
    //订单管理
     public function index(Request $request)
    {
        //订单
        $order = DB::table('orders')->where('uid',$_SESSION['user']->id)->get();
        foreach($order as $k=>$v){
            //订单详情
            $order[$k]->orderinfo = DB::table('order_info')->where('oid',$v->id)->get();
            foreach($order[$k]->orderinfo as $kk=>$vv){
                //订单商品图片
                $order[$k]->orderinfo[$kk]->pic = DB::table('goods_pic')->select('pic')->where('gid',$vv->gid)->first();
                //订单商品信息
                $order[$k]->orderinfo[$kk]->goods = DB::table('goods')->select('title','price')->where('id',$vv->gid)->first();
                
            }

        }
        return view('home.order.index',['order'=>$order]);
    }
    //删除订单
    public function delorder(Request $request)
    {
        // dump($request->all());
        $order = Orders::where('id',$request->oid)->delete();
        $orderinfo = Orderinfo::where('oid',$request->oid)->delete();
        if($order && $orderinfo){
            return back();
        }
    }
    //一键支付
    public function onepay(Request $request)
    {
        $pay = DB::table('users_pay')->where('uid',$_SESSION['user']->id)->first();
        // dump($pay);
        return view('home.order.onepay',['order'=>$request->order,'pay'=>$pay]);
    }
    //执行一键支付
    public function onesuccess(Request $request)
    {
        //是否选择支付方式
        if($request->pay == null){
             echo "<script>alert('请选择支付方式')</script>";
            return back();
        }
        //支付密码是否正确
        $pass = DB::table('users_pay')->where('uid',$_SESSION['user']->id)->first();
        if(!Hash::check($request->pass,$pass->pay)){
            echo "<script>alert('支付密码不正确')</script>";
            return back();
        }
        //修改订单状态
        $order = Orders::where('order',$request->order)->first();
        $order->status = 0;
        if($order->save()){
            echo "<script>alert('支付成功')</script>";
            return redirect('/home/order');
        }
    }
    //确认收货
    public function takeorder(Request $request) 
    {
        //修改订单状态
        $order = Orders::where('id',$request->oid)->first();
        $order->status = 3;
        if($order->save()){
            echo "<script>alert('收货成功')</script>";
            return redirect('/home/order');
        }
    }

}
