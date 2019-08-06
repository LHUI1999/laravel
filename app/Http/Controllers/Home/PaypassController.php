<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Userspay;
use Hash;

class PaypassController extends Controller
{
    //
    public function index()
    {
    	
    	return view('home.paypass.index');
    }
    public function store(Request $request)
    {
    	dump($request->all());
    	if(strlen($request->input('num'))!=6){
    		echo "<script>alert('密码长度为六位');location.href='/home/paypass'</script>";
    		exit;
    	}
    	if($request->input('num')!==$request->input('renum')){
    		echo "<script>alert('两次密码不一致');location.href='/home/paypass'</script>";
    		exit;
    	}
    	$pay = new Userspay;
    	$pay->uid = $_SESSION['user']->id;
    	$pay->pay = Hash::make($request->input('num'));
    	if($pay->save()){
    		echo "<script>alert('密码设置成功');location.href='/home/safe'</script>";
    	}
    }
}
