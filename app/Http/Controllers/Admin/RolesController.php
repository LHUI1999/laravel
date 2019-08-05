<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

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
    public function index()
    {
        $data = DB::table('roles')->get();

        //显示便利
        return view('admin.roles.index',['data'=>$data]);
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
    public function store(Request $request)
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
