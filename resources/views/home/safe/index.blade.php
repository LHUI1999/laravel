@extends('home.layout.index')
@section('content')


<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<!--标题 -->
					<div class="user-safety">
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账户安全</strong> / <small>Set&nbsp;up&nbsp;Safety</small></div>
						</div>
						<hr>

						<!--头像 -->
						<div class="user-infoPic">

							<div class="filePic">
								<img class="am-circle am-img-thumbnail" src="/uploads/{{$_SESSION['user']->profile}}" alt="">
							</div>

							<p class="am-form-help">头像</p>

							<div class="info-m">
								<div><b>用户名：<i>{{$_SESSION['user']->uname}}</i></b></div>
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

						<div class="check">
							<ul>
								<li>
									<i class="i-safety-lock"></i>
									<div class="m-left">
										<div class="fore1">登录密码</div>
										<div class="fore2"><small>为保证您购物安全，建议您定期更改密码以保护账户安全。</small></div>
									</div>
									<div class="fore3">
										<a href="/home/safe/password">
											<div class="am-btn am-btn-secondary">修改</div>
										</a>
									</div>
								</li>
								@if($_SESSION['user']->phone==null)

								<li>
									<i class="i-safety-wallet"></i>
									<div class="m-left">
										<div class="fore1">支付密码</div>
										<div class="fore2"><small>检测到您还未设置手机号，请先设置手机号</small></div>
									</div>
									<div class="fore3">
										
										<a href="/home/center">
											<div class="am-btn am-btn-secondary">去设置</div>
										</a>
										
										
									</div>
								</li>

								@else
								<li>
									<i class="i-safety-wallet"></i>
									<div class="m-left">
										<div class="fore1">支付密码</div>
										<div class="fore2"><small>启用支付密码功能，为您资产账户安全加把锁。</small></div>
									</div>
									<div class="fore3">
										@if($pay==null)
										<a href="/home/safe/paypass">
											<div class="am-btn am-btn-secondary">立即启用</div>
										</a>
										@else
										<a href="#">
											<div class="am-btn am-btn-secondary">已启用</div>
										</a>
										<br>
										<a href="/home/safe/paypass">修改</a>
										@endif
									</div>
								</li>
								@endif
								@if($_SESSION['user']->phone==null)
								<li>
									<i class="i-safety-iphone"></i>
									<div class="m-left">
										<div class="fore1">手机验证</div>
										<div class="fore2"><small>检测到您未设置手机号，请前往个人中心设置</small></div>
									</div>
									<div class="fore3">
										<a href="/home/center">
											<div class="am-btn am-btn-secondary">去设置</div>
										</a>
									</div>
								</li>
								@else
								<li>
									<i class="i-safety-iphone"></i>
									<div class="m-left">
										<div class="fore1">手机验证</div>
										<div class="fore2"><small>您验证的手机：{{$_SESSION['user']->phone}}若已丢失或停用，请立即更换</small></div>
									</div>
									<div class="fore3">
										<a href="/home/safe/bindphone">
											<div class="am-btn am-btn-secondary">换绑</div>
										</a>
									</div>
								</li>
								@endif
								@if($_SESSION['user']->email==null)
								<li>
									<i class="i-safety-mail"></i>
									<div class="m-left">
										<div class="fore1">邮箱验证</div>
										<div class="fore2"><small>检测到您未设置邮箱,请前往个人中心设置</small></div>
									</div>
									<div class="fore3">
										<a href="/home/center">
											<div class="am-btn am-btn-secondary">去设置</div>
										</a>
									</div>
								</li>
								@else
								<li>
									<i class="i-safety-mail"></i>
									<div class="m-left">
										<div class="fore1">邮箱验证</div>
										<div class="fore2"><small>您验证的邮箱：{{$_SESSION['user']->email}} 可用于快速找回登录密码</small></div>
									</div>
									<div class="fore3">
										<a href="/home/safe/email">
											<div class="am-btn am-btn-secondary">换绑</div>
										</a>
									</div>
								</li>
								@endif
								
								
								
							</ul>
						</div>

					</div>
				</div>
				<!--底部-->
				
			</div>

			<aside class="menu">
				<ul>
					<li class="person">
						<a href="index.html">个人中心</a>
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