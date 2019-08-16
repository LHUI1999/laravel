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

					<div class="user-orderinfo">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong> / <small>Order&nbsp;details</small></div>
						</div>
						<hr>
						<!--进度条-->
						<div class="m-progress">
							@if($order->status==0)
							<div class="m-progress-list">
								<span class="step-1 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                   <p class="stage-name">拍下商品</p>
                                </span>
								<span class="step-2 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">2</i>
                                   <p class="stage-name">卖家发货</p>
                                </span>
								<span class="step-3 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">3<em class="bg"></em></i>
                                   <p class="stage-name">确认收货</p>
                                </span>
								<span class="step-4 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">4<em class="bg"></em></i>
                                   <p class="stage-name">交易完成</p>
                                </span>
								<span class="u-progress-placeholder"></span>
							</div>
							@elseif($order->status==2)
							<div class="m-progress-list">
								<span class="step-1 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                   <p class="stage-name">拍下商品</p>
                                </span>
								<span class="step-2 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                   <p class="stage-name">卖家发货</p>
                                </span>
								<span class="step-3 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">3</i>
                                   <p class="stage-name">确认收货</p>
                                </span>
								<span class="step-4 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">4<em class="bg"></em></i>
                                   <p class="stage-name">交易完成</p>
                                </span>
								<span class="u-progress-placeholder"></span>
							</div>
							@elseif($order->status==3)

							<div class="m-progress-list">
								<span class="step-1 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                   <p class="stage-name">拍下商品</p>
                                </span>
								<span class="step-2 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                   <p class="stage-name">卖家发货</p>
                                </span>
								<span class="step-3 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner" style="background: #23C279;color:white;border-radius: 50%;">3<em class="bg"></em></i>
                                   <p class="stage-name">确认收货</p>
                                </span>
								<span class="step-4 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">4<em class="bg"></em></i>
                                   <p class="stage-name">交易完成</p>
                                </span>
								<span class="u-progress-placeholder"></span>
							</div>
							
							@endif

							<div class="u-progress-bar total-steps-2">
								<div class="u-progress-bar-inner"></div>
							</div>
						</div>
						<div class="order-infoaside">
							<div class="order-logistics">
								<a href="logistics.html">
								<div class="icon-log">
									<i><img src="/h/images/receive.png"></i>
								</div>
								</a>
									<div class="latest-logistics"><a href="logistics.html">

										@if($order->status==0)
										<p class="text">等待卖家发货</p>
										
										</a>
										@elseif($order->status==2)
										<p class="text">已签收,签收人是青年城签收，感谢使用天天快递，期待再次为您服务</p>
										<div class="time-list">
											<span class="date">2015-12-19</span><span class="week">周六</span><span class="time">15:35:42</span>
										</div>
										</a>
										@elseif($order->status=3)
										<p class="text">交易完成，感谢您的光临</p>
										
										</a>
										@endif
										<div class="inquire"><a href="logistics.html">
										
											
											<span class="package-detail">快递单号: </span>
											<span class="package-number">{{$order->order}}</span>
											</a>
										</div>
									</div>
									<!-- <span class="am-icon-angle-right icon"></span> -->
								
								<div class="clear"></div>
							</div>
							<div class="order-addresslist">
								<div class="order-address">
									<div class="icon-add">
									</div>
									<p class="new-tit new-p-re">
										<span class="new-txt">{{$order->uname}}</span>
										<span class="new-txt-rd2">{{$order->phone}}</span>
									</p>
									<div class="new-mu_l2a new-p-re">
										<p class="new-mu_l2cw">
											<span class="title">收货地址：</span>
											{{$order->addr}}</p>
									</div>
								</div>
							</div>
						</div>
						<div class="order-infomain">

							<div class="order-top">
								<div class="th th-item">
									商品
								</div>
								<div class="th th-price">
									单价
								</div>
								<div class="th th-number">
									数量
								</div>
								<div class="th th-operation">
									商品操作
								</div>
								<div class="th th-amount">
									合计
								</div>
								<div class="th th-status">
									交易状态
								</div>
								<div class="th th-change">
									交易操作
								</div>
							</div>

							<div class="order-main">

								<div class="order-status3">
									<div class="order-title">
										<div class="dd-num">订单编号：<a href="javascript:;">{{$order->order}}</a></div>
										<span>成交时间：{{$order->created_at}}</span>
										<!--    <em>店铺：小桔灯</em>-->
									</div>
									<div class="order-content">
										<div class="order-left">
											
											@foreach($orderinfo as $k=>$v)
											<ul class="item-list">
												<li class="td td-item">
													<div class="item-pic">
														<a href="/home/goods?id={{$v->gid}}" class="J_MakePoint">
															<img src="/uploads/{{$v->goodspic->pic}}" class="itempic J_ItemImg">
														</a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="/home/goods?id={{$v->gid}}">
																<p>{{$v->goods->title}} </p>
																
															</a>
														</div>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price">
														{{$v->goods->price}}
													</div>
												</li>
												<li class="td td-number">
													<div class="item-number">
														<span>×</span>{{$v->num}}
													</div>
												</li>
												@if($order->status==0)
												<li class="td td-operation">
													<div class="item-operation">
														退款
													</div>
												</li>
												@elseif($order->status=='2')
												<li class="td td-operation">
													<a href="/home/order/refund?oid={{$order->id}}&gid={{$v->gid}}"><div class="item-operation">
														退款/退货
													</div></a>
												</li>
												@elseif($order->status=='3')
												<li class="td td-operation">
													<a href="/home/order/refund?oid={{$order->id}}&gid={{$v->gid}}"><div class="item-operation">
														退款/退货
													</div></a>
												</li>
												@endif
												
											</ul>
											@endforeach

										</div>
										<div class="order-right">
											<li class="td td-amount">
												<div class="item-amount">
													合计：{{$order->price}}
													<p>含运费：<span>包邮</span></p>
												</div>
											</li>
											@if($order->status=='0')

											<div class="move-right">
												<li class="td td-status">
													<div class="item-status">
														<p class="Mystatus">买家已付款</p>
														
													</div>
												</li>
												<li class="td td-change">
													<div onclick='test()' class="am-btn am-btn-danger anniu">
														提醒发货</div>
												</li>
											</div>
											@elseif($order->status=='2')

											<div class="move-right">
												<li class="td td-status">
													<div class="item-status">
														<p class="Mystatus">卖家已发货</p>
														
													</div>
												</li>
												<li class="td td-change">
													<a href="/home/order/takeorder?oid={{$order->id}}"><div class="am-btn am-btn-danger anniu">
														确认收货</div></a>
												</li>
											</div>
											@elseif($order->status==3)

											<div class="move-right">
												<li class="td td-status">
													<div class="item-status">
														<p class="Mystatus">确认收货</p>
														
													</div>
												</li>
												<li class="td td-change">
													<a href="/home/comment?oid={{$order->id}}"><div class="am-btn am-btn-danger anniu">
														评价商品</div></a>
												</li>
											</div>
											@endif
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
							<li class="active"><a href="order.html">订单管理</a></li>
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
		<script type="text/javascript">
			function test()
			{
				alert('提醒发货成功，卖家会尽快为您发货');
			}

		</script>
@endsection