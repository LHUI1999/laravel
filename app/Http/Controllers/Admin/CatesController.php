<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use DB;

class CatesController extends Controller
{

    public static function getCates()
    {
        $cates = DB::select("select  *,concat(path,',',id) as paths from cates order by paths asc ");
        foreach($cates as $k=>$v){
            //统计，出现次数            
            $n = substr_count($v->path,',');

            $cates[$k]->cname = str_repeat('|---', $n).$v->cname;
        }
        return $cates;
    } 
    /**
     * 分类列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search=$request->input('search','');
        $cate=DB::table('cates')->where('cname','like','%'.$search.'%')->paginate(10);
        foreach($cate as $k=>$v){
            //统计，出现次数            
            $n = substr_count($v->path,',');

            $cate[$k]->cname = str_repeat('|---', $n).$v->cname;
        }
        return view('admin.cates.index',['cate'=>$cate,'requests'=>$request->input()]);
    }

    /**
     * 分类添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        //
        $id = $request->input('id',0);
        return view('admin.cates.create',['cates'=>self::getCates(),'id'=>$id]);
    }

    /**
     * 处理分类添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $pid = $request->input('pid','');
        if($pid == 0){
            $path = 0;
        }else{
           $parent_data = Cates::find($pid);
           $path = $parent_data->path.','.$parent_data->id;
        }

        $cate = new Cates;
        $cate->cname = $request->input('cname','');
        $cate->pid = $pid;
        $cate->path = $path;
        if($cate->save()){
            return redirect('admin/cates')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
        //开启事务
        DB::beginTransaction();
        //删除主信息
        $res = Cates::where('id',$id)->delete();
        if($res){
            //提交事务
            DB::commit();
            return redirect('admin/cates')->with('success','删除成功');
        }else{
            //事务回滚
            DB::rollback();
            return back()->with('error','删除失败');
        }
    }
}
