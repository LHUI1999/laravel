@extends('home.layout.index');
<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/h/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/h/css/colstyle.css" rel="stylesheet" type="text/css">
@section('content')

   <div class='container'>
        <div class='head'>
            <div class=image>
                <img src="/h/images/lang.jpg" alt="">
            </div>
            


            <div>
                <div style='width:1515px;height:539px;background:#FDC9CB;'>
                    <div>
                        <img src="/h/images/lang1.jpg" style="width:794px;float:left;margin-left:357px;" alt="">
                       
                            
                        
                        <div style="width:1100px;background:#FDC9CB;height:385px;float:left;margin-left:214px;margin-top:74px;">
                                @foreach ($data as $k=>$v)
                                @if($k<=1)
                            <div style="float:left;margin-left:13px;margin-top:15px;width:499px;height:239px;background:white;border:3px solod #ccc;">
                                <img style="width:165px;height:165px;float:left;margin-left:41px;margin-top:36px;" src="/uploads/{{ $v->pic }}" alt="">
                                <div style="background:white;width:194px;height:50px;float:left;margin-left:63px;margin-top:43px;">
                                    <span style="color:#444748;float:left;margin-left:15px;margin-top:15px;font-size:17px;">{{ $v->title }}</span>
                                </div>
                                <div style="background:#FD2A32;width:97px;height:50px;float:left;margin-left:63px;margin-top:59px;">
                                    <span style="font-size:20px;float:left;margin-left:15px;margin-top:13px;color:white;">￥{{ $v->price }}</span>
                                    
                                </div>
                                <div style="background:#FD2A32;width:97px;height:50px;float:left;margin-left:361px;margin-top:-50px;">
                                    <a href="/home/goods?id={{ $v->id }}">
                                        <button style="float:left;margin-left:26px;margin-top:9px;color:white;font-size:20px;background:#FD2A32;border:1px solid #FD2A32;">购买</button>
                                    
                                    </a>   
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