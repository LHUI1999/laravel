@extends('home.layout.index')
@section('content')
<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
        <link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

        <link href="/h/css/personal.css" rel="stylesheet" type="text/css">
        <link href="/h/css/appstyle.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="/h/js/jquery-1.7.2.min.js"></script>

<div class="nav-table">
    <div class="long-title"><span class="all-goods">全部分类</span></div>
           
</div>
<b class="line"></b>
<div class="center">
            <div class="col-main">
                <div class="main-wrap">

                    <div class="user-comment">
                        <!--标题 -->
                        <div class="am-cf am-padding">
                            <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">发表评论</strong> / <small>Make&nbsp;Comments</small></div>
                        </div>
                        <hr>
                        <form action='/home/comment/store' method='post' enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="comment-main">
                                @foreach($order as $k=>$v)
                                <div class="comment-list">
                                    <div class="item-pic">
                                        <a href="#" class="J_MakePoint">
                                            <img src="/uploads/{{$v->pic->pic}}" class="itempic">
                                        </a>
                                    </div>

                                    <div class="item-title">

                                        <div class="item-name">
                                            <a href="#">
                                                <div class="item-basic-info">{{$v->goods->title}}</div>
                                            </a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-price">
                                                价格：<strong>{{$v->goods->price}}元</strong>
                                            </div>                                      
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="item-comment">
                                        <textarea name="text[{{$v->gid}}][]" placeholder="请写下对宝贝的感受吧，对他人帮助很大哦！"></textarea>
                                    </div>
                                    <div class="filePic">
                                        <input type="file" name="pic[{{$v->gid}}][]"  allowexts="gif,jpeg,jpg,png,bmp" accept="image/*" multiple>
                                        <span>晒照片</span>
                                        <img src="/h/images/image.jpg" alt="">
                                    </div>
                                    <div class="item-opinion">
                                        <li><i class="op1"><input type="radio" name="level[{{$v->gid}}][]" value='3' checked></i>好评</li>
                                        <li><i class="op2"><input type="radio" name="level[{{$v->gid}}][]" value='2'></i>中评</li>
                                        <li><i class="op3 active"><input type="radio" name="level[{{$v->gid}}][]" value='1'></i>差评</li>
                                    </div>
                                </div>
                                
                                @endforeach
                                
                                <input type="hidden" name="oid" value='{{$v->oid}}'>                    
                                <div class="info-btn">
                                    <button class="am-btn am-btn-danger">发表评论</button>
                                </div>                          
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $(".comment-list .item-opinion li").click(function() {  
                                            $(this).prevAll().children('i').removeClass("active");
                                            $(this).nextAll().children('i').removeClass("active");
                                            $(this).children('i').addClass("active");
                                            
                                        });
                                 })
                                </script>                   
                        
                                                    
                                
                            </div>
                        </form>
                    </div>

                </div>
                <!--底部-->
                <div class="footer">
                    <div class="footer-hd">
                        <p>
                            <a href="#">恒望科技</a>
                            <b>|</b>
                            <a href="#">商城首页</a>
                            <b>|</b>
                            <a href="#">支付宝</a>
                            <b>|</b>
                            <a href="#">物流</a>
                        </p>
                    </div>
                    <div class="footer-bd">
                        <p>
                            <a href="#">关于恒望</a>
                            <a href="#">合作伙伴</a>
                            <a href="#">联系我们</a>
                            <a href="#">网站地图</a>
                            <em>© 2015-2025 Hengwang.com 版权所有</em>
                        </p>
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
@endsection