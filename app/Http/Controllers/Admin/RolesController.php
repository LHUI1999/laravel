<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Roles;
use App\Models\Rolesnodes;
use App\Http\Requests\RolesStore;

class RolesController extends Controller
{
    /**
     * 权限分类
     *
     * @return \Illuminate\Http\Response
     */
    public static function controllernames()
    {
        return [
            'usercontroller'=>'用户管理',
            'catescontroller'=>'分类管理',
            'adminusercontroller'=>'管理员管理',
            'rolescontroller'=>'角色管理',
            'nodescontroller'=>'权限管理',
            'goodscontroller'=>'商品管理',
            'ordercontroller'=>'订单管理',
        ];
    } 
    /**
     * 权限类别
     *
     * @return \Illuminate\Http\Response
     */
    public static function nodes()
    {
        //获得所有权限
        $nodes = DB::table('nodes')->get();
        $arr = [];
        $temp = [];
        //遍历分类
        foreach($nodes as $k=>$v){
            $temp['id'] = $v->id;
            $temp['desc'] = $v->desc;
            $temp['aname'] = $v->aname;
            $arr[$v->cname][] = $temp;
        }
        return $arr;
    }
    /**
     * 角色列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获得搜索内容
        $search = $request->input('search','');
        //获取数据
        $data = Roles::where('rname','like','%'.$search.'%')->paginate(1);
        //显示便利
        return view('admin.roles.index',['data'=>$data,'requests'=>$request->input()]);
    }

    /**
     * 角色添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获得权限分类
        $nodes = self::nodes();
        //获得权限类别
        $controllernames = self::controllernames();
        //返回角色添加页面
        return view('admin.roles.create',['nodes'=>$nodes,'controllernames'=>$controllernames]);
    }

    /**
     * 执行角色添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesStore $request)
    {
        //开启事务
        DB::beginTransaction();
        //提交信息
        $rname = $request->input('rname');
        $nid = $request->input('nid');
        $rid = DB::table('roles')->insertGetId(['rname'=>$rname]);
        //判断是否添加成功
        if($rid){
            foreach($nid as $k => $v){
                //添加角色权限关系表
                $res = DB::table('roles_nodes')->insert(['rid'=>$rid,'nid'=>$v]);
                //判断是否添加成功
                if(!$res){
                    DB::rollBack();
                    return back()->with('error','添加失败');
                }
            }
        }
        //提交事务
        DB::commit();
        return redirect('admin/roles')->with('success','添加成功');
    }

    /**
     * 删除角色
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取用户信息
        $roles = Roles::find($id);
        //获得权限类别
        $nodes = self::nodes();
        $controllernames = self::controllernames();
        //返回删除页面
        return view('admin.roles.edit',['roles'=>$roles,'nodes'=>$nodes,'controllernames'=>$controllernames]);
    }

    /**
     * 角色修改页面
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 修改主信息
        $roles = Roles::find($id);
        $roles->rname = $request->input('rname');
        $res1 = $roles->save();
        //删除角色权限表
        $delroles = DB::table('roles_nodes')->where('rid',$id)->delete();
        foreach ($request->input('nid') as $key => $value) {
            //重新写入角色权限表
            $insert = new Rolesnodes;
            $insert->rid = $id;
            $insert->nid = $value;
            $insert->save();
        }
       //返回角色列表
        return redirect('admin/roles')->with('success','修改成功');
    }

    /**
     * 删除角色
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //开启事务
        DB::beginTransaction();
        // 删除主用户
        $res1 = Roles::destroy($id);
        // 删除用户详情
        $res2 = Rolesnodes::where('rid',$id)->delete();
        // 判断
        if($res1 && $res2){
            // 提交事务
            DB::commit();
            return redirect('admin/roles')->with('success','删除成功');
        }else{
            // 事务回滚
            DB::rollback();
            return back()->with('error','删除失败');
        }
    }
}
