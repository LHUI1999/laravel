@extends('home.layout.index')
@section('content')
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
                            {{-- <input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*"> --}}
                            <img style="border-radius: 50%;" src="/uploads/{{$userinfo->profile}}">
                        </div>
                        <p class="am-form-help">头像</p>

                        <div class="info-m">
                            <div><b>昵称：<i>{{ $user->uname }}</i></b></div>
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
                                    <input type="text"disabled id="user-name2" value='{{ $user->uname}}' placeholder="请填写你的昵称">

                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-phone" class="am-form-label">电话</label>
                                <div class="am-form-content">
                                    <input id="user-phone"disabled  value='{{ $user->phone }}'  placeholder="请填写你的电话" type="tel">

                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-email" class="am-form-label">电子邮件</label>
                                <div class="am-form-content">
                                    <input id="user-email"disabled value='{{ $user->email }}' placeholder="请填写你的Email" type="email">
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
                <li class="person">
                    <a href="index.html">个人中心</a>
                </li>
                <li class="person">
                    <a href="#">个人资料</a>
                    <ul>
                        <li class="active"> <a href="information.html">个人信息</a></li>
                        <li> <a href="safety.html">安全设置</a></li>
                        <li> <a href="address.html">收货地址</a></li>
                    </ul>
                </li>
                <li class="person">
                    <a href="#">我的交易</a>
                    <ul>
                        <li><a href="order.html">订单管理</a></li>
                        <li> <a href="change.html">退款售后</a></li>
                    </ul>
                </li>
                <li class="person">
                    <a href="#">我的资产</a>
                    <ul>
                        <li> <a href="coupon.html">优惠券 </a></li>
                        <li> <a href="bonus.html">红包</a></li>
                        <li> <a href="bill.html">账单明细</a></li>
                    </ul>
                </li>

                <li class="person">
                    <a href="#">我的小窝</a>
                    <ul>
                        <li> <a href="collection.html">收藏</a></li>
                        <li> <a href="foot.html">足迹</a></li>
                        <li> <a href="comment.html">评价</a></li>
                        <li> <a href="news.html">消息</a></li>
                    </ul>
                </li>

            </ul>

        </aside>
    </div>
@endsection