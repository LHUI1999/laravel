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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //
    public function index(Request $request)
    {

        return view('home.geren.index');
    }
    

    /**
     * Show the form for editing the specified resource.
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GeRen $request, $id)
    {
         //检测用户是否文件上传
         if(!$request->hasfile('profile')){
            $user = Users::find($id);
            $user->uname = $request->input('uname','');
            $user->email = $request->input('email','');
            $user->phone = $request->input('phone','');
            if($user->save()){
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
            $path = $request->file('profile')->store(date('Ymd'));
            $userinfo = Usersinfo::where('uid',$id)->first();
            //删除图片
            Storage::delete([$userinfo->profile]);
            //设置新的图片
            $userinfo->profile = $path;
            //执行修改
            $res1 = $userinfo->save();
            // dd($path);
            //修改用户的主信息
            $user = Users::find($id);
            $user->uname = $request->input('uname','');
            $user->email = $request->input('email','');
            $user->phone = $request->input('phone','');
            $res2 = $user->save();
            if($res1 && $res2){
                $_SESSION['user']->email = $request->input('email','');
                $_SESSION['user']->phone = $request->input('phone','');
                $_SESSION['user']->uname = $request->input('uname','');
                $_SESSION['user']->profile = $path;
                DB::commit();
                return redirect('home/geren');
            }else{
                DB::rollBack();
                 return back()->with('error','修改失败');
            }
        }
    }
}
