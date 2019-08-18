@extends('home.layout.index')
@section('content')
<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/h/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/h/css/orstyle.css" rel="stylesheet" type="text/css">

		<script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/h/AmazeUI-2.4.2/assets/js/amazeui.js"></script>


<div class="nav-table">
	<div class="long-title"><span class="all-goods">全部分类</span></div>
		  
</div>
<b class="line"></b>
<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-order">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">退换货管理</strong> / <small>Change</small></div>
						</div>
						<hr>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs="">

							<div class="am-tabs-bd" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
								<div class="am-tab-panel am-fade am-active am-in" id="tab1">
									<div class="order-top">
										<div class="th th-item">
											商品
										</div>
										<div class="th th-orderprice th-price">
											交易金额
										</div>
										<div class="th th-changeprice th-price">
											退款金额
										</div>
										<div class="th th-status th-moneystatus">
											交易状态
										</div>
										<div class="th th-change th-changebuttom">
											交易操作
										</div>
									</div>
									@foreach($refund as $k=>$v)
									<div class="order-main">
										<div class="order-list">
											<div class="order-title">
												<div class="dd-num">退款编号：<a href="javascript:;">{{$v->reorder}}</a></div>
												<span>申请时间：{{$v->created_at}}</span>
												<!--    <em>店铺：小桔灯</em>-->
											</div>
											<div class="order-content">
												<div class="order-left">
													<ul class="item-list">
														<li class="td td-item">
															<div class="item-pic">
																<a href="#" class="J_MakePoint">
																	<img src="/uploads/{{$v->goodspic->pic}}" class="itempic J_ItemImg">
																</a>
															</div>
															<div class="item-info">
																<div class="item-basic-info">
																	<a href="#">
																		<p>{{$v->goods->title}}</p>
																		
																	</a>
																</div>
															</div>
														</li>

														<ul class="td-changeorder">
															<li class="td td-orderprice">
																<div class="item-orderprice">
																	<span>交易金额：</span>{{$v->price}}
																</div>
															</li>
															<li class="td td-changeprice">
																<div class="item-changeprice">
																	<span>退款金额：</span>{{$v->price}}
																</div>
															</li>
														</ul>
														<div class="clear"></div>
													</ul>

													<div class="change move-right">
														<li class="td td-moneystatus td-status">
															@if($v->orderinfo->status==1)
															<div class="item-status">
																<p class="Mystatus">退款中</p>

															</div>
															@else
															<div class="item-status">
																<p class="Mystatus">退款成功</p>

															</div>
															@endif
														</li>
													</div>
													<li class="td td-change td-changebutton">
														<a href="/home/order/record?id={{$v->id}}">
														<div class="am-btn am-btn-danger anniu">
															钱款去向</div>
														</a>
													</li>

												</div>
											</div>
										</div>

									</div>
									@Endforeach

								</div>
								<div class="am-tab-panel am-fade" id="tab2">
									<div class="order-top">
										<div class="th th-item">
											商品
										</div>
										<div class="th th-orderprice th-price">
											交易金额
										</div>
										<div class="th th-changeprice th-price">
											退款金额
										</div>
										<div class="th th-status th-moneystatus">
											交易状态
										</div>
										<div class="th th-change th-changebuttom">
											交易操作
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											<div class="order-title">
												<div class="dd-num">退款编号：<a href="javascript:;">1601430</a></div>
												<span>申请时间：2015-12-20</span>
												<!--    <em>店铺：小桔灯</em>-->
											</div>
											<div class="order-content">
												<div class="order-left">
													<ul class="item-list">
														<li class="td td-item">
															<div class="item-pic">
																<a href="#" class="J_MakePoint">
																	<img src="images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																</a>
															</div>
															<div class="item-info">
																<div class="item-basic-info">
																	<a href="#">
																		<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
																		<p class="info-little">颜色：12#川南玛瑙
																			<br>包装：裸装 </p>
																	</a>
																</div>
															</div>
														</li>

														<ul class="td-changeorder">
															<li class="td td-orderprice">
																<div class="item-orderprice">
																	<span>交易金额：</span>72.00
																</div>
															</li>
															<li class="td td-changeprice">
																<div class="item-changeprice">
																	<span>退款金额：</span>70.00
																</div>
															</li>
														</ul>
														<div class="clear"></div>
													</ul>

													<div class="change move-right">
														<li class="td td-moneystatus td-status">
															<div class="item-status">
																<p class="Mystatus">退款成功</p>

															</div>
														</li>
													</div>
													<li class="td td-change td-changebutton">
                                                        <a href="record.html">
														    <div class="am-btn am-btn-danger anniu">
															钱款去向</div>
														</a>
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
@endsection