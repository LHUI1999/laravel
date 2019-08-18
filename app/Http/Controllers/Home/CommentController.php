<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Comment;
use App\Models\Commentpic;
use App\Models\Goods;
use App\Models\Goodspic;
use App\Models\Users;
use DB;
use Storage;

class CommentController extends Controller
{
    /**
     * 商品评价
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //订单信息
    	$order = DB::table('order_info')->where('oid',$request->oid)->get();
    	foreach($order as $k=>$v){
            //商品名称价格
    		$order[$k]->goods = DB::table('goods')->select('price','title')->where('id',$v->gid)->first();
            //商品图片
    		$order[$k]->pic = DB::table('goods_pic')->select('pic')->where('gid',$v->gid)->first();
    	}
        return view('home.comment.index',['order'=>$order]);
    }

    /**
     * 添加商品评论
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取商品评论信息
    	foreach($request->text as $k=>$v)
    	{
            //写入数据库
    		$comment = new Comment;
    		$comment->gid = $k;
    		$comment->uid = $_SESSION['user']->id;
    		$comment->text = $v[0];
    		$comment->oid = $request->oid;
            //判断是否写入成功
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
                        //判断评价图片是否对应评价商品
			    		if($a == $k){
			    			foreach($b as $aa=>$bb){
                                //写入评价图片库
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
    		$comment->level = $v[0];
            $comment->save();
    	}
    	//更改订单状态
    	$order = Orders::find($request->oid);
    	$order->status = '4';
    	if($order->save()){
    		return redirect('home/order');
    	}
    }

    /**
     * 评价管理
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comment()
    {
		// 获取用户id
		$id = $_SESSION['user']->id;
		// 获取表中的数据
		$data = DB::table('comment')->where('uid',$id)->get();
        foreach($data as $k=>$v){
            //商品名称
			$v->goods = Goods::select('id','title')->where('id',$v->gid)->first();
            //商品图片
			$v->gpic = Goodspic::select('pic')->where('gid',$v->gid)->first();
            //商品评价图片
            $v->cmpic = Commentpic::select('cmpic')->where('cmid',$v->id)->get();
		}
        return view('home.comment.comment',['data'=>$data]);
    }
}
