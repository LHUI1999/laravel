@extends('home.layout.index')
@section('content')
<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
        <link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

        <link href="/h/css/personal.css" rel="stylesheet" type="text/css">
        <link href="/h/css/infstyle.css" rel="stylesheet" type="text/css">
        <script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="/h/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>

<div class="center">
        <div class="col-main">
            <div class="main-wrap">
              
                <div class="user-info">
                    <!--标题 -->
                    <div class="am-cf am-padding">
                        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
                    </div>
                    <hr>

                    <!--头像 -->
                    <div class="user-infoPic">

                        <div class="filePic">
                            <input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*"> 
                            <img style="border-radius: 50%;width:100px" src="/uploads/{{$_SESSION['user']->profile}}">
                        </div>
                        <p class="am-form-help">头像</p>

                        <div class="info-m">
                            <div><b>昵称：<i>{{ $_SESSION['user']->uname }}</i></b></div>
                            <div class="u-level">
                                <span class="rank r2">
                                     <s class="vip1"></s><a class="classes" href="#">铜牌会员</a>
                                </span>
                            </div>
                            <div class="u-safety">
                                <a href="safety.html">
                                 账户安全
                                <span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">60分</i></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!--个人信息 -->
                    <div class="info-main">
                        <form class="am-form am-form-horizontal">
                            
                            <div class="am-form-group">
                                <label for="user-name" class="am-form-label">昵称</label>
                                <div class="am-form-content">
                                    <input type="text"disabled id="user-name2" value="{{$_SESSION['user']->uname}}" placeholder="请填写你的昵称">

                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-phone" class="am-form-label">电话</label>
                                <div class="am-form-content">
                                    <input id="user-phone"disabled  value="{{$_SESSION['user']->phone}}"  placeholder="请填写你的电话" type="tel">

                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-email" class="am-form-label">电子邮件</label>
                                <div class="am-form-content">
                                    <input id="user-email"disabled value="{{$_SESSION['user']->email}}" placeholder="请填写你的Email" type="email">
                                </div>
                            </div>
                            <div class="info-btn">
                                   <a href="/home/geren/{{ $_SESSION['user']->id }}/edit"><div class="am-btn am-btn-danger"> 点击完善个人信息</div></a> 
                            </div>
                        </form>
                    </div>
                </div>
              
            </div>
        </div>
        <aside class="menu">
            <ul>
                <li class="person active">
                    <a href="/home/center">个人中心</a>
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
                        <li> <a href="/home/bill">账单明细</a></li>
                    </ul>
                </li>

                <li class="person">
                    <a href="#">我的小窝</a>
                    <ul>
                        <li> <a href="/home/collection">收藏</a></li>
                        <li> <a href="/home/comment/comment">评价</a></li>
                    </ul>
                </li>

            </ul>

        </aside>
    </div>
        @include('home.layout.footer')
    
@endsection