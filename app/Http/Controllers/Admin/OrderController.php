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
    /**
     * 待发货
     *
     * @return \Illuminate\Http\Response
     */
    public function sendorder(Request $request)
    {
        //获得搜索内容
        $search=$request->input('search','');
        //查找待发货订单
        $data = DB::table('orders')->where('order','like','%'.$search.'%')->where('status',0)->paginate(1);
        //返回模板
        return view('admin.order.sendorder',['data'=>$data,'requests'=>$request->input()]);
    }

    /**
     * 订单详情
     *
     * @return \Illuminate\Http\Response
     */
    public function orderinfo(Request $request)
    {
        //查找订单详情
        $data = Orderinfo::where('oid',$request->id)->get();
        foreach($data as $k=>$v){
            //商品详情
            $data[$k]['goods']=Goods::select('title','price')->where('id',$v->gid)->first();
            //商品图片
            $data[$k]['goodspic']=Goodspic::select('pic')->where('gid',$v->gid)->first();
        }
        //返回详情模板
        return view('admin.order.orderinfo',['data'=>$data]);
    }
    /**
     * 执行发货
     *
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        // 更改订单状态
        $send = Orders::find($request->id);
        $send->status = 2;
        //判断订单是否修改成功
        if($send->save())
        {
            echo "<script>alert('发货成功');location.href='/admin/order/sendorder'</script>";
        }
    }
    /**
     * 待付款页面
     *
     * @return \Illuminate\Http\Response
     */
    public function payorder(Request $request)
    {
        //获得搜索内容
        $search=$request->input('search','');
        //查找待付款订单
        $data = DB::table('orders')->where('order','like','%'.$search.'%')->where('status',1)->paginate(1);
        //返回模板
        return view('admin.order.payorder',['data'=>$data,'requests'=>$request->input()]);
    }
    /**
     * 待付款订单详情
     *
     * @return \Illuminate\Http\Response
     */
    public function payinfo(Request $request)
    {
        //查找待付款订单详情
        $data = Orderinfo::where('oid',$request->id)->get();
        foreach($data as $k=>$v){
            //商品详情
            $data[$k]['goods']=Goods::select('title','price')->where('id',$v->gid)->first();
            //商品图片
            $data[$k]['goodspic']=Goodspic::select('pic')->where('gid',$v->gid)->first();
        }
        //返回详情模板
        return view('admin.order.payinfo',['data'=>$data]);
    }
    /**
     * 待收货
     *
     * @return \Illuminate\Http\Response
     */
    public function overorder(Request $request)
    {
        //获得搜送内容
        $search=$request->input('search','');
        //获得待收货订单
        $data = DB::table('orders')->where('order','like','%'.$search.'%')->where('status',2)->paginate(1);
        //返回待收货模板
        return view('admin.order.overorder',['data'=>$data,'requests'=>$request->input()]);
    }
    /**
     * 待收货订单详情
     *
     * @return \Illuminate\Http\Response
     */
    public function overinfo(Request $request)
    {
        //获得待收货订单详情
        $data = Orderinfo::where('oid',$request->id)->get();
        foreach($data as $k=>$v){
            //商品详情
            $data[$k]['goods']=Goods::select('title','price')->where('id',$v->gid)->first();
            //商品图片
            $data[$k]['goodspic']=Goodspic::select('pic')->where('gid',$v->gid)->first();
        }
        //返回详情模板
        return view('admin.order.overinfo',['data'=>$data]);
    }
    /**
     * 待评价订单
     *
     * @return \Illuminate\Http\Response
     */
    public function commentorder(Request $request)
    {
        //获得搜送内容
        $search=$request->input('search','');
        //查找待收货订单
        $data = DB::table('orders')->where('order','like','%'.$search.'%')->where('status',3)->paginate(5);
        //返回订单模板
        return view('admin.order.commentorder',['data'=>$data,'requests'=>$request->input()]);
    }
    /**
     * 待评价订单详情
     *
     * @return \Illuminate\Http\Response
     */
    public function commentinfo(Request $request)
    {
        //获得待评价订单详情
        $data = Orderinfo::where('oid',$request->id)->get();
        foreach($data as $k=>$v){
            // 商品详情
            $data[$k]['goods'] = Goods::select('title','price')->where('id',$v->gid)->first();
            // 商品图片
            $data[$k]['goodspic'] = Goodspic::select('pic')->where('gid',$v->gid)->first();
        }
        //返回详情模板
        return view('admin.order.commentinfo',['data'=>$data]);
    }
    /**
     * 退回订单
     *
     * @return \Illuminate\Http\Response
     */
    public function refund(Request $request)
    {
        //获得搜索内容
        $search=$request->input('search','');
        //获得退货订单
        $refund = DB::table('refund')->paginate(5);
        foreach($refund as $k=>$v){
            //退货人
            $refund[$k]->user = DB::table('users')->select('uname')->where('id',$v->uid)->first();
            //退货商品
            $refund[$k]->goods = DB::table('goods')->select('title')->where('id',$v->gid)->first();
            //退货订单号
            $refund[$k]->orders = DB::table('orders')->select('order')->where('id',$v->oid)->first();
            //退货详情
             $refund[$k]->orderinfo = DB::table('order_info')->select('status')->where('oid',$v->oid)->first();
             //退货图片
            $refund[$k]->pic = DB::table('refund_pic')->select('pic')->where('rid',$v->id)->first();
        }
        //返货退货订单模板
        return view('admin.order.refund',['refund'=>$refund,'requests'=>$request->input()]);
    }
    /**
     * 处理退货订单
     *
     * @return \Illuminate\Http\Response
     */
    public function refundstore(Request $request)
    {
        //查找退款订单
        $refund = Refund::find($request->id);
        //修改商品状态
        $order = Orderinfo::where('oid',$refund->oid)->where('gid',$refund->gid)->first();
        $order->status = 2;
        //判断是否修改成功
        if($order->save()){
            return back();
        }
    }
}
