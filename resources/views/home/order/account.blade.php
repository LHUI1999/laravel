@extends('home.layout.index')
@section('content')
<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/h/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/h/css/cartstyle.css" rel="stylesheet" type="text/css" />
		<link href="/h/css/jsstyle.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="/h/js/address.js"></script>

<div class="concent">
	<form action='/home/order/pay' method='post' >
		{{csrf_field()}}
				<!--地址 -->
				<div class="paycont">
					<div class="address">
						<h3>确认收货地址 </h3>
						<div class="control">
						</div>
						<div class="clear"></div>
						<ul>
						@if($address == '[]')
							<span style="margin-left:50px">还没有收货地址？	<a href="/home/address" style="color:red">添加收货地址</a>	</span>	
						@else						
							@foreach($address as $k=>$v)
							<div class="per-border"></div>
							<a href="/home/order/addr?id={{$v->id}}">
							
							<li   class="user-addresslist @if($_SESSION['address']->id == $v->id) defaultAddr @endif ">
								
								<div class="address-left">									<div class="user DefaultAddr">
										<span class="buy-address-detail">   
                   							<span class="buy-user">{{$v->uname}} </span>
											<span class="buy-phone">{{$v->phone}}</span>
										</span>
									</div>
									<div class="default-address DefaultAddr">
										<span class="buy-line-title buy-line-title-type">收货地址：</span>
										<span class="buy--address-detail">
								  		{{$v->addr}}
										</span>	
									</div>
									<ins class="deftip hidden">默认地址</ins>
								</div>
								<div class="address-right">
									<span class="am-icon-angle-right am-icon-lg"></span>
								</div>
								<div class="clear"></div>
								<div class="new-addr-btn">
									<a href="#">编辑</a>
									<span class="new-addr-bar">|</span>
									<a href="javascript:void(0);" onclick="delClick(this);">删除</a>
								</div>

							</li>
							</a>

							@endforeach
							@endif

						</ul>

						<div class="clear"></div>
					</div>

					<div class="clear"></div>

					

					<!--订单 -->
					<div class="concent">
						<div id="payTable">
							<h3>确认订单信息</h3>
							<div class="cart-table-th">
								<div class="wp">

									<div class="th th-item">
										<div class="td-inner">商品信息</div>
									</div>
									<div class="th th-price">
										<div class="td-inner">单价</div>
									</div>
									<div class="th th-amount">
										<div class="td-inner">数量</div>
									</div>
									<div class="th th-sum">
										<div class="td-inner">金额</div>
									</div>
									<div class="th th-oplist">
										<div class="td-inner">配送方式</div>
									</div>

								</div>
							</div>
							<div class="clear"></div>
								<div id="J_Bundle_s_1911116345_1_0" class="bundle  bundle-last">
									@foreach($data as $k => $v)
									<div class="bundle-main">
										<ul class="item-content clearfix">
											<div class="pay-phone">
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img style="width:80px" src="/uploads/{{$v->pic->pic}}" class="itempic J_ItemImg"></a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="#" target="_blank" title="$v->title" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$v->title}}</a>
														</div>
													</div>
												</li>

												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">
															<em class="J_Price price-now">{{$v->price}}</em>
														</div>
													</div>
												</li>
											</div>

											<li class="td td-amount">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">
															{{$v->num}}
														</div>
													</div>
												</div>
											</li>
											<li class="td td-sum">
												<div class="td-inner">
													<em tabindex="0" class="J_ItemSum number">{{$v->price*$v->num}}</em>
												</div>
											</li>
											<li class="td td-oplist">
												<div class="td-inner">
													<span class="phone-title">配送方式</span>
													<div class="pay-logis">
														包邮
													</div>
												</div>
											</li>

										</ul>
										<div class="clear"></div>

									</div>
									@endforeach

							
							</div>
							<div class="clear"></div>
							<div class="pay-total">
						<!--留言-->
							<div class="order-extra">
								<div class="order-user-info">
									<div id="holyshit257" class="memo">
										<label>买家留言：</label>
										<input type="text" name="liuyan" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）" placeholder="选填,建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close">
										<div class="msg hidden J-msg">
											<p class="error">最多输入500个字符</p>
										</div>
									</div>
								</div>

							</div>
							<!--优惠券 -->
							<div class="buy-agio">
							</div>
							<div class="clear"></div>
							</div>
							<!--含运费小计 -->
							<div class="buy-point-discharge ">
								<p class="price g_price ">
									合计（含运费） <span>¥</span><em class="pay-sum">{{$pricecount}}</em>
								</p>
							</div>

							<!--信息 -->
							<div class="order-go clearfix">
								<div class="pay-confirm clearfix">
									<div class="box">
										<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
											<span class="price g_price ">
                                    <span>¥</span> <em class="style-large-bold-red " id="J_ActualFee">{{$pricecount}}</em>
											</span>
										</div>
										@if($_SESSION['address'])
										<div id="holyshit268" class="pay-address">

											<p class="buy-footer-address">
												<span class="buy-line-title buy-line-title-type">寄送至：</span>
												<span class="buy--address-detail">
								   					{{$_SESSION['address']->addr}}
												
												</span>
												
											</p>
											<p class="buy-footer-address">
												<span class="buy-line-title">收货人：</span>
												<span class="buy-address-detail">   
                                         <span class="buy-user">{{$_SESSION['address']->uname}} </span>
												<span class="buy-phone">{{$_SESSION['address']->phone}}</span>
												</span>
											</p>
										</div>
										@else 
										请先添加收货地址
										@endif
									</div>

									<div id="holyshit269" class="submitOrder">
										<div class="go-btn-wrap">
											<button><a id="J_Go" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a></button>
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>

						<div class="clear"></div>
					</div>
				</div>
				
			</div>
</form>

@include('home.layout.footer')
<script type="text/javascript">
	var addr = document.getElementsByName('addr');
	// console.log(addr);
	for(var i=0;i<addr.length; i++)
	{
		// if(addr[i].checked==true){
			
		// }
		addr[i].onchange=function(){
			alert(addr.value());
		}
	}

</script>
		
@endsection