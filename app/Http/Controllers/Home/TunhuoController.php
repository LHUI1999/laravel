<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TunhuoController extends Controller
{
    /**
     * 囤货
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        //获取商品列别
        $cates=DB::table('cates')->get();
        //商品信息
        $data=DB::table('goods')->where('cid',11)->take(3)->get();
        foreach ($data as $k=>$v) {
                //商品信息
                $data[$k]->pic=DB::table('goods_pic')->where('gid',$v->id)->first();
        }
        return view('home.tunhuo.index',['data'=>$data]);
    }

}
