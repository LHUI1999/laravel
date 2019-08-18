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
     * 权限列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取搜索内容
        $search = $request->input('search','');
        // 获取数据
        $data = DB::table('nodes')->where('desc','like','%'.$search.'%')->paginate(4);
        return view('admin.nodes.index',['data'=>$data,'requests'=>$request->input()]);
    }


    /**
     * 添加权限页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        return view('admin.nodes.create');
    }

    /**
     * 执行权限添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NodesStore $request)
    {
        //执行添加
        $data = $request->except('_token');
        $data['cname'] = $data['cname'] .'controller';
        $res = DB::table('nodes')->insert($data);
        //判断是否添加成功
        if($res){
            return redirect('admin/nodes')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * 删除权限
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取用户信息
        $nodes = Nodes::find($id);
        //返回页面
        return view('admin.nodes.edit',['nodes'=>$nodes]);
    }

    /**
     * 权限修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 修改信息
        $nodes = Nodes::find($id);
        $nodes->desc = $request->input('desc');
        $nodes->cname = $request->input('cname');
        $nodes->aname = $request->input('aname');
        $res = $nodes->save();
        // 判断权限信息是否修改成功
        if($res){
            //执行操作
            DB::commit();
            return redirect('admin/nodes')->with('success','修改成功');
        }else{
            //事物回滚
            DB::rollback();
            return back()->with('error','修改失败');
        }
    }
    /**
     * 权限删除
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
        // 判断是否删除成功
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
