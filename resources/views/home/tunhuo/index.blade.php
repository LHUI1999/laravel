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
   
            {{-- 商品 --}}
            <div>
                <div style='width:1515px;height:3352px;background:#649DD3;'>
                    <div>
                        <img src="/h/images/tun1.png" style="width:900px;float:left;margin-left:323px;" alt="">
                        <img src="/h/images/tun2.jpg" style="width:900px;float:left;margin-left:323px;" alt="">
                        <img src="/h/images/tun3.jpg" style="width:900px;float:left;margin-left:323px;" alt="">
                        <img src="/h/images/tun5.jpg" style="width:900px;float:left;margin-left:323px;margin-top:72px;" alt="">
                        
                    </div>
                    <div>
                        @foreach ($data as $k=>$v )
                            
                       
                        <div style="float:left;margin-left:331px;margin-top:69px;width:257px;height:344px;background:#A2C1DE;border:3px solid #FFFCF7;border-radius:18px;">
                            <img src="/uploads/{{ $v->pic }}" alt="">
                            <div style="width:196px;height:34px;float:left;margin-left:10px;margin-top:10px;">
                                <span style="font-size:17px;float:left;margin-left:3px;margin-top:4px;color:#051B28;font-weight:bold">{{ $v->title }}</span>
                                <span style="font-size:15px;float:left;margin-left:-66px;margin-top:33px;color:#FD2A32;">价格
                                    <span style="font-size:20px;">￥{{ $v->price }}</span>
                                </span>
                                <a href="/home/goods?id={{ $v->id }}">
                                <button style="width:64px;height:25px;color:#FFFCF7;background:#FD2A32;float:left;margin-left:152px;margin-top:8px;border:1px solid #C7003E;border-radius:5px;">购买</button>

                                </a>
                            </div>
                        </div>
                        
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
   </div>
@endsection