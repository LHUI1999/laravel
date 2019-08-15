@extends('home.layout.index')
@section('content')
<style type="text/css">
	.pass{
		width:200px;
		height:35px;
	}
	#pay{
		font-size:12px;
		color:#73738D;

	}
	#dui{
		color:green;
		font-size:60px;
	}
	.btn{
		width: 250px;
		height: 55px;
		background: red;
		color: white;
		font-size: 20px;
		margin-top: 22px;
	}
	.send{
		font-size:13px;
		color:#73738D;
	}
	#btn{
		width: 140px;
		height: 40px;
		background: #00C800;
		color: white;
		font-size: 17px;
		margin-top: 20px;
	}
</style>
<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/h/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/h/css/cartstyle.css" rel="stylesheet" type="text/css" />
		<link href="/h/css/jsstyle.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="/h/js/address.js"></script>
		<img style="width:70px;height:70px;margin-top: 40px" src="/h/images/u=2516763473,2309103725&fm=26&gp=0.jpg">
		<div style="margin-top: -42px;margin-left: 100px">
			<span id="success">订单提交成功，请尽快付款！订单号：{{$order}}</span><br>
		<span id="pay" > 请您在24小时内完成支付，否则订单会被自动取消</span>
		</div>
		@if($pay!=='null')
<!--支付方式-->
		<form action="/home/order/onesuccess" method="post">
			{{csrf_field()}}
			<input type="hidden" name="order" value="{{$order}}">
			<div class="logistics">
				<h3>支付方式</h3>
				<ul class="pay-list" style="margin-left: 50px">
					<li class="pay card"><input type="radio" name="pay"  value="0">&nbsp;<img src="/h/images/wangyin.jpg">银联<span></span>  </li>
					<li class="pay qq"><input type="radio" name="pay" value="1">&nbsp;<img src="/h/images/weizhifu.jpg">微信<span></span></li>
					<li class="pay taobao"><input type="radio" name="pay" value="2">&nbsp;<img src="/h/images/zhifubao.jpg">支付宝<span></span></li>
				</ul>

			</div>
			<div class="clear"></div>
					<div class="order-extra">
						<div class="order-user-info" style="margin-left: 50px;margin-top: 20px">
							<div id="holyshit257" class="memo">
								<label class='send'>请输入六位数支付密码：</label><br>
								<input class="pass"  type="password" name="pass">
							</div>
							
						<button class='btn'>立即支付</button>
							<!-- <span style="position: relative;top: 27px;">还没设置支付密码？<a style="color:red" href="/home/safe/paypass">立即设置</a></span> -->
						

						</div>
					</div>
		</form>
		@else
		<div style="margin-top:30px">
			<span style="font-size:20px">检测到您还未设置支付密码，<a style="color:red;font-size: 23px"  href="/home/safe/paypass">设置支付密码</a>，完成支付</span>
		</div>
		
		@endif
					
@endsection