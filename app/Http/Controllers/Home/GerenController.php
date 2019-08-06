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
       
        //获取session下的id
        $id=$_SESSION['user']->id;
        //查user表
        $user=DB::table('users')->where('id',$id)->first();
        //获取uid
        $uid=$_SESSION['user']->uid;
        $userinfo = DB::table('users_info')->where('uid',$user->id)->first();
        //得到的新数据覆盖旧数据
        $_SESSION['user']->uname=$user->uname;
        $_SESSION['user']->profile=$userinfo->profile;
        return view('home.geren.index',['user'=>$user,'userinfo'=>$userinfo]);
    }
    
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
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
                return redirect('home/geren')->with('success','修改成功');
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
            //修改用户的主信息
            $user = Users::find($id);
            $user->uname = $request->input('uname','');
            $user->email = $request->input('email','');
            $user->phone = $request->input('phone','');
            $res2 = $user->save();
            if($res1 && $res2){
                DB::commit();
                return redirect('home/geren')->with('success','修改成功');
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
        //
    }
}
