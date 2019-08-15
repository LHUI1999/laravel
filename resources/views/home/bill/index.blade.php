@extends('home/layout.index')
@section('content')
	<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
	<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

	<link href="/h/css/personal.css" rel="stylesheet" type="text/css">
	<link href="/h/css/blstyle.css" rel="stylesheet" type="text/css">
	<script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>

<div class="nav-table">
	<div class="long-title"><span class="all-goods">全部分类</span></div>
	<div class="nav-cont">	
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

			<div class="user-bill">
				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账单</strong> / <small>Electronic&nbsp;bill</small></div>
				</div>
				<hr>

				
				<div class="ebill-section">
				@foreach($date as $k=>$v)

					<div class="ebill-title-section">
						<h2 class="trade-title section-title">交易
							<span class="desc">（金额单位：元）</span>
						</h2>

						<div class=" ng-scope">
							<div class="trade-circle-select  slidedown-">
							<a href="javascript:void(0);" class="current-circle ng-binding">{{ explode('-',$v['time'])[0] }}</a>

							</div>
						<span class="title-tag"><i class="num ng-binding">{{ explode('-',$v['time'])[1] }}</i>月</span>
						</div>
					</div>

					<div class="module-income ng-scope">
						<div class="income-slider ">
							<div class="block-income block  fn-left">
								<h3 class="income-title block-title">支出
									<span class="num ng-binding">
									{{ $v['total'] }}
									</span>
									{{-- <span class="desc ng-binding">
										<a href="/home/bill/billlist">查看支出明细</a>
									</span> --}}
								</h3>

								<div ng-class="shoppingChart" class="catatory-details  fn-hide shopping">
									<div class="catatory-chart fn-left fn-hide">
										<div class="title">类型</div>
										<ul>


										</ul>
									</div>
									<div class="catatory-detail fn-left">
										<div class="title ng-binding">
											购买商品
										</div>
										<ul>
											@foreach($v['order'] as $a=>$b)
											@foreach($b->orderinfo as $c=>$d)
											@foreach($d as $e=>$f)
											<li class="ng-scope  delete-false">
												<div class="  ng-scope">
													<a href="#" class="text fn-left " title="羊毛毡底鞋垫">
													<span class="emoji-span ng-binding">{{ $f->goods->title }}</span>
													<span class="amount fn-right ng-binding">{{ $f->goods->price }}&nbsp;x&nbsp;{{ $f->num }}</span>
													</a>
												</div>
											</li>
				
											@endforeach
											@endforeach
											@endforeach

										</ul>
									</div>
								</div>
							</div>
							<div class="block-expense block  fn-left">
								<div class="slide-button right"></div>
							</div>
							<div class="clear"></div>

							<!--收入-->
							<h3 class="expense income-title block-title">
								支出                                                              
								<span class="num ng-binding">
								{{ $v['total'] }}
								</span>
								{{-- <span class="desc ng-binding">
									<a href="/home/bill/billlist?time={{ explode('-',$v['time'])[1] }}">查看支出明细</a>
								</span> --}}
							</h3>
						</div>
						
						

						<script>
							$(document).ready(function (ev) {
						
								$('.cards-carousel .details').on('click', function (ev) {
										$('.cards-details').css("display","block");
										$('.cards-carousel').css("display","none");								 
								});									   									    
						
								$('.cards-details .close').on('click', function (ev) {
										$('.cards-details').css("display","none");
										$('.cards-carousel').css("display","block");								 
								});									    
																											
							});
						</script>

					</div>
					@endforeach
				</div>

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
					<li> <a href="coupon.html">优惠券 </a></li>
					<li> <a href="bonus.html">红包</a></li>
					<li class="active"> <a href="bill.html">账单明细</a></li>
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