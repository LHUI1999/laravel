<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Goods;
use App\Models\Users;
use App\Models\Usersinfo;
use App\Models\Comment;
use App\Models\Commentpic;

class GoodsController extends Controller
{
    /**
     * 商品详情页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取id
        $id=$request->id;
        // 判断是否收藏
        if(isset($_SESSION['collection'][$id])){
            $coll=1;
        }else{
            $coll=2;
        }
        //获取id相对应商品的数据
        $goods=DB::table('goods')->where('id',$id)->get();
         //获得商品图片
         $goods->pic = DB::table('goods_pic')->where('gid',$id)->get();
         //获得商品详情图片
         $goods->infopic = DB::table('goods_infopic')->where('gid',$id)->get();
        //看了又看
         $look = Goods::where('cid',rand(9,16))->take(3)->get();
         //评价
         $comment = DB::table('comment')->where('gid',$request->id)->paginate(2);
         //销量
         $order = DB::table('order_info')->where('gid',$request->id)->count();
         foreach($comment as $k=>$v){
            //用户名称
             $v->user = Users::select('uname')->where('id',$v->uid)->first();
             //用户头像
             $v->upic = Usersinfo::select('profile')->where('uid',$v->uid)->first();
             //评价图片
             $v->cmpic = Commentpic::select('cmpic')->where('cmid',$v->id)->get();
         }
         //评价条数
         $commentcount = Comment::where('gid',$request->id)->count();
         //好评条数
         $level3= 0;
         foreach($comment as $k=>$v){
            if($v->level==3){
                $level3 +=1;
            }
         }
         //中评
         $level2= 0;
         foreach($comment as $k=>$v){
            if($v->level==2){
                $level2 +=1;
            }
         }
         //差评
         $level1= 0;
         foreach($comment as $k=>$v){
            if($v->level==1){
                $level1 +=1;
            }
         }
         //猜你喜欢
         $like = DB::table('goods')->where('cid',$goods[0]->cid)->take(12)->get();
         foreach($like as $k=>$v)
         {
            $like[$k]->pic = DB::table('goods_pic')->select('pic')->where('gid',$v->id)->first();
         }
         //返回商品详情
         return view('home.goods.index',['goods'=>$goods,'look'=>$look,'coll'=>$coll,'comment'=>$comment,'commentcount'=>$commentcount,'level1'=>$level1,'level2'=>$level2,'level3'=>$level3,'id'=>$id,'order'=>$order,'like'=>$like]);
 
    }

}
