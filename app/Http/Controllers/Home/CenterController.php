<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CenterController extends Controller
{
    //个人中心首页
    public function index()
    {

    	//待付款
    	$fukuan = DB::table('orders')->where('uid',$_SESSION['user']->id)->where('status',1)->count();
    	//代发货
    	$fahuo = DB::table('orders')->where('uid',$_SESSION['user']->id)->where('status',0)->count();
    	//待收货 
    	$shouhuo = DB::table('orders')->where('uid',$_SESSION['user']->id)->where('status',2)->count();
    	//待评价
    	$pingjia = DB::table('orders')->where('uid',$_SESSION['user']->id)->where('status',3)->count();
        //我的收藏

    	return view('home.center.index',['fukuan'=>$fukuan,'fahuo'=>$fahuo,'shouhuo'=>$shouhuo,'pingjia'=>$pingjia]);

     //    // 收藏夹
     //    if(!empty($_SESSION['collection'])){
    	// 	$data = $_SESSION['collection'];
    	// }else{
    	// 	$data = [];
     //    }
        
    	// return view('home.center.index',['data'=>$data]);

    }

}
