<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    // 收藏页
    public function index()
    {
        if(!empty($_SESSION['collection'])){
    		$data = $_SESSION['collection'];
    	}else{
    		$data = [];
    	}
        return view('home.collection.index',['data'=>$data]);
    }

    // 加入收藏页
    public function add(Request $request)
    {
        //清楚session
        // session(['collection'=>null]);
        
        // dd($_SESSION['collection']);
        //商品id
    	$id = $request->input('id',0);

    	//判断商品是否第一次加购
    	if(empty($_SESSION['collection'][$id])){

    		// 获取对应商品
            $data = DB::table('goods')->where('id',$id)->first();
            $data->pic = DB::table('goods_pic')->select('pic')->where('gid',$data->id)->first();

	    	$data->num = 1;
			$_SESSION['collection'][$id] = $data;

	    	
	    }else{
	    	$_SESSION['collection'][$id]->num = $_SESSION['collection'][$id]->num + 1;
	    }
	    //返回商品列表
	    return back();
        
    }

    // 统计收藏的数量
    public static function countCollection()
    {
        if(empty($_SESSION['collection'])){
            $count = 0;
        }else{
            $count = 0;
            foreach($_SESSION['collection'] as $k=>$v){
                $count += $v->num;
            }
        }
        return $count;
    }

    // 删除收藏的商品
    public function delete(Request $request)
    {
        $id = $request->input('id');
    	if(empty($_SESSION['collection'][$id])){
    		return back();
    	}else{
    		unset($_SESSION['collection'][$id]);
    		return back();
    	}
    }


}
