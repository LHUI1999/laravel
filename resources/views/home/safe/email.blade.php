@extends('home.layout.index')
@section('content')
<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/h/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/h/css/stepstyle.css" rel="stylesheet" type="text/css">

		<script type="text/javascript" src="/h/js/jquery-1.7.2.min.js"></script>
		<script src="/h/AmazeUI-2.4.2/assets/js/amazeui.js"></script>


<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">绑定邮箱</strong> / <small>Email</small></div>
					</div>
					<hr>
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">验证邮箱</p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">完成</p>
                            </span>
							<span class="u-progress-placeholder"></span>
						</div>
						<div class="u-progress-bar total-steps-2">
							<div class="u-progress-bar-inner"></div>
						</div>
					</div>
					<form action='/home/safe/sendemail' method="post" class="am-form am-form-horizontal">
						{{csrf_field()}}
						<div class="am-form-group">
							<label for="user-email" class="am-form-label">验证邮箱</label>
							<div class="am-form-content">
								<input type="email" id='email' value="<?php 
								if(isset($_SESSION['email'])){
									echo $_SESSION['email'];
									}else{echo '';}
								?>" name="email" id="user-email" placeholder="请输入邮箱地址">
							</div>
						</div>
						<div class="am-form-group code">
							<label for="user-code" class="am-form-label">验证码</label>
							<a class="btn" href="javascript:void(0);" onclick="sendPhoneCode();" id="sendMobileCode">
								<div class="am-btn am-btn-danger"  href="javascript:void(0);"  id="sendPhoneCode">
                      			<button onclick="sendPhoneCode();" id="dyPhoneButton">获取</button></div>
							</a>
							</form>
						<form action="/home/safe/changeemail" method="post">
							{{csrf_field()}}
								<div class="am-form-content">
									<input name="code" type="tel" id="user-code" placeholder="验证码">
									<input type="hidden" id='email' value="<?php 
								if(isset($_SESSION['email'])){
									echo $_SESSION['email'];
									}else{echo '';}
								?>" name="email" id="user-email" >
								</div>

							</div>
						

							<div class="info-btn">
								<button class="am-btn am-btn-danger">保存修改</button>
							</div>
						</form>


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
		<script type="text/javascript">
			function sendPhoneCode(obj){
                  //获取用户验证码
                      let phone = $('#email').val();
                      console.log(phone);
                      //验证格式
                      // let phone_preg = /^1{1}[3-9]{1}[\d]{9}$/;
                      if(phone==''){
                        alert('请填写邮箱');
                        return false;
                      }
                    $('#sendPhoneCode').attr('disabled',true);
                    $('#sendPhoneCode').css('color','#ccc');
                    $('#sendPhoneCode').css('cursor','no-drop');
                    $("#dyPhoneButton").css('color','#ccc');
                    let time = null;
                    if($("#dyPhoneButton").html()=='获取'){
                      let i = 5;
                      time = setInterval(function(){
                        i--;
                        $("#dyPhoneButton").html('('+i+')s');
                        if(i < 1){
                          $('#sendPhoneCode').attr('disabled',false);
                          $('#sendPhoneCode').css('color','#333');
                          $('#sendPhoneCode').css('cursor','pointer');
                          $("#dyPhoneButton").css('color','#333');
                          $("#dyPhoneButton").html('获取');
                          clearInterval(time);
                        }
                      },1000);
                      let email = $('#email').val();

                      //发送验证码
                      $.get('/home/safe/sendemail',{email},function(res){
                        console.log(111);
                        if(res.error_code == 0){
                          alert('发送成功，验证码十分钟有效');
                        }else{
                          alert('发送失败');
                        }
                      },'json');
                    }
                  }
              </script>
		@include('home.layout.footer')
              
@endsection