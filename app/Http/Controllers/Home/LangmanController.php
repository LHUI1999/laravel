<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LangmanController extends Controller
{
    /**
     * 活动
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        // 获得商品
        $data=DB::table('goods')->where('cid',13)->take(2)->get();
        foreach ($data as $k=>$v) {
            //商品图片
            $data[$k]->pic=DB::table('goods_pic')->where('gid',$v->id)->first();
        }
        return view('home.langman.index',['data'=>$data]);
    }
}
