<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class LoginController extends Controller
{
    /**
     * 后台登录
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        //登陆页面
    	return view('admin.login.login');
    }
    /**
     * 执行后台登录
     *
     * @return \Illuminate\Http\Response
     */
    public function dologin(Request $request)
    {
    	//获取信息
    	$uname = $request ->input('uname','');
    	$upass = $request ->input('upass','');
    	$userinfo = DB::table('admin_users')->where('uname',$uname)->first();
        //判断用户是否存在
    	if(!$userinfo){
    		echo "<script>alert('用户名或密码错误')</script>";
    		return back();
    	}
    	//验证密码正确性
    	if(!Hash::check($upass,$userinfo->upass)){
    		echo "<script>alert('用户名或密码错误')</script>";
    		return back();
    	}
    	//登陆成功
    	session(['admin_login'=>true]);
        $_SESSION['admin_userinfo'] = $userinfo;
        //判断用户权限
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
    /**
     * 退出登录
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(){
        //删除session
        $_SESSION['admin_userinfo'] = null;
        session(['admin_login'=>false]);
        //返回登陆页面
        return redirect('admin/login');
    }
}
