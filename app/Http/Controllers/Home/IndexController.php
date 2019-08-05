<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Cates;

class IndexController extends Controller
{

    public static function getPidCatesData($pid = 0)
    {
        //获取一级分类
        $data = Cates::where('pid',$pid)->get();
        foreach($data as $k => $v){
            // $erji = Cates::where('pid',$v->id)->get();
            // $v->sub = $erji;
            $v->sub = self::getPidCatesData($v->id);

        }
        return $data;
    }

    //前台首页
    public function index()
    {
        // $cate_data = self::getPidCatesData(0);
        // dump($data);

    	return view('home.index.index');
    }


}
