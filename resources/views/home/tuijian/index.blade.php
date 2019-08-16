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
                <div style='width:1515px;height:4428px;background:#E6E2D9;'>
                    <div>
                        <div style='background:#EEEBE2;width:908px;height:300px;float:left;margin-left:304px;margin-top:50px;border-radius:18px;border:3px solid #B88E66;'>
                            <div>
                            
                                <div style="background:#ccc;width:352px;height:210px;float:left;margin-left:95px;margin-top:41px;border-radius:18px;">

                                    <img src="/uploads/{{ $aa->pic }}" style="float:left;margin-left:0px;margin-top:0px;width:352px;height:210px;border-radius:18px;" alt="">
                                </div>
                                 <div style="background:#F0EAD3;width:405px;height:47px;float:left;margin-left:22px;margin-top:138px;">
                                    <div>
                                        <span style="font-size:18px;color:#B88E66;float:left;margin-left:15px;margin-top:12px;">名称:</span>
                                        <span style="float:left;margin-left:15px;margin-top:12px;font-size:18px;color:#B88E66;">{{ $aa->title }}</span>
                                    </div>
                                </div>
                                <div style="background:#EEEBE2;border:2px solid #EEEBE2;border-radius:18px;width:75px;height:48px;float:left;margin-left:-336px;margin-top:224px;">
                                        <div>
                                            <span style="color:#B88E66;font-size:18px;float:left;margin-left:-54px;margin-top:-27px;">价格:</span>
                                            <span style="float:left;margin-left:2px;margin-top:-26px;font-size:18px;color:#B8645E;">￥{{ $aa->price }}</span>
                                        
                                        </div>

                                </div>
                                <div style="background:#EEEBE2;width:185px;height:50px;float:left;margin-left:-244px;margin-top:193px;">
                                        <div>
                                            <a href="/home/goods?id={{ $aa->id }}">
                                                <button style="background:#C21821;font-size:18px;border-radius:18px;width:127px;height:35px;float:left;color:white;border:2px solid #E04B4B">点击购买</button>
                                            
                                            </a>
                                        </div>
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
                                        @if($k<=2)
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
                                        @endif
                                        @endforeach
                                </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
   </div>
@endsection