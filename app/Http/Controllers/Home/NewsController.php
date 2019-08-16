<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    // 新闻页面
    public function new1()
    {
        // 获取goods表中的数据
        $cates = DB::table('goods')
            ->join('cates','goods.cid','=','cates.id')
            ->join('goods_pic','goods.id','=','goods_pic.gid')
            ->select('goods.id','goods_pic.pic')
            ->get();
   
        return view('home.news.new1',['cates'=>$cates]);
    }

    public function new2()
    {
        return view('home.news.new2');
    }

    public function new3()
    {
        return view('home.news.new3');
    }

    public function new4()
    {
        return view('home.news.new4');
    }

    public function new5()
    {
        return view('home.news.new5');
    }
}
