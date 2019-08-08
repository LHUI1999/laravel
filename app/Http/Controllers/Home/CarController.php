<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use DB;

class CarController extends Controller
{
     //统计总价格
    public static function priceCount()
    {
        if(empty($_SESSION['car'])){
            $pricecount = 0;
        }else{
            $pricecount = 0;
            foreach($_SESSION['car'] as $k => $v){
                $pricecount += $v->xiaoji;
            }
        }
        return $pricecount;
    }


	//购物车列表页面
    public function index()
    {

    	// $_SESSION['car']=null;
    	if(!empty($_SESSION['car'])){
    		$data = $_SESSION['car'];
           
    	}else{
    		$data = [];
    		// return view('home.car.empty');
    	}
    	//总价格
    	$pricecount = self::priceCount();
        // dd($pricecount);
    	return view('home.car.index',['data'=>$data,'pricecount'=>$pricecount]);
    }
    //加入购物车
    public function add(Request $request)
    {

    	//清楚session
		// $_SESSION['car'] = null;

		//商品id
    	$id = $request->input('id',0);

    	//判断商品是否第一次加购
    	if(empty($_SESSION['car'][$id])){
    		// 获取对应商品
            $data = DB::table('goods')->where('id',$id)->first();
            $data->pic = DB::table('goods_pic')->select('pic')->where('gid',$data->id)->first();
	    	$data->num = 1;
	    	$data->xiaoji = ($data->price * $data->num);
	    	$_SESSION['car'][$id] = $data;
	    	
	    }else{
	    	$_SESSION['car'][$id]->num = $_SESSION['car'][$id]->num + 1;
	    	$_SESSION['car'][$id]->xiaoji = ($_SESSION['car'][$id]->num*$_SESSION['car'][$id]->price);
	    }
	    //返回商品列表
	    return redirect('/home/index');
    }	

    //统计购物车数量
    public static function countCar()
    {
       
    	if(empty($_SESSION['car'])){
    		$count = 0;
    	}else{
    		$count = 0;
    		foreach($_SESSION['car'] as $k => $v){
    			$count += $v->num;
    		}
    	}
    	return $count;
    }

   
    //购物车的添加数量
    public function addNum(Request $request)
    {
    	$id = $request->input('id');
    	if(empty($_SESSION['car'])){
    		return back();
    	}else{
    		dump($_SESSION['car'][$id]);
    		//数量
    		$n = $_SESSION['car'][$id]->num+1;
    		$_SESSION['car'][$id]->num = $n;
    		//小计
    		$price = $_SESSION['car'][$id]->price;
    		$_SESSION['car'][$id]->xiaoji = ($n*$price);
    		return back();

    	}
    }
    //购物车的减少数量
    public function descNum(Request $request)
    {
    	$id = $request->input('id');
    	if(empty($_SESSION['car'])){
    		return back();
    	}else{
    		if($_SESSION['car'][$id]->num<=1){
    			return back();
    			exit;
    		}
    		dump($_SESSION['car'][$id]);
    		//数量
    		$n = $_SESSION['car'][$id]->num-1;
    		$_SESSION['car'][$id]->num = $n;
    		//小计
    		$price = $_SESSION['car'][$id]->price;
    		$_SESSION['car'][$id]->xiaoji = ($n*$price);
    		return back();

    	}
    }

    //删除商品
    public function delete(Request $request)
    {
    	$id = $request->input('id');
    	if(empty($_SESSION['car'][$id])){
    		return back();
    	}else{
    		unset($_SESSION['car'][$id]);
    		return back();
    	}
    }


}
