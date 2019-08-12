<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TuijianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // dump($request->all());
        //仅获取第一条商品信息
        $aa=DB::table('goods')->first();

        $aapic=DB::table('goods_pic')->where('gid',$aa->id)->paginate(1);

        $aa->pic = $aapic[0]->pic;


        // 好物推荐
        $cates=DB::table('cates')->get();

        $data=DB::table('goods')->where('cid',$cates[2]->id)->get();
      
        
        foreach ($data as $k=>$v) {
            $pic=DB::table('goods_pic')->where('gid',$data[0]->id)->paginate(3);
            $v->pic=$pic[0]->pic;

        }
        return view('home.tuijian.index',['data'=>$data,'aa'=>$aa]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
}
