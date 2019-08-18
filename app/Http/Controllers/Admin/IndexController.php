<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;

class IndexController extends Controller
{
    /**
     * 后台首页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 搜索
        $search = $request->input('search','');
        // 获取数据(搜索使用where里面的条件)
        $users = Users::where('uname','like','%'.$search.'%')->paginate(2);
        // 加载模板
        return view('admin.index.index',['users'=>$users,'requests'=>$request->input()]);
    }
}
