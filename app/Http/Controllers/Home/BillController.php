<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    /**
     * 账单详情
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取用户id
        $id = $_SESSION['user']->id;
        // 获取orders表里信息
        $data = DB::table('orders')->where('uid',$_SESSION['user']->id)->get();
        $date = [];
        $time = [];
        // 获取数组
        foreach($data as $k=>$v){
            $time[$k] = explode(' ',$v->created_at)[0];
        }
        // 截取时间
        $time_1 = [];
        foreach($time as $k=>$v){
            $time_1[$k] = explode('-',$v)[0].'-'.explode('-',$v)[1];
        }
        //去除相同时间
        $date[] = array_values(array_unique($time_1));
        $date_1 = [];
        // 将时间压入数组
        foreach($date[0] as $k=>$v){
            $date_1[$k]['time'] = $v;
        }
        //获得对应时间的订单
        foreach($data as $k=>$v){
            foreach($date_1 as $a=>$b){
                //判断月份是否对应
                if( explode('-',explode(' ',$v->created_at)[0])[0].'-'.explode('-',explode(' ',$v->created_at)[0])[1] == $b['time'] ){
                    $date_1[$a]['order'][]=DB::table('orders')->select('id','price')->where('id',$v->id)->first();
                }
            }
        }
        //获取订单详情
        foreach($date_1 as $k=>$v){
            foreach($v['order'] as $kk=>$vv){
                $vv->orderinfo[] = DB::table('order_info')->select('gid','num')->where('oid',$vv->id)->get();

            }
        }
        //获取商品详情
        foreach($date_1 as $k=>$v){
            foreach($v['order'] as $kk=>$vv){
                foreach($vv->orderinfo as $kkk=>$vvv){
                    foreach($vvv as $kkkk=>$vvvv){
                        $vvvv->goods = DB::table('goods')->select('title','price')->where('id',$vvvv->gid)->first();
                    }
                }
            }
        }
        //当月消费总额
        foreach($date_1 as $k=>$v){
            $date_1[$k]['total'] = 0;
            foreach($v['order'] as $kk=>$vv){
                $date_1[$k]['total'] += $vv->price;
            }
            
        }
        //返回账单页面
    	return view('home.bill.index',['data'=>$data,'time'=>$time,'date'=>$date_1]);
    }

   
}
