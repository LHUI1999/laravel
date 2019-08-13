@extends('home.layout.index')
@section('content')
    <link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="/h/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/h/css/systyle.css" rel="stylesheet" type="text/css">

    <link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/h/css/colstyle.css" rel="stylesheet" type="text/css">


<div class="nav-table">
    <div class="long-title"><span class="all-goods">全部分类</span></div>
    <div class="nav-cont">
        <ul>
            <li class="index"><a href="#">首页</a></li>
            <li class="qc"><a href="#">闪购</a></li>
            <li class="qc"><a href="#">限时抢</a></li>
            <li class="qc"><a href="#">团购</a></li>
            <li class="qc last"><a href="#">大包装</a></li>
        </ul>
        <div class="nav-extra">
            <i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
            <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
        </div>
    </div>
</div>
<b class="line"></b>
<div class="center">
    <div class="col-main">
        <div class="main-wrap">

            <div class="user-collection">
                <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的收藏</strong> / <small>My&nbsp;Collection</small></div>
                </div>
                <hr/>

                <div class="you-like">
                    <div class="s-bar">
                        我的收藏
                        {{-- <a class="am-badge am-badge-danger am-round">降价</a>
                        <a class="am-badge am-badge-danger am-round">下架</a> --}}
                    </div>
                    @if(!$data)	
					<div style="width:500px;height:100px;margin-left:350px;margin-top:50px;">
                        <h2 class="am-article-title blog-title" style="font-weight: 700;font-size:25px;">
                            您的收藏夹还是空的呦！！！
                        </h2>
                    </div>
					@else
                    <div class="s-content">
                        @foreach($data as $k => $v)
                        <div class="s-item-wrap">
                            <div class="s-item">

                                <div class="s-pic">
                                    <a href="/home/goods?id={{$v->id}}" class="s-pic-link">
                                        <img src="/uploads/{{$v->pic->pic}}" alt="" title="" class="s-pic-img s-guess-item-img">
                                    </a>
                                </div>
                                <div class="s-info">
                                    <div class="s-title"><a href="#" title="">{{ $v->title }}</a></div>
                                    {{-- <div class="s-price-box"> --}}
                                    <div class="">
                                        <span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{ $v->price }}</em></span>
                                        {{-- <span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">68.00</em></span> --}}
                                    </div>
                                    {{-- <div class="s-extra-box">
                                        <span class="s-comment">好评: 98.03%</span>
                                        <span class="s-sales">月销: 219</span>
                                    </div> --}}
                                </div>
                                <div class="s-tp">
                                    <a href="/home/collection/delete?id={{$v->id}}">
                                        <span class="ui-btn-loading-before">删除宝贝</span>                                    
                                    </a>
                                    <i class="am-icon-shopping-cart"></i>
                                    <a href="/home/car/add?id={{$v->id}}">
                                        <span class="ui-btn-loading-before buy">加入购物车</span>
                                    </a>
                                    
                                </div>
                            </div>
                        </div>

                        @endforeach
                       

                    </div>

                    {{-- <div class="s-more-btn i-load-more-item" data-screen="0"><i class="am-icon-refresh am-icon-fw"></i>更多</div> --}}
                    @endif
                </div>

            </div>

        </div>
        
    </div>

    <aside class="menu">
        <ul>
            <li class="person active">
                <a href="index.html">个人中心</a>
            </li>
            <li class="person">
                <a href="#">个人资料</a>
                <ul>

                    <li> <a href="/home/geren">个人信息</a></li>
                    <li> <a href="/home/safe">安全设置</a></li>
                    <li> <a href="/home/address">收货地址</a></li>

                </ul>
            </li>
            <li class="person">
                <a href="#">我的交易</a>
                <ul>
                    <li><a href="/home/order">订单管理</a></li>
                    <li> <a href="change.html">退款售后</a></li>
                </ul>
            </li>
            <li class="person">
                <a href="#">我的资产</a>
                <ul>
                    <li> <a href="/home/coupon">优惠券 </a></li>
                    <li> <a href="bonus.html">红包</a></li>
                    <li> <a href="bill.html">账单明细</a></li>
                </ul>
            </li>

            <li class="person">
                <a href="#">我的小窝</a>
                <ul>
                    <li> <a href="/home/collection">收藏</a></li>
                    <li> <a href="foot.html">足迹</a></li>
                    <li> <a href="comment.html">评价</a></li>
                    <li> <a href="news.html">消息</a></li>
                </ul>
            </li>

        </ul>

    </aside>
</div>

@include('home.layout.footer')
@endsection
    