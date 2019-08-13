<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Youhui;
use Illuminate\Support\Facades\DB;

class YouhuiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=DB::table('youhuiquan')->get();
        // dump($data);
        return view('admin.youhui.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        
        return view('admin.youhui.create');
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
        // echo "aaa";
        // dump($request->all());
         //开启事务
         DB::beginTransaction();
        $data= new Youhui;
        // dump($data);
        $data->yname=$request->input('yname');
        $data->dikou=$request->input('dikou');
        $res=$data->save();
        // dump($res);
        if($res){
            DB::commit();
            return redirect('admin/youhui')->with('success','添加成功');

        }else{
            DB::rollBack();
            return back('error','添加失败');
        }
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
         //开启事务
         DB::beginTransaction();
         //删除主信息
         $res = Youhui::destroy($id);
         if($res){
             DB::commit();
            return redirect('admin/youhui')->with('success','删除成功');
        }else{
            //事务回滚
            DB::rollback();
            return back()->with('error','删除失败');
        }
    }
}
