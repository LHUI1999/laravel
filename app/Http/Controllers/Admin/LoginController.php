<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('admin.login.login');
    }
    public function dologin(Request $request){
    	//获取信息
    	$uname = $request ->input('uname','');
    	$upass = $request ->input('upass','');
    	$userinfo = DB::table('admin_users')->where('uname',$uname)->first();
    	if(!$userinfo){
    		echo "<script>alert('用户名或密码错误')</script>";
    		exit;
    	}

    	//验证密码正确性
    	if(!Hash::check($upass,$userinfo->upass)){
    		echo "<script>alert('用户名或密码错误')</script>";
    		exit;
    	}

    	//登陆成功
    	session(['admin_login'=>true]);
    	// session(['admin_userinfo'=>$userinfo]);
        $_SESSION['admin_userinfo'] = $userinfo;

        $nodes = DB::select('select n.cname,n.aname from nodes as n, users_roles as ur,roles_nodes as rn where ur.uid = '.$userinfo->id.' and ur.rid = rn.rid and rn.nid = n.id');
        $nodes_data = [];
        foreach($nodes as $k => $v){
            if($v->aname == 'create'){
               $nodes_data[$v->cname][] = 'store'; 
            }

            if($v->aname == 'edit'){
               $nodes_data[$v->cname][] = 'update'; 
            }
            $nodes_data[$v->cname][]=$v->aname;
        }
         // 压入后台首页权限
         $nodes_data['indexcontroller'][] = 'index'; 

        //当前权限压入session
        session(['admin_nodes'=>$nodes_data]);

    	//跳转
    	return redirect('admin');


    }

    //退出登录
    public function logout(){
        $_SESSION['admin_userinfo'] = null;
        session(['admin_login'=>false]);
        return redirect('admin/login');
    }
}
