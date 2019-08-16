@extends('home.layout.index')
@section('content')

		<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<link href="/h/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/h/css/systyle.css" rel="stylesheet" type="text/css">


<div class="nav-table">
	<div class="long-title"><span class="all-goods">全部分类</span></div>
</div>
<b class="line"></b>
<div class="center">
			<div class="col-main">
				<div class="main-wrap">
					<div class="wrap-left">
						<!-- <div class="wrap-list"> -->
							<div class="m-user">
								<!--个人信息 -->
								<div class="m-bg"></div>
								<div class="m-userinfo">
									<div class="m-baseinfo">
										<a href="information.html">
											<img src="/uploads/{{$_SESSION['user']->profile}}">
										</a>
										<em style="margin-left: 30px" class="s-name">{{$_SESSION['user']->uname}}</em>
										
									</div>
									<div class="m-right">
										<div class="m-new">
											<a href="/home/news"><i class="am-icon-bell-o"></i>消息</a>
										</div>
										<div class="m-address">
											<a href="/home/address" class="i-trigger">我的收货地址</a>
										</div>
									</div>
								</div>

								<!--个人资产-->
								<div class="m-userproperty">
									<div class="s-bar">
										<i class="s-icon"></i>个人资产
									</div>
									<p class="m-bonus">
										<a href="/home/geren">
											<i><img src="/h/images/index.jpg"></i>
											<span class="m-title">个人信息</span>
										</a>
									</p>
									<p class="m-coupon">
										<a href="/home/safe">
											<i><img src="/h/images/u=2309502126,2673142882&fm=26&gp=0.jpg"></i>
											<span class="m-title">安全设置</span>
											
										</a>
									</p>
									<p class="m-bill">
										<a href="/home/bill">
											<i><img src="/h/images/wallet.png"></i>
											<span class="m-title">账单</span>
											
										</a>
									</p>
									<p class="m-big">
										<a href="/home/collection">
											<i><img src="/h/images/u=2453338252,3540944447&fm=26&gp=0.jpg"></i>
											<span class="m-title">我的收藏</span>
										</a>
									</p>
									<p class="m-big">
										<a href="#">
											<i><img src="/h/images/72h.png"></i>
											<span class="m-title">72小时发货</span>
										</a>
									</p>
								</div>
							</div>
							<div class="box-container-bottom"></div>

							<!--订单 -->
							<div class="m-order">
								<div class="s-bar">
									<i class="s-icon"></i>我的订单
									<a class="i-load-more-item-shadow" href="/home/order">全部订单</a>
								</div>
								<ul>
									<li><a href="/home/order"><i><img src="/h/images/pay.png"></i><span>待付款<em class="m-num">{{$fukuan}}</em></span></a></li>
									<li><a href="/home/order"><i><img src="/h/images/send.png"></i><span>待发货<em class="m-num">{{$fahuo}}</em></span></a></li>
									<li><a href="/home/order"><i><img src="/h/images/receive.png"></i><span>待收货<em class="m-num">{{$shouhuo}}</em></span></a></li>
									<li><a href="/home/order"><i><img src="/h/images/comment.png"></i><span>待评价<em class="m-num">{{$pingjia}}</em></span></a></li>
									<li><a href="change.html"><i><img src="/h/images/refund.png"></i><span>退换货</span></a></li>
								</ul>
							</div>
							<!--收藏夹 -->
							<div class="you-like">
								<div class="s-bar">我的收藏
									
									<a class="i-load-more-item-shadow" href="/home/collection">更多收藏</a>
								</div>
								<div class="s-content">
									@if(!empty($_SESSION['collection']))
									@foreach($_SESSION['collection'] as $k=>$v)
									<div class="s-item-wrap">
										<div class="s-item">

											<div class="s-pic">
												<a href="/home/goods?id={{$v->id}}" class="s-pic-link">
													<img src="/uploads/{{$v->pic->pic}}" alt="{{$v->title}}" title="{{$v->title}}" class="s-pic-img s-guess-item-img">
												</a>
											</div>
											<div class="s-price-box">
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->price}}</em></span>
												
											</div>
											<div class="s-title"><a href="/home/goods?id={{$v->id}}" title="{{$v->title}}">{{$v->title}}</a></div>
											
										</div>
									</div>
									@endforeach
									@else
									<div style="width: 100%;height: 100px;font-size: 18px;text-align: center;line-height: 80px;">暂无收藏</div>
									@endif

								</div>

								

							</div>

						<!-- </div> -->
					</div>
					<!-- <div class="wrap-right"> -->

						<!-- 日历-->
						<!-- <div class="day-list">
							<div class="s-bar">
								<a class="i-history-trigger s-icon" href="#"></a>我的日历
								<a class="i-setting-trigger s-icon" href="#"></a>
							</div>
							<div class="s-care s-care-noweather">
								<div class="s-date">
									<em>21</em>
									<span>星期一</span>
									<span>2015.12</span>
								</div>
							</div>
						</div> -->
						<!--新品 -->
						<!-- <div class="new-goods">
							<div class="s-bar">
								<i class="s-icon"></i>今日新品
								<a class="i-load-more-item-shadow">15款新品</a>
							</div>
							<div class="new-goods-info">
								<a class="shop-info" href="#" target="_blank">
									<div class="face-img-panel">
										<img src="/h/images/imgsearch1.jpg" alt="">
									</div>
									<span class="new-goods-num ">4</span>
									<span class="shop-title">剥壳松子</span>
								</a>
								<a class="follow " target="_blank">关注</a>
							</div>
						</div> -->

						<!--热卖推荐 -->
						<!-- <div class="new-goods">
							<div class="s-bar">
								<i class="s-icon"></i>热卖推荐
							</div>
							<div class="new-goods-info">
								<a class="shop-info" href="#" target="_blank">
									<div>
										<img src="/h/images/imgsearch1.jpg" alt="">
									</div>
                                    <span class="one-hot-goods">￥9.20</span>
								</a>
							</div>
						</div> -->

					<!-- </div> -->
				</div>
				<!--底部-->
				

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
							<li> <a href="/home/order/change">退款售后</a></li>
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
<div class="navCir">
			<li><a href="home/home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="home/sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="home/shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li class="active"><a href="index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>
		@include('home.layout.footer')

		@endsection