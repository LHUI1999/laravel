@extends('home.layout.index');
<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/h/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/h/css/colstyle.css" rel="stylesheet" type="text/css">
@section('content')

   <div class='container'>
        <div class='head'>
            <div class=image>
                <img src="/h/images/tunhuo.jpg" alt="">
            </div>
            <div>
                <div style='width:1515px;height:3352px;background:#649DD3;'>
                    <div>
                        <img src="/h/images/tun1.png" style="width:900px;float:left;margin-left:323px;" alt="">
                        <img src="/h/images/tun2.jpg" style="width:900px;float:left;margin-left:323px;" alt="">
                        <img src="/h/images/tun3.jpg" style="width:900px;float:left;margin-left:323px;" alt="">
                        <img src="/h/images/tun5.jpg" style="width:900px;float:left;margin-left:323px;margin-top:72px;" alt="">
                        
                    </div>
                    <div style="margin-top:50px;float:left;margin-left:303px;">
                            <div class="s-content" style="">
                                    @foreach ($data as $k=>$v )
                                    @if($k<=2)
                                     <div class="s-item-wrap" style="width:300px;height:470px;background:#E6E2D9;border:3px solid #BD9367;border-radius:18px;">
                                            <div class="s-item">
                                                <div class="s-pic">
                                                <a href="/home/goods?id={{ $v->id }}" class="s-pic-link" style="">
                                                    <img  src="/uploads/{{ $v->pic->pic }}" alt="" title="" class="s-pic-img s-guess-item-img">
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
                                                    <button style="width:250px;height:42px;background:#C90029;float:left;margin-left:25px;border:2px solid #EAC399;border-radius:15px;margin-top:10px;color:#ccc;">加入购物车</button>
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
@endsection