@extends('home.layout.index')
@section('content')
<!-- <link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css"> -->
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
                    <!--个人信息 -->
                    <div class="info-main">
                        <div >
                            <!-- 显示验证错误 -->
                                    @if (count($errors) > 0)
                                    <div class="alert alert-error" style="width:500px;height:50px;background:#E3D8D6;">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li style="float:left;margin-left:85px;margin-top:16px;color:#666666;">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                            <!-- 验证错误结束 -->
                        </div>
                     
                        <form class="am-form am-form-horizontal" action="/home/geren/{{ $_SESSION['user']->id }}" method='post' enctype='multipart/form-data'>
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="am-form-group">
                                <label for="user-name2" class="am-form-label">昵称</label>
                                <div class="am-form-content">
                                    <input type="text" id="user-name2" name='uname' value='{{ $user->uname }}' placeholder="nickname">

                                </div>
                            </div>
                            <div class="am-form-group">
                                    <label for="user-name2" class="am-form-label">头像</label>
                                    <div class="am-form-content">
                                            <img style="width:50px;height:50px;border-radius:20px;float:left;" src="/uploads/{{$user->profile}}">
                                            <input style='float:left;margin-left:12px;margin-top:22px;' class="input-xlarge focused" id="focusedInput" type="file" value="" name="profile">
                                    </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-phone" class="am-form-label">电话</label>
                                <div class="am-form-content">
                                    <input id="user-phone" name='phone' value='{{ $user->phone }}' placeholder="telephonenumber" type="tel">

                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-email" class="am-form-label">电子邮件</label>
                                <div class="am-form-content">
                                    <input id="user-email" name='email' value='{{ $user->email }}' placeholder="Email" type="email">

                                </div>
                            </div>
                            <div class="info-btn">
                                <button class="am-btn am-btn-danger">
                                    <span style='background:#DD514C;width:200px;'>保存修改</span>
                                </button >
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
                            <li> <a href="/home/comment">评价</a></li>
                        </ul>
                    </li>

            </ul>

        </aside>
    </div>
        @include('home.layout.footer')
    
@endsection