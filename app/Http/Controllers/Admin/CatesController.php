<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use DB;

class CatesController extends Controller
{
    /**
     * 设置分类
     *
     * @return \Illuminate\Http\Response
     */
    public static function getCates()
    {
        $cates = DB::select("select  *,concat(path,',',id) as paths from cates order by paths asc ");
        foreach($cates as $k=>$v){
            //统计，出现次数            
            $n = substr_count($v->path,',');
            //父级分类添加|--
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
        //分类搜索
        $search=$request->input('search','');
        //每十条分一页
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
        //分类列表
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
        //选择的父id
        $pid = $request->input('pid','');
        //判断pid是否为0
        if($pid == 0){
            $path = 0;
        }else{
            //拼接path
           $parent_data = Cates::find($pid);
           $path = $parent_data->path.','.$parent_data->id;
        }
        //执行添加
        $cate = new Cates;
        $cate->cname = $request->input('cname','');
        $cate->pid = $pid;
        $cate->path = $path;
        //判断是否添加成功
        if($cate->save()){
            return redirect('admin/cates')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }

    }

    /**
     * 分类删除
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
