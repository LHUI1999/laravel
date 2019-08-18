<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStore;
use App\Models\Users;
use App\Models\Usersinfo;
use App\Models\Address;
use Hash;
use DB;
use Storage;

class UserController extends Controller
{
    /**
     * 用户首页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获得搜索内容
        $search = $request->input('search','');
        //获取数据
        $users=Users::where('uname','like','%'.$search.'%')->paginate(1);
        
        return view("admin.users.index",['users'=>$users,'requests'=>$request->input()]);
    }

    /**
     * 显示添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示页面
        return view("admin.users.create");
    }

    /**
     * 执行添加操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStore $request)
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
        //实例化模型
        //上传用户主信息
        $user = new Users;
        $user->uname = $request->input('uname');
        $user->upass = Hash::make($request->input('upass'));
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $res1 = $user->save();
        // 上传头像
        $userinfo = new Usersinfo;
        $userinfo->uid = $user->id;
        $userinfo->profile = $path;
        $res2 = $userinfo->save();
        //判断头像he信息是否上传成功
        if($res1 && $res2){
            //事务添加
            DB::commit();
            return redirect('admin/users')->with('success','添加成功');
        }else{
            // 事务回滚
            DB::rollback();
            return back()->with('error','添加失败');
        }
    }

    /**
     * 修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //获得用户信息
        $user = Users::find($id);
        $userinfo = Usersinfo::where('uid',$id)->first();
        $user->profile = $userinfo->profile;
        //返回用户修改模板
        return view('admin.users.edit',['user'=>$user]);
    }

    /**
     * 中兴用户修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //检测用户是否文件上传
        if(!$request->hasfile('profile')){
            $user = Users::find($id);
            $user->email = $request->input('email','');
            $user->phone = $request->input('phone','');
            //判断用户是否修改成功
            if($user->save()){
                return redirect('admin/users')->with('success','修改成功');
            }else{
                 return back()->with('error','修改失败');
            }
        }else{
            //开启事务
            DB::beginTransaction();
            //获得图片路径
            $path = $request->file('profile')->store(date('Ymd'));
            $userinfo = Usersinfo::where('uid',$id)->first();
            //删除图片
            Storage::delete([$userinfo->profile]);
            //设置新的图片
            $userinfo->profile = $path;
            //执行修改
            $res1 = $userinfo->save();
            //修改用户主信息
            $user = Users::find($id);
            $user->email = $request->input('email','');
            $user->phone = $request->input('phone','');
            $res2 = $user->save();
            //判断是否添加成功
            if($res1 && $res2){
                DB::commit();
                return redirect('admin/users')->with('success','修改成功');
            }else{
                DB::rollBack();
                 return back()->with('error','修改失败');
            }
        }
    }

    /**
     * 用户删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //开启事务
        DB::beginTransaction();
        //删除主信息
        $res1 = Users::destroy($id);
        //查找图片
        $userinfo=Usersinfo::where('uid',$id)->first();
        //获得图片路径
        $path=$userinfo->profile;
         // 删除头像
        $res2 = Usersinfo::where('uid',$id)->delete();
        //判断是否删除成功
        if($res1 && $res2){
            //删除图片
            Storage::delete([$path]);
            //提交事务
            DB::commit();
            return redirect('admin/users')->with('success','删除成功');
        }else{
            //事务回滚
            DB::rollback();
            return back()->with('error','删除失败');
        }
    }

    /**
     * 收获地址
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function address(Request $request,$id)
    {
        //获得搜索内容
        $search = $request->input('search','');
        // 获取信息
        $data = DB::table('address')->where('uid',$id)->where('uname','like','%'.$search.'%')->paginate(2);
        return view('admin.users.address',['data'=>$data,'requests'=>$request->input()]);
    }
}
