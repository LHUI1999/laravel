<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Adminusers;
use Illuminate\Support\Facades\Hash;
use App\Models\Usersroles;
use App\Models\Roles;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AdminusersStore;

class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获得搜索内容
        $search = $request->input('search','');

        // 获取数据
        $adminuser = Adminusers::where('uname','like','%'.$search.'%')->paginate(5);
        return view('admin.adminuser.index',['adminusers'=>$adminuser,'requests'=>$request->input()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::table('roles')->get();

        // 显示页面
        return view('admin.adminuser.create',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminusersStore $request)
    {
        //
        // dd($request->all());

        //检测文件上传
        if($request->hasFile('profile')){
            //获取头像
            $path=$request->file('profile')->store(date('Ymd'));
        }else{
            return back();
        }

        //开启事务
        DB::beginTransaction();

        $adminusers = new Adminusers;
        // 上传的信息
        $uname = $request->input('uname');
        $upass = Hash::make($request->input('upass'));
        // 上传头像
        $adminusers->profile = $path;
        $rid = DB::table('roles')->select('id')->get();
        $uid = DB::table('admin_users')->insertGetId(['uname'=>$uname,'upass'=>$upass,'profile'=>$adminusers->profile]);
        
        // 判断头像信息是否上传成功
        if($uid){
           
            $res = DB::table('users_roles')->insert(['uid'=>$uid,'rid'=>$request->input('rname')]);
            if(!$res){
                DB::rollBack();
                return back()->with('error','添加失败');
            }
            
        }
        // 事务添加
        DB::commit();
        return redirect('admin/adminuser')->with('success','添加成功');


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
        $roles = DB::table('roles')->get();
        //  获得用户信息
        $adminusers = Adminusers::find($id);
  
        return view('admin.adminuser.edit',['adminusers'=>$adminusers,'roles'=>$roles]);

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
        
        //检测用户是否文件上传
        if(!$request->hasfile('profile')){
            $adminusers = Adminusers::find($id);
            $adminusers->uname = $request->input('uname','');
           
            if($adminusers->save()){
                return redirect('admin/adminuser')->with('success','修改成功');
            }else{
                 return back()->with('error','修改失败');
            }
        }else{

            //开启事务
            DB::beginTransaction();
            $adminusers = Adminusers::where('id',$id)->first();

            $path = $request->file('profile')->store(date('Ymd'));
            // dd($path);
            $usersroles = Usersroles::where('uid',$id)->first();

            $usersroles->rid = $request->input('rname');

            $res1 = $usersroles->save();

            //删除图片
            Storage::delete([$adminusers->profile]);

            //设置新的图片
            $adminusers->profile = $path;
           
            //修改用户主信息
            $adminusers->uname = $request->input('uname','');
            $res2 = $adminusers->save();

            if($res1 && $res2){
                DB::commit();
                return redirect('admin/adminuser')->with('success','修改成功');
            }else{
                DB::rollBack();
                return back()->with('error','修改失败');
            }
        }
        // dump($request->all());
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
        $user = Adminusers::where('id',$id)->first();
        // dd($user);
        $path = $user->profile;

        // 获取用户头像

        // 删除用户详情
        $res2 = Usersroles::where('uid',$id)->delete();
        $res1 = Adminusers::destroy($id);

        // 判断
        if($res1 && $res2){
            // 删除图片
            Storage::delete([$path]);

            // 提交事务
            DB::commit();
            return redirect('admin/adminuser')->with('success','删除成功');
        }else{
            // 回滚事务
            DB::rollback();
            return back()->with('error','删除失败');
        }
    }
}
