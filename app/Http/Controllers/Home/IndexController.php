<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Cates;
use App\Models\Goods;
use App\Models\Goodspic;
use App\Http\Controllers\Home\CarController;
use App\Http\Controllers\Home\CollectionController;


class IndexController extends Controller
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
        // dd($data);
        foreach($data as $k => $v){
            $arr = $this->word($v->title);
            // dd($arr);
            foreach($arr as $kk => $vv){
                DB::table('goods_word')->insert(['gid'=>$v->id,'word'=>$vv]);
            }
            
        }
    }


    public static function getPidCatesData($pid = 0)
    {
        //获取一级分类
        $data = Cates::where('pid',$pid)->get();
        foreach($data as $k => $v){
            $v->sub = self::getPidCatesData($v->id);

        }
        // dd($data);
        return $data;
    }
    //前台首页
    public function index(Request $request)
    {
       // dump($_SESSION['car']);

        //分词写入数据库
        // $this->dataWord();
        //接受搜索参数
        $search = $request->input('search','');

        //中文分词start
        if(!empty($search)){
            $gid = DB::table('view_goods_word')->select('gid')->where('word',$search)->get();
            $gids = [];

            foreach($gid as $k => $v){
                $gids[] = $v->gid;
            }
            $data2 = Goods::whereIn('id',$gids)->get();


            
             return view('home.list.index',['data'=>$data2]);

        }else{
            //商品分类
           
            $data = Cates::where('pid',0)->get();
            foreach($data as $k => $v){
                $data[$k]['name'] = Goods::where('cid',$v->id)->take(8)->get();
            }
            // $_SESSION['car'] = null;

            // dump($_SESSION['car']);
            $carcount = CarController::countCar();
            
            $collectioncount = CollectionController::countCollection();
            // dd($collectioncount);
            return view('home.index.index',['data'=>$data,'carcount'=>$carcount,'collectioncount'=>$collectioncount]);

        }
        
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
