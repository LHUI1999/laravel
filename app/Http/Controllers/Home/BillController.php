<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    // 账单详情
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

        // $aa = explode(' ',$v->created_at)[0].' '.explode(' ',$v->created_at)[1];
        // dd($aa);

        // 截取时间
        $time_1 = [];
        foreach($time as $k=>$v){
            $time_1[$k] = explode('-',$v)[0].'-'.explode('-',$v)[1];
        }
        
        $date[] = array_values(array_unique($time_1));
        $date_1 = [];
        
        foreach($date[0] as $k=>$v){
            $date_1[$k]['time'] = $v;
        }
        foreach($data as $k=>$v){
            foreach($date_1 as $a=>$b){
                if( explode('-',explode(' ',$v->created_at)[0])[0].'-'.explode('-',explode(' ',$v->created_at)[0])[1] == $b['time'] ){
                    $date_1[$a]['order'][]=DB::table('orders')->select('id','price')->where('id',$v->id)->first();
                    
                }
            }
        }

        foreach($date_1 as $k=>$v){
            foreach($v['order'] as $kk=>$vv){
                $vv->orderinfo[] = DB::table('order_info')->select('gid','num')->where('oid',$vv->id)->get();

            }
        }
        foreach($date_1 as $k=>$v){
            foreach($v['order'] as $kk=>$vv){
                foreach($vv->orderinfo as $kkk=>$vvv){
                    foreach($vvv as $kkkk=>$vvvv){
                        $vvvv->goods = DB::table('goods')->select('title','price')->where('id',$vvvv->gid)->first();
                    }
                }
            }
        }

        // $totalprice=0;
        foreach($date_1 as $k=>$v){
            $date_1[$k]['total'] = 0;
            foreach($v['order'] as $kk=>$vv){
                $date_1[$k]['total'] += $vv->price;
            }
            
        }

        // dump($date_1);

    	return view('home.bill.index',['data'=>$data,'time'=>$time,'date'=>$date_1]);
    }

   
}
