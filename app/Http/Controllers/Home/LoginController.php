<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;


class LoginController extends Controller
{
    //前台登陆页面
    public function index()
    {
    	return view('home.login.index');
    }

    //处理登录
    public function dologin(Request $request)
    {
        //登陆成功
        session(['home_login'=>true]);
    	//获取提交信息
    	$uname = $request->input('uname');
    	$upass = $request->input('pass');
    	//搜索数据库用户信息
    	$user = DB::table('users')->where('uname',$uname)->first();
   		//判断是否检查到用户
    	if( !$user){
    		return back()->with('error','添加失败');
    	}
    	//判断密码是否正确
    	if(!Hash::check($upass,$user->upass) ){
    		return back()->with('error','添加失败');

    	}
    	//判断账户是否激活
    	if($user->status == 0){
    		return back()->with('error','添加失败');
    	}
    	$userinfo = DB::table('users_info')->where('uid',$user->id)->first();



        $user->profile = $userinfo->profile;

    	$_SESSION['user']=$user;




    	return view('home.index.index',['id'=>$userinfo->uid]);
    	
    }

}
