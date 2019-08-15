<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Comment;
use App\Models\Commentpic;
use DB;
use Storage;

class CommentController extends Controller
{
    //
    public function index(Request $request)
    {
    	$order = DB::table('order_info')->where('oid',$request->oid)->get();
    	foreach($order as $k=>$v){
    		$order[$k]->goods = DB::table('goods')->select('price','title')->where('id',$v->gid)->first();
    		$order[$k]->pic = DB::table('goods_pic')->select('pic')->where('gid',$v->gid)->first();
    	}
    	dump($order);
        return view('home.comment.index',['order'=>$order]);
    }

    //添加评论
    public function store(Request $request)
    {
    	dump($request->all());
    	foreach($request->text as $k=>$v)
    	{
    		$comment = new Comment;
    		$comment->gid = $k;
    		$comment->uid = $_SESSION['user']->id;
    		$comment->text = $v[0];
    		$comment->oid = $request->oid;
    		if($comment->save()){
    			if($request['pic']){
    				//存储图片
			        $pic = [];
			        //获取商品图片
			        foreach($request['pic'] as $c=>$d){
			            foreach($d as $cc=>$dd)
			            {
			            	$pic[$c][]=$dd->store(date('Ymd'));

			            }
			        }
			        //存储图片
			    	foreach($pic as $a=>$b)
			    	{
			    		if($a == $k){
			    			foreach($b as $aa=>$bb){
			    				$commentpic = new Commentpic;
					    		$commentpic->cmid = $comment->id;
					    		$commentpic->cmpic = $bb;
					    		$commentpic->save();
			    			}
			    		}	    		
			    	}
    			}
    			
    		}
    	}

    	//存储订单评价等级
    	foreach($request->level as $k=>$v)
    	{
    		$comment = Comment::where('gid',$k)->where('oid',$request->oid)->first();
    		dump($comment);
    		$comment->level = $v[0];
    		if($comment->save()){

            }
    	}
    	//更改订单状态
    	$order = Orders::find($request->oid);
    	$order->status = '4';
    	if($order->save()){
    		return redirect('home/order');
    	}


    	
    }
}
