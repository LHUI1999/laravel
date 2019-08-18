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
     * 管理员管理页面
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
     * 管理员添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //管理员角色
        $roles = DB::table('roles')->get();
        // 显示页面
        return view('admin.adminuser.create',['roles'=>$roles]);
    }

    /**
     * 执行管理员添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminusersStore $request)
    {
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
         $_SESSION['admin_userinfo']->profile = $adminusers->profile;
         

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
     * 管理员删除页面
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
     *管理员修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        //检测用户是否文件上传
        if(!$request->hasfile('profile')){
            //获得管理员信息
            $adminusers = Adminusers::find($id);
            //修改管理员名称
            $adminusers->uname = $request->input('uname','');
           //判断是否修改成功
            if($adminusers->save()){
                return redirect('admin/adminuser')->with('success','修改成功');
            }else{
                 return back()->with('error','修改失败');
            }
        }else{
            //开启事务
            DB::beginTransaction();
            //获取管理员信息
            $adminusers = Adminusers::where('id',$id)->first();
            //存储管理员头像
            $path = $request->file('profile')->store(date('Ymd'));
            //获得管理员角色
            $usersroles = Usersroles::where('uid',$id)->first();
            $usersroles->rid = $request->input('rname');
            //管理员角色保存
            $res1 = $usersroles->save();
            //删除图片
            Storage::delete([$adminusers->profile]);
            //设置新的图片
            $adminusers->profile = $path;
            //修改用户主信息
            $adminusers->uname = $request->input('uname','');
            //管理员信息保存
            $res2 = $adminusers->save();
            //判断两项是否都保存成功
            if($res1 && $res2){
                //事务添加
                DB::commit();
                return redirect('admin/adminuser')->with('success','修改成功');
            }else{
                //事物回滚
                DB::rollBack();
                return back()->with('error','修改失败');
            }
        }
    }

    /**
     *管理员删除
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
        // 获取用户头像
        $path = $user->profile;
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
