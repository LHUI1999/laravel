@extends('home.layout.index');
<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/h/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/h/css/colstyle.css" rel="stylesheet" type="text/css">
@section('content')

   <div class='container'>
        <div class='head'>
            <div class=image>
                <img src="/h/images/xueyuchang.jpg" alt="">
            </div>
         
            <div>
                <div style='width:1500px;height:4495px;background:#E6E2D9;'>
                    <div>
                        <div style='background:#EEEBE2;width:908px;height:300px;float:left;margin-left:304px;margin-top:50px;border-radius:18px;border:3px solid #B88E66;'>
                            <div>
                                    
                                
                                <div style='background:#C21821;width:342px;height:70px;float:left;margin-left:104px;margin-top:58px;border:5px solid #FECFA5;border-radius:18px;'>
                                    <span style='font-size:45px;float:left;margin-left:82px;margin-top:-4px;color:#EBFEF4;'>绿色食品</span>
                                    <span style="float:left;margin-left:60px;margin-top:39px;color:#797873;font-size:32px;">{{ $aa->title }}</span>
                                    <span style="float:left;margin-left:-72px;margin-top:99px;color:#C90903;font-size:38px;">￥{{ $aa->price }}</span>
                                    <a href="/home/goods?id={{ $aa->id }}">
                                            <button style="float:left;margin-left:178px;margin-top:30px;width:150px;height:30px;background:#C21821;border:2px solid #FECFA5;border-radius:9px;">购买</button>


                                    </a>
                                </div>
                                <div>

                                    <img src="/uploads/{{ $aa->pic }}" style="float:left;margin-left:31px;margin-top:24px;width:399px;height:233px;border-radius:18px;" alt="">
                                </div>
                            </div>
                        </div>
                        {{-- 产品说明 --}}
                        <div>
                            <div>
                                <img style="margin-top:15px;width:906px;height:200px;float:left;margin-left:310px;" src="/h/images/dd.jpg" alt="">
                                <img style="margin-top:0px;width:906px;float:left;margin-left:310px;" src="/h/images/jieshao.jpg" alt="">
                                <img style="margin-top:0px;width:906px;float:left;margin-left:310px;" src="/h/images/canshu.jpg" alt="">
                                <img style="margin-top:0px;width:906px;float:left;margin-left:310px;" src="/h/images/dazao.jpg" alt="">
                                <img style="margin-top:0px;width:906px;float:left;margin-left:310px;" src="/h/images/qq.png" alt="">
                                
                            </div>
                        </div>
                        {{-- 好物推荐 --}}
                        <div>
                            <div>
                                <div style="width:907px;height:81px;background:#EEEBE2;float:left;margin-left:305px;margin-top:42px;border-radius:18px;border:3px solid #B88E66;">
                                    <span style="font-size:30px;float:left;margin-left:353px;margin-top:16px;color:#B8645E;">好物推荐</span>
                                </div>
                            </div>
                        </div>    
                        <div style="margin-top:50px;float:left;margin-left:303px;">
                                <div class="s-content" style="">
                                        @foreach ($data as $k=>$v )
                                        <div class="s-item-wrap" style="width:300px;height:425px;background:#E6E2D9;border:3px solid #BD9367;border-radius:18px;">
                                            <div class="s-item">
                                                <div class="s-pic">
                                                <a href="/home/goods?id={{ $v->id }}" class="s-pic-link" style="">
                                                    <img  src="/uploads/{{ $v->pic }}" alt="" title="" class="s-pic-img s-guess-item-img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="s-info">
                                                    <div class="s-title">
                                                        <a href="#" title="" style="color:#888782;font-size:22px;float:left;margin-left:12px;">{{ $v->title }}</a>
                                                    </div>
                                            </div>  
                                            <div>
                                                <div style="width:300px;height:42px;margin-top:46px;">
                                                    <span style="float:left;margin-left:10px;margin-top:10px;color:#FF0036;">价格：￥{{ $v->price }}元</span>
                                                </div>
                                                <div style="width:300px;height:42px;margin-top:1px;">
                                                    <button style="width:250px;height:42px;background:#C90029;float:left;margin-left:25px;border:2px solid #EAC399;border-radius:15px;color:#ccc;">加入购物车</button>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
   </div>
@endsection