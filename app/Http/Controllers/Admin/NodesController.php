<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\NodesStore;
use App\Models\Nodes;

class NodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取搜索内容
        $search = $request->input('search','');

        // 获取数据
        $data = DB::table('nodes')->where('desc','like','%'.$search.'%')->paginate(4);
        // dd($data);

        return view('admin.nodes.index',['data'=>$data,'requests'=>$request->input()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        return view('admin.nodes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NodesStore $request)
    {
        // dd($request);
        //
        $data = $request->except('_token');
        $data['cname'] = $data['cname'] .'controller';
        $res = DB::table('nodes')->insert($data);
        if($res){
            return redirect('admin/nodes')->with('success','添加成功');
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
        // 获取用户信息
        $nodes = Nodes::find($id);
        // dd($nodes);

        return view('admin.nodes.edit',['nodes'=>$nodes]);
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
        // 修改信息
        $nodes = Nodes::find($id);
        // dd($nodes);
        $nodes->desc = $request->input('desc');
        $nodes->cname = $request->input('cname');
        $nodes->aname = $request->input('aname');
        // dd($nodes->aname);
        $res = $nodes->save();
        // dd($res);
        // 判断
        if($res){
            DB::commit();
            return redirect('admin/nodes')->with('success','修改成功');
        }else{
            DB::rollback();
            return back()->with('error','修改失败');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 开启事务
        DB::beginTransaction();

        // 删除主用户
        $res = Nodes::destroy($id);

        // 判断
        if($res){
            // 提交事务
            DB::commit();
            return redirect('admin/nodes')->with('success','删除成功');
        }else{
            // 事务回滚
            DB::rollback();
            return back()->with('error','删除失败');
        }
    }
}
