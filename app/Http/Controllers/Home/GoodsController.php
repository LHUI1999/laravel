<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Goods;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取id
        $id=$request->id;

        // 判断是否收藏
        if(isset($_SESSION['collection'][$id])){
            $coll=1;
            
        }else{
            $coll=2;
            
        }

        // if(session('foot')==null){
        //     session(['foot'=>$id]);
        // }else{
        //     $request->session()->push('foot',$id);
        // }
        // dump(session('foot'));
        //获取id相对应商品的数据
        $goods=DB::table('goods')->where('id',$id)->get();
         //获得商品图片
         $goods->pic = DB::table('goods_pic')->where('gid',$id)->get();
         //获得商品详情图片
         $goods->infopic = DB::table('goods_infopic')->where('gid',$id)->get();
        
        //看了又看
         // dump(rand(9,16));
         $look = Goods::where('cid',rand(9,16))->take(5)->get();
         // $look = Goods::where('cid',9)->take(5)->get();
         // dd($look);
         return view('home.goods.index',['goods'=>$goods,'look'=>$look,'coll'=>$coll]);
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo "1";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        echo "11";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        echo "111";

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        echo "1111";

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        echo "11111";

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        echo "111111";

    }
}
