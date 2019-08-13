<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //
    public function index()
    {
        return view('home.comment.index');
    }

    // 发表评论页面
    public function list()
    {
        // 获取表中的数据
    
        return view('home.comment.list');
    }
}
