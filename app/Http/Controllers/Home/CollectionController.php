<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    /**
     * 我的收藏
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //判断收藏是否为空
        if(!empty($_SESSION['collection'])){
            //获取收藏商品
    		$data = $_SESSION['collection'];
    	}else{
    		$data = [];
    	}
        return view('home.collection.index',['data'=>$data]);
    }

    /**
     * 加入收藏
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        //商品id
    	$id = $request->input('id',0);
    	//判断商品是否第一次收藏
    	if(empty($_SESSION['collection'][$id])){
    		// 获取对应商品
            $data = DB::table('goods')->where('id',$id)->first();
            $data->pic = DB::table('goods_pic')->select('pic')->where('gid',$data->id)->first();
	    	$data->num = 1;
            //xierusession
			$_SESSION['collection'][$id] = $data;
	    }else{
	    	$_SESSION['collection'][$id]->num = $_SESSION['collection'][$id]->num + 1;
	    }
	    //返回商品列表
	    return back();
        
    }
    /**
     * 商品全选
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function countCollection()
    {
        //判断收藏是否为空
        if(empty($_SESSION['collection'])){
            $count = 0;
        }else{
            $count = 0;
            //收藏数量叠加
            foreach($_SESSION['collection'] as $k=>$v){
                $count += $v->num;
            }
        }
        return $count;
    }
    /**
     * 删除收藏商品
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        //获取商品id
        $id = $request->input('id');
        //判断收藏是否为空
    	if(empty($_SESSION['collection'][$id])){
    		return back();
    	}else{
    		unset($_SESSION['collection'][$id]);
    		return back();
    	}
    }
}
