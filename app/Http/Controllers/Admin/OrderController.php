<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Goodspic;
use App\Models\Orderinfo;
use App\Models\Orders;
use App\Models\Refund;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //待发货
    public function sendorder(Request $request)
    {
        $search=$request->input('search','');
        $data = DB::table('orders')->where('order','like','%'.$search.'%')->where('status',0)->paginate(1);
        // $data = DB::table('orders')->where('status',0)->get();
        // dd($data);
        return view('admin.order.sendorder',['data'=>$data,'requests'=>$request->input()]);
    }

    //订单详情
    public function orderinfo(Request $request)
    {
        $data = Orderinfo::where('oid',$request->id)->get();
        foreach($data as $k=>$v){
            //商品详情
            $data[$k]['goods']=Goods::select('title','price')->where('id',$v->gid)->first();

            //商品图片
            $data[$k]['goodspic']=Goodspic::select('pic')->where('gid',$v->gid)->first();
        }

        return view('admin.order.orderinfo',['data'=>$data]);
    }
    //已发货
    public function send(Request $request)
    {
        // 更改订单状态
        $send = Orders::find($request->id);
        $send->status = 2;
        if($send->save())
        {
            echo "<script>alert('发货成功');location.href='/admin/order/sendorder'</script>";
        }

    }

    // 待付款
    public function payorder(Request $request)
    {
        $search=$request->input('search','');
        $data = DB::table('orders')->where('order','like','%'.$search.'%')->where('status',1)->paginate(1);

        return view('admin.order.payorder',['data'=>$data,'requests'=>$request->input()]);
    }
    
    // 待付款订单详情
    public function payinfo(Request $request)
    {
        $data = Orderinfo::where('oid',$request->id)->get();
        foreach($data as $k=>$v){
            //商品详情
            $data[$k]['goods']=Goods::select('title','price')->where('id',$v->gid)->first();

            //商品图片
            $data[$k]['goodspic']=Goodspic::select('pic')->where('gid',$v->gid)->first();
        }
        // dd($data);
        
        return view('admin.order.payinfo',['data'=>$data]);
    }

    // 待收货
    public function overorder(Request $request)
    {
        $search=$request->input('search','');
        $data = DB::table('orders')->where('order','like','%'.$search.'%')->where('status',2)->paginate(1);

        return view('admin.order.overorder',['data'=>$data,'requests'=>$request->input()]);
    }

    // 待收货订单详情
    public function overinfo(Request $request)
    {
        $data = Orderinfo::where('oid',$request->id)->get();
        foreach($data as $k=>$v){
            //商品详情
            $data[$k]['goods']=Goods::select('title','price')->where('id',$v->gid)->first();

            //商品图片
            $data[$k]['goodspic']=Goodspic::select('pic')->where('gid',$v->gid)->first();
        }
        return view('admin.order.overinfo',['data'=>$data]);
    }

    // 待评价
    public function commentorder(Request $request)
    {
        $search=$request->input('search','');
        $data = DB::table('orders')->where('order','like','%'.$search.'%')->where('status',3)->paginate(5);

        return view('admin.order.commentorder',['data'=>$data,'requests'=>$request->input()]);
    }

    // 待评价订单详情
    public function commentinfo(Request $request)
    {
        $data = Orderinfo::where('oid',$request->id)->get();
        foreach($data as $k=>$v){
            // 商品详情
            $data[$k]['goods'] = Goods::select('title','price')->where('id',$v->gid)->first();
            // 商品图片
            $data[$k]['goodspic'] = Goodspic::select('pic')->where('gid',$v->gid)->first();
        }
      
        return view('admin.order.commentinfo',['data'=>$data]);
    }

    public function refund(Request $request)
    {
        $search=$request->input('search','');
        $refund = DB::table('refund')->paginate(1);
        foreach($refund as $k=>$v){
            $refund[$k]->user = DB::table('users')->select('uname')->where('id',$v->uid)->first();
            $refund[$k]->goods = DB::table('goods')->select('title')->where('id',$v->gid)->first();
            $refund[$k]->orders = DB::table('orders')->select('order')->where('id',$v->oid)->first();
             $refund[$k]->orderinfo = DB::table('order_info')->select('status')->where('oid',$v->oid)->first();
            $refund[$k]->pic = DB::table('refund_pic')->select('pic')->where('rid',$v->id)->first();
        }
        return view('admin.order.refund',['refund'=>$refund,'requests'=>$request->input()]);
    }
    //处理退款订单
    public function refundstore(Request $request)
    {
        //查找退款订单
        $refund = Refund::find($request->id);
        //修改商品状态
        $order = Orderinfo::where('oid',$refund->oid)->where('gid',$refund->gid)->first();
        $order->status = 2;
        if($order->save()){
            return back();
        }
    }

    
}
