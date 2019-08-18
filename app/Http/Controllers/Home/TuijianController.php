<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TuijianController extends Controller
{
    /**
     * 推荐首页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //仅获取第一条商品信息
        $aa=DB::table('goods')->first();
        $aapic=DB::table('goods_pic')->where('gid',$aa->id)->paginate(1);
        $aa->pic = $aapic[0]->pic;
        //商品类别
        $data=DB::table('goods')->where('cid',15)->take(3)->get();
        foreach ($data as $k=>$v) {
            //商品图片
            $data[$k]->pic=DB::table('goods_pic')->where('gid',$v->id)->first();
        }
        return view('home.tuijian.index',['data'=>$data,'aa'=>$aa]);
    }


}
