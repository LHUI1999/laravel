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
    public static function controllernames()
    {
        return [
            'usercontroller'=>'用户管理',
            'catescontroller'=>'分类管理',
            'adminusercontroller'=>'管理员管理',
            'rolescontroller'=>'角色管理',
            'nodescontroller'=>'权限管理',
            'goodscontroller'=>'商品管理',
            
            
        ];
    } 
    public static function nodes()
    {
        $nodes = DB::table('nodes')->get();
        $arr = [];
        $temp = [];
        foreach($nodes as $k=>$v){

            $temp['id'] = $v->id;
            $temp['desc'] = $v->desc;
            $temp['aname'] = $v->aname;
            $arr[$v->cname][] = $temp;

        }

        return $arr;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获得搜索内容
        $search = $request->input('search','');
        
        //获取数据
        $data = Roles::where('rname','like','%'.$search.'%')->paginate(1);
        // dd($data);
        //显示便利
        return view('admin.roles.index',['data'=>$data,'requests'=>$request->input()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $nodes = self::nodes();
        $controllernames = self::controllernames();

        return view('admin.roles.create',['nodes'=>$nodes,'controllernames'=>$controllernames]);

    }

    /**
     * Store a newly created resource in storage.
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
        if($rid){
            foreach($nid as $k => $v){
                $res = DB::table('roles_nodes')->insert(['rid'=>$rid,'nid'=>$v]);
                if(!$res){
                    DB::rollBack();
                    return back()->with('error','添加失败');
                }
            }
        }
        DB::commit();
        return redirect('admin/roles')->with('success','添加成功');
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
        $roles = Roles::find($id);
        // dd($roles);

        $nodes = self::nodes();
        $controllernames = self::controllernames();

        return view('admin.roles.edit',['roles'=>$roles,'nodes'=>$nodes,'controllernames'=>$controllernames]);
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
        // dd($id);
        // 修改主信息
        $roles = Roles::find($id);
        $roles->rname = $request->input('rname');
        $res1 = $roles->save();

        $delroles = DB::table('roles_nodes')->where('rid',$id)->delete();
      
        foreach ($request->input('nid') as $key => $value) {
            $insert = new Rolesnodes;
            $insert->rid = $id;
            $insert->nid = $value;
            $insert->save();
            
        }
       
        return redirect('admin/roles')->with('success','修改成功');
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
