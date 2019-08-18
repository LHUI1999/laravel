<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use App\Models\Users;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Usersinfo;
use App\Http\Requests\UsersStore;
use App\Http\Requests\GeRen;

class GerenController extends Controller
{
    /**
     * 个人中心
     *
     * @return \Illuminate\Http\Response
     */
    //
    public function index(Request $request)
    {
        //返回个人中心模板
        return view('home.geren.index');
    }
    /**
     * 修改个人信息
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取用户的信息
        $user=Users::find($id);
        $userinfo=Usersinfo::where('uid',$id)->first();
        $user->profile=$userinfo->profile;
        return view('home.geren.edit',['user'=>$user]);
    }


    /**
     * 执行用户信息修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GeRen $request, $id)
    {
         //检测用户是否文件上传
         if(!$request->hasfile('profile')){
            //修改用户主信息
            $user = Users::find($id);
            $user->uname = $request->input('uname','');
            $user->email = $request->input('email','');
            $user->phone = $request->input('phone','');
            //判断是否修改成功
            if($user->save()){
                //修改session
                $_SESSION['user']->email = $request->input('email','');
                $_SESSION['user']->phone = $request->input('phone','');
                $_SESSION['user']->uname = $request->input('uname','');
                return redirect('home/geren');
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
            //修改用户的主信息
            $user = Users::find($id);
            $user->uname = $request->input('uname','');
            $user->email = $request->input('email','');
            $user->phone = $request->input('phone','');
            $res2 = $user->save();
            //判断是否修改成功
            if($res1 && $res2){
                //修改session
                $_SESSION['user']->email = $request->input('email','');
                $_SESSION['user']->phone = $request->input('phone','');
                $_SESSION['user']->uname = $request->input('uname','');
                $_SESSION['user']->profile = $path;
                //提交事务
                DB::commit();
                return redirect('home/geren');
            }else{
                //事物回滚
                DB::rollBack();
                 return back()->with('error','修改失败');
            }
        }
    }
}
