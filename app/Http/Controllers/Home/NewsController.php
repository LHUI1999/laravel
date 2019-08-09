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
        $cates = DB::table('cates')
            ->join('goods','goods.cid','=','cates.id')
            ->select('cates.*','goods.*')
            ->get();

        // 获取goods_pic中的图片
        $pic = DB::table('goods_pic')
            ->join('goods','goods.id','=','goods_pic.gid')  
            ->get();
        // dd($pic);
        
        return view('home.news.new1',['cates'=>$cates,'pic'=>$pic]);
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
