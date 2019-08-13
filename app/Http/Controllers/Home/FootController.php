<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FootController extends Controller
{
    // 足迹页面
    public function index()
    {
        // $data = session('foot');
        
        // $goods = [];
        // foreach($data as $k=>$v){
        //     $goods[$k] = DB::table('goods')->where('id',$v)->get()[0];
        //     $goods[$k]->pic = DB::table('goods_pic')->where('gid',$v)->get()[0];
        // }

        // // dd($goods);
        // return view('home.foot.index',['goods'=>$goods]);
        return view('home.foot.index');
        
    }

    // 删除
    public function delete(Request $request)
    {
        // $id = $request->input('id');
        // dd($id);
    	// if(empty($_SESSION['foot'][$id])){
    	// 	return back();
    	// }else{
    	// 	unset($_SESSION['foot'][$id]);
    	// 	return back();
    	// }
    }

    
}
