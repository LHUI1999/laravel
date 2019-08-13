@extends('home.layout.index')
<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/h/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/h/css/cpstyle.css" rel="stylesheet" type="text/css">
			
		<script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/h/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
@section('content')
<div class="center">
        <div class="col-main">
            <div class="main-wrap">

                <div class="user-coupon">
                    <!--标题 -->
                    <div class="am-cf am-padding">
                        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">优惠券</strong> / <small>Coupon</small></div>
                    </div>
                    <hr>

                    <div class="am-tabs-d2 am-tabs  am-margin" data-am-tabs="">

                        <ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
                            <li class="am-active"><a href="#tab1">可用优惠券</a></li>
                            <li><a href="#tab2">已用/过期优惠券</a></li>

                        </ul>

                        <div class="am-tabs-bd" style="touch-action: pan-y; -moz-user-select: none;">
                            <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                                <div class="coupon-items">
                                    @foreach ($data as $k=>$v )
                                        
                                   
                                    <div class="coupon-item coupon-item-d">
                                        <div class="coupon-list">
                                            <div class="c-type">
                                                <div class="c-class">
                                                    <strong>购物券</strong>
                                                </div>
                                                <div class="c-price">
                                                    <strong>￥{{ $v->dikou }}</strong>
                                                </div>
                                                <div class="c-limit">
                                                    @if($v->yname == 1)
                                                    【全场&nbsp;可用】
                                                    @else
                                                    【{{ $v->yname }}&nbsp;可用】
                                                    @endif
                                                </div>
                                                <div class="c-time"><span>使用期限</span>2015-12-21--2015-12-31</div>
                                                <div class="c-type-top"></div>

                                                <div class="c-type-bottom"></div>
                                            </div>

                                            <div class="c-msg">
                                                <div class="c-range">
                                                    <div class="range-all">
                                                        <div class="range-item">
                                                            <span class="label">券&nbsp;编&nbsp;号：</span>
                                                            <span class="txt">
                                                         <?php str_random(random_int(20,30))?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="op-btns">
                                                    <a href="#" class="btn"><span class="txt">立即使用</span><b></b></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                            <div class="am-tab-panel am-fade" id="tab2">
                                <div class="coupon-items">
                                    <div class="coupon-item coupon-item-d">
                                        <div class="coupon-list">
                                            <div class="c-type">
                                                <div class="c-class">
                                                    <strong>购物券</strong>
                                                    <span class="am-icon-trash"></span>
                                                </div>
                                                <div class="c-price">
                                                    <strong>￥8</strong>
                                                </div>
                                                <div class="c-limit">
                                                    【消费满&nbsp;95元&nbsp;可用】
                                                </div>
                                                <div class="c-time"><span>使用期限</span>2015-12-21--2015-12-31</div>
                                                <div class="c-type-top"></div>

                                                <div class="c-type-bottom"></div>
                                            </div>

                                            <div class="c-msg">
                                                <div class="c-range">
                                                    <div class="range-all">
                                                        <div class="range-item">
                                                            <span class="label">券&nbsp;编&nbsp;号：</span>
                                                            <span class="txt">35730144</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="op-btns c-del">
                                                    <a href="#" class="btn"><span class="txt">删除</span><b></b></a>
                                                </div>
                                            </div>
                                            
                                            <li class="td td-usestatus ">
                                                <div class="item-usestatus ">
                                                    <span><img src="/h/images/gift_stamp_31.png" <="" span="">
                                                </span></div>
                                            </li>												
                                        </div>
                                    </div>
                                    <div class="coupon-item coupon-item-yf">
                                        <div class="coupon-list">
                                            <div class="c-type">
                                                <div class="c-class">
                                                    <strong>运费券</strong>
                                                    <span class="am-icon-trash"></span>
                                                </div>
                                                <div class="c-price">
                                                    <strong>可抵运费</strong>
                                                </div>
                                                <div class="c-limit">
                                                    【不含偏远地区】
                                                </div>
                                                <div class="c-time"><span>使用期限</span>2015-12-21--2015-12-31</div>
                                                <div class="c-type-top"></div>

                                                <div class="c-type-bottom"></div>
                                            </div>

                                            <div class="c-msg">
                                                <div class="c-range">
                                                    <div class="range-all">
                                                        <div class="range-item">
                                                            <span class="label">券&nbsp;编&nbsp;号：</span>
                                                            <span class="txt">35728267</span>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="op-btns c-del">
                                                    <a href="#" class="btn"><span class="txt">删除</span><b></b></a>
                                                </div>
                                            </div>
                                            
                                            <li class="td td-usestatus ">
                                                <div class="item-usestatus ">
                                                    <span><img src="/h/images/gift_stamp_21.png" <="" span="">
                                                </span></div>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

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
                        <li> <a href="information.html">个人信息</a></li>
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
                        <li class="active"> <a href="/home/youhui">优惠券 </a></li>
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