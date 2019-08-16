<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Goodspic;
use App\Models\Goodsinfopic;
use App\Http\Requests\GoodsStore;
use App\Http\Requests\GoodsUpdate;
use App\Models\Users;
use App\Models\Orders;
use App\Models\Orderinfo;
use App\Models\Commentpic;

use DB;
use Storage;

class GoodsController extends Controller
{
    /**
     * 商品列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //获得搜索内容
        $search = $request->input('search','');
        //获取商品数据
        $goods=Goods::where('title','like','%'.$search.'%')->paginate(3);
        //获得商品图片
        $goodspic = DB::table('goods_pic')->get();
        //获得商品详情图片
        $goodsinfopic = DB::table('goods_infopic')->get();

        return view('admin.goods.index',['goods'=>$goods,'goodspic'=>$goodspic,'goodsinfopic'=>$goodsinfopic,'requests'=>$request->input()]);
    }

    /**
     * 商品添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //所属分类
        $cates = DB::table('cates')->where('pid',0)->get();

        return view('admin.goods.create' ,['cates'=>$cates]);
    }

    /**
     * 处理商品添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodsStore $request)
    {
         if(!$request->hasFile('infopic')){
            return back();
         }
        // dd($request->all());
        // 检测文件上传
        if($request->hasFile('goodspic')){
            $goodspic = [];
            $infopic = [];
            //获取商品图片
            foreach($request['goodspic'] as $k=>$v){
                $goodspic[$k]=$v->store(date('Ymd'));
            }
            //获取商品详情图片
            foreach($request['infopic'] as $k=>$v){
                $infopic[$k]=$v->store(date('Ymd'));
            }
            
        }else{
            return back();
        }
        //添加商品主信息
        $goods = new Goods;
        $goods->title = $request->input('title');
        $goods->price = $request->input('price');
        $goods->num = $request->input('num');
        $goods->cid = $request->input('cates');
        //判断主信息是否添加成功
        if($goods->save()){
            $gid = $goods->id;
            //添加商品图片库
            foreach($goodspic as $k => $v){
                $goodspic = new Goodspic;
                $goodspic->gid = $gid;
                $goodspic->pic = $v;
                $goodspic->save();
            }
            //添加商品详情库
            foreach($infopic as $k => $v){
                $infopic = new Goodsinfopic;
                $infopic->gid = $gid;
                $infopic->infopic = $v;
                $infopic->save();
            }

            return redirect('admin/goods')->with('success','添加成功');

        }

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
     * 商品修改
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //商品信息
        $goods = Goods::where('id',$id)->get();
        //商品图片
        $goodspic = Goodspic::where('gid',$id)->get();
        //商品详情图片
        $goodsinfopic = Goodsinfopic::where('gid',$id)->get();

        //所属分类
        $cates = DB::table('cates')->where('pid',0)->get();
        // dd($goods);

        return view('admin.goods.edit',['goods'=>$goods,'goodspic'=>$goodspic,'goodsinfopic'=>$goodsinfopic,'cates'=>$cates]);
    }

    /**
     * 执行商品修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoodsUpdate $request, $id)
    {


        //检测用户是否文件上传
        if(!$request->hasfile('goodspic') && !$request->hasfile('infopic')){
            $goods = Goods::find($id);
            $goods->title = $request->input('title',$goods->title);
            $goods->price = $request->input('price',$goods->price );
            $goods->num = $request->input('num',$goods->num);
            if($goods->save()){
                return redirect('admin/goods')->with('success','修改成功');

            }else{
                return back();

            }
        }else{
            //修改商品主信息
            $goods = Goods::find($id);
            $goods->title = $request->input('title');
            $goods->price = $request->input('price');
            $goods->num = $request->input('num');

            if($request->hasfile('goodspic')){
                //查找商品图片
                $goodspic=Goodspic::where('gid',$id)->get();
                //获得图片路径
                $pathpic = [];
                foreach($goodspic as $k => $v){
                    $pathpic[$k] = $v->pic;
                }
                  // 删除商品图片
                $res1 = Goodspic::where('gid',$id)->delete();
                 //删除图片
                Storage::delete($pathpic);

                 // 检测文件上传
                $goodspic = [];
                 //获取商品图片
                foreach($request['goodspic'] as $k=>$v){
                    $goodspic[$k]=$v->store(date('Ymd'));
                }
                //判断主信息是否添加成功
                if($goods->save()){
                    $gid = $goods->id;
                    //添加商品图片库
                    foreach($goodspic as $k => $v){
                        $goodspic = new Goodspic;
                        $goodspic->gid = $gid;
                        $goodspic->pic = $v;
                        $goodspic->save();
                    }
                }
            }
            if($request->hasfile('infopic')){
                 //查找商品详情图片
                $goodsinfopic=Goodsinfopic::where('gid',$id)->get();
                
                //获得详情图片路径
                $pathinfopic = [];
                foreach($goodsinfopic as $kk => $vv){
                    $pathinfopic[$kk] = $vv->infopic;
                }
               
                 // 删除商品详情图片
                $res2 = Goodsinfopic::where('gid',$id)->delete();
                Storage::delete($pathinfopic);
                //存储新的图片
           
                $infopic = [];
               
                //获取商品详情图片
                foreach($request['infopic'] as $k=>$v){
                    $infopic[$k]=$v->store(date('Ymd'));
                }
                 if($goods->save()){
                    $gid = $goods->id;
                      //添加商品详情库
                    foreach($infopic as $k => $v){
                        $infopic = new Goodsinfopic;
                        $infopic->gid = $gid;
                        $infopic->infopic = $v;
                        $infopic->save();
                    }

                }

               

            }

            //删除文件夹中图片

                return redirect('admin/goods')->with('success','修改成功');

            }
        }
    

    /**
     * 删除商品
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //开启事务
        DB::beginTransaction();
        //删除主信息
        $res1 = Goods::destroy($id);

        //查找商品图片
        $goodspic=Goodspic::where('gid',$id)->get();
        //查找商品图片
        $goodsinfopic=Goodsinfopic::where('gid',$id)->get();
        //获得图片路径
        $pathpic = [];
        foreach($goodspic as $k => $v){
            $pathpic[$k] = $v->pic;
        }
        //获得详情图片路径
        $pathinfopic = [];
        foreach($goodsinfopic as $kk => $vv){
            $pathinfopic[$kk] = $vv->infopic;
        }
        
         // 删除商品图片
        $res2 = Goodspic::where('gid',$id)->delete();
         // 删除商品详情图片
        $res3 = Goodsinfopic::where('gid',$id)->delete();


        if($res1 && $res2 &&$res3){
            //删除图片
            Storage::delete($pathpic);
            Storage::delete($pathinfopic);
            //提交事务
            DB::commit();
            return redirect('admin/goods')->with('success','删除成功');
        }else{
            //事务回滚
            DB::rollback();
            return back()->with('error','删除失败');
        }
        
    }

    // 商品评论
    public function comment($id)
    {
        $data = DB::table('comment')->where('gid',$id)->get();
        foreach($data as $k=>$v){
            $v->user = Users::select('uname')->where('id',$v->uid)->first();
            $v->cmpic = Commentpic::select('cmpic')->where('cmid',$v->id)->get();
        }
        // dd($data);
        return view('admin.goods.comment',['data'=>$data]);
    }

    
}
