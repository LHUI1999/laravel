<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Controllers\Home\CarController;

class ListController extends Controller
{

	public function __construct()
	{
		// 引入类文件
		require 'E:/xampp/htdocs/laravel/public/pscws4/pscws4.class.php';
		// 实例化
		@$this->cws = new \PSCWS4;
		//设置字符集
		$this->cws->set_charset('utf8');
		//设置词典
		$this->cws->set_dict('pscws4/etc/dict.utf8.xdb');
		//设置utf8规则
		$this->cws->set_rule('pscws4/etc/rules.utf8.ini');
		//忽略标点符号
		$this->cws->set_ignore(true);
	} 

	public function dataWord(){
		$data = DB::table('goods')->select('title','id')->get();
		// dump($data);
		foreach($data as $k => $v){
			$arr = $this->word($v->title);
			// dump($arr);
			foreach($arr as $kk => $vv){
				DB::table('goods_word')->insert(['gid'=>$v->id,'word'=>$vv]);
			}
			
		}
	}
    //
   
    public function index(Request $request){
    	//购物车商品数量
    	$count = CarController::countCar();


    	// $str = "荣耀20 4800万超广角AI四摄 3200W美颜自拍 麒麟Kirin980全网通版8GB+128GB 幻夜黑 移动联通电信4G全面屏";
    	// $this->word($str);
    	$this->dataWord();
    	//接受搜索参数
    	$search = $request->input('search','');
    	//中文分词start
    	if(!empty($search)){
    		$gid = DB::table('view_goods_word')->select('gid')->where('word',$search)->get();
	    	$gids = [];
	    	foreach($gid as $k => $v){
	    		$gids[] = $v->gid;
	    	}
	    	$data2 = DB::table('goods')->whereIn('id',$gids)->get();
    	}else{
    		$data2 = DB::table('goods')->get();
    	}
    	
    	//中文分词end

    	return view('home.list.index',['data'=>$data2,'countcar'=>$count]);
    }

    public  function word($text)
    {		
    	//去除空格
    	$arr = explode(' ',$text);
    	$preg = '/^[\w\+\%\.\(\)]+/';
    	$str = '';
    	foreach($arr as $k => $v){
    		$str .= preg_replace($preg,'',$v);
    	}

		//传递字符串
		$this->cws->send_text($str);
		//获取权重最高的前十个词
		// $res = $cws->get_tops(10);// top 顶部

		//获取所有的结果
		$res = $this->cws->get_result();
		
		$list = [];
		foreach($res as $k => $v){
			$list[] = $v['word'];
		}
		return $list;


		
    }

    public function __destruct(){
    	//关闭
		$this->cws->close();
    }

}
