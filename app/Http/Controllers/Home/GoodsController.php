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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        dump($request->all());
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
         $look = Goods::where('cid',rand(9,16))->take(5)->get();

         //评价
         $comment = DB::table('comment')->where('gid',$request->id)->paginate(2);
         foreach($comment as $k=>$v){
             $v->user = Users::select('uname')->where('id',$v->uid)->first();
             $v->upic = Usersinfo::select('profile')->where('uid',$v->uid)->first();
             $v->cmpic = Commentpic::select('cmpic')->where('cmid',$v->id)->get();
             

         }
         //评价条数
         $commentcount = Comment::where('gid',$request->id)->count();
         
         dump($comment);
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
         
         return view('home.goods.index',['goods'=>$goods,'look'=>$look,'coll'=>$coll,'comment'=>$comment,'commentcount'=>$commentcount,'level1'=>$level1,'level2'=>$level2,'level3'=>$level3,'id'=>$id]);
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo "1";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        echo "11";

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
        echo "111";

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        echo "1111";

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        echo "11111";

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
        echo "111111";

    }
}
