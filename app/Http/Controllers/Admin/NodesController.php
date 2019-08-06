<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
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
        //
         //获得搜索内容
         $search = $request->input('search','');
        //  dd($search);
         //获取数据
        //  $nodes=DB::table('nodes')->where('desc','like','%'.$search.'%')->paginate(2);
         $data = DB::table('nodes')->where('desc','like','%'.$search.'%')->get();
         $nodes=DB::table('nodes')->paginate(1);
        return view('admin.nodes.index',['data'=>$data,'nodes'=>$nodes,'requests'=>$request->input()]);


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
    public function store(Request $request)
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
        //
        // dump($id);
        $nodes=Nodes::find($id);
        // dump($nodes);
        return view('admin.nodes.edit',['data'=>$nodes]);
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

        // dump($request->all());
        $desc=$request['desc'];
        // dump($desc);
        $cname=$request['cname'];
        // dump($cname);
        $aname=$request['aname'];
        // dump($aname);
        $res=DB::table('nodes')->where('id',$id)->update(['desc'=>$desc,'cname'=>$cname,'aname'=>$aname]);
        // dump($res);
        //开启事务
        DB::beginTransaction();
        // dump($request->all());
        $nodes =Nodes::find($id);
        // dump($nodes);
        $res = $nodes->save();
        // dump($res);
        if($res){
            DB::commit();
            return redirect('admin/nodes')->with('success','修改成功');
        }else{
            DB::rollBack();
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
        
        // dump($id);
        //开启事务
        DB::beginTransaction();
        //删除主信息
        $res=DB::table('nodes')->where('id','=',$id)->delete();
        if($res){
             DB::commit();
             return redirect('admin/nodes')->with('success','删除成功');
        }else {
             DB::rollBack();
             return back()->with('error','删除失败');
        }
       
    }
}
