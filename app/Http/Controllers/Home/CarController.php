<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use DB;


class CarController extends Controller
{
    /**
     * 统计总价格
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function priceCount()
    {
        //判断购物车是否为空
        if(empty($_SESSION['car'])){
            $pricecount = 0;
        }else{
            //商品价格叠加
            $pricecount = 0;
            foreach($_SESSION['car'] as $k => $v){
                if($v->select ==1){
                    $pricecount += $v->xiaoji;
                }
            }
        }
        return $pricecount;
    }
    /**
     * 商品选择
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function select(Request $request)
    {
        //判断是否选择
        if($request->select=='0'){
            $_SESSION['car'][$request->id]->select=1;
        }else{
            $_SESSION['car'][$request->id]->select=0;
        }

        foreach($_SESSION['car'] as $k=>$v)
        {
            //全选是否勾上
            if($v->select =='0'){
                $_SESSION['selectall'] = 0;
            }
        }
        return back();
    }
    /**
     * 商品全选
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function selectall(Request $request)
    {
        //判断是否全选
        if($request->select=='1'){
            foreach($_SESSION['car'] as $k=>$v)
            {
                $v->select = 0;
            }
            //写入session
            $_SESSION['selectall'] = 0;
        }else{
            foreach($_SESSION['car'] as $k=>$v)
            {
                $v->select = 1;
            }
            $_SESSION['selectall'] = 1;
        }
        return back();
    }
    /**
     * 购物车列表
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //判断是否被全选
        if(empty($_SESSION['selectall'])){
        $_SESSION['selectall']=0;
            
        }
        //判断购物车是否为空
    	if(!empty($_SESSION['car'])){
            //获得购物车商品
    		$data = $_SESSION['car'];
            //统计选择数量
            $goods = 0;
            foreach($_SESSION['car'] as $k=> $v)
            {
                //判断商品是否被选择
                if($v->select==1){
                    $goods+=$v->num;
                }
            }
    	}else{
    		$data = [];
            $goods = 0;
    	}
        //已选商品总价格
    	$pricecount = self::priceCount();
        //返货购物车页面
    	return view('home.car.index',['data'=>$data,'pricecount'=>$pricecount,'goods'=>$goods]);
    }
    /**
     * 加入购物车
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
		//商品id
    	$id = $request->input('id',0);
    	//判断商品是否第一次加购
    	if(empty($_SESSION['car'][$id])){
    		// 获取对应商品
            $data = DB::table('goods')->where('id',$id)->first();
            //商品图片
            $data->pic = DB::table('goods_pic')->select('pic')->where('gid',$data->id)->first();
	    	$data->num = 1;
	    	$data->xiaoji = ($data->price * $data->num);
            //将商品写入session
            $_SESSION['car'][$id] = $data;
			$_SESSION['car'][$id]->select = 0;
	    }else{
            //商品数量小计增加
	    	$_SESSION['car'][$id]->num = $_SESSION['car'][$id]->num + 1;
	    	$_SESSION['car'][$id]->xiaoji = ($_SESSION['car'][$id]->num*$_SESSION['car'][$id]->price);
            $_SESSION['car'][$id]->select = 0;
	    }
	    //返回商品列表
	    return back();
    }	
    /**
     * 购物车商品统计
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function countCar()
    {
       //判断购物车是否为空
    	if(empty($_SESSION['car'])){
    		$count = 0;
    	}else{
    		$count = 0;
            //数量叠加
    		foreach($_SESSION['car'] as $k => $v){
    			$count += $v->num;
    		}
    	}
    	return $count;
    }
    /**
     * 购物车添加数量
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addNum(Request $request)
    {
        //获得商品id
    	$id = $request->input('id');
        //判断购物车是否为空
    	if(empty($_SESSION['car'])){
    		return back();
    	}else{
    		//数量
    		$n = $_SESSION['car'][$id]->num+1;
    		$_SESSION['car'][$id]->num = $n;
    		//小计
    		$price = $_SESSION['car'][$id]->price;
    		$_SESSION['car'][$id]->xiaoji = ($n*$price);
    		return back();
    	}
    }
    /**
     * 购物车减少数量
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function descNum(Request $request)
    {
        //获取商品id
    	$id = $request->input('id');
        //判断购物车是否为空
    	if(empty($_SESSION['car'])){
    		return back();
    	}else{
    		if($_SESSION['car'][$id]->num<=1){
    			return back();
    			exit;
    		}
    		//数量
    		$n = $_SESSION['car'][$id]->num-1;
    		$_SESSION['car'][$id]->num = $n;
    		//小计
    		$price = $_SESSION['car'][$id]->price;
    		$_SESSION['car'][$id]->xiaoji = ($n*$price);
    		return back();
    	}
    }

    /**
     * 删除商品
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        //获得商品id
    	$id = $request->input('id');
    	if(empty($_SESSION['car'][$id])){
    		return back();
    	}else{
            //从session中删除
    		unset($_SESSION['car'][$id]);
    		return back();
    	}
    }
}
