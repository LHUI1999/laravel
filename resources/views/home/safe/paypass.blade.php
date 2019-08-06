@extends('home.layout.index')
@section('content')


<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">支付密码</strong> / <small>Set&nbsp;Pay&nbsp;Password</small></div>
					</div>
					<hr>
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">设置支付密码</p>
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
					<form action='/home/safe/paystore' method='post' class="am-form am-form-horizontal" enctype="multipart/form-data">
						{{csrf_field()}}

						<div class="am-form-group bind">
							<label for="user-phone" class="am-form-label">验证手机</label>
							<div class="am-form-content">
								<span id="user-phone">{{$_SESSION['user']->phone}}</span>
							</div>
						</div>
						<div class="am-form-group code">
							<label for="user-code" class="am-form-label">验证码</label>
							<div class="am-form-content">
								<input type="tel" id="user-code" placeholder="短信验证码">
							</div>
							<a class="btn" href="javascript:void(0);" onclick="sendMobileCode();" id="sendMobileCode">

								 <div class="am-btn am-btn-danger"  href="javascript:void(0);" onClick="sendMobileCode();" id="sendMobileCode">
                      			<span id="dyMobileButton">获取</span></div>
							</a>
						</div>
						
						<div class="am-form-group">
							<label for="user-password" class="am-form-label">支付密码</label>
							<div class="am-form-content">
								<input type="password" name='num' id="user-password" placeholder="6位数字">
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-confirm-password" class="am-form-label">确认密码</label>
							<div class="am-form-content">
								<input type="password" name='renum' id="user-confirm-password" placeholder="请再次输入上面的密码">
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
                  function sendMobileCode(obj){

                    // //获取用户验证码
                    //   let phone = $('#phone').val();
                    //   //验证格式
                    //   let phone_preg = /^1{1}[3-9]{1}[\d]{9}$/;
                    //   if(!phone_preg.test(phone)){
                    //     alert('手机号格式不正确');
                    //     return false;
                    //   }

                  
                    $('#sendMobileCode').attr('disabled',true);
                    $('#sendMobileCode').css('color','#ccc');
                    $('#sendMobileCode').css('cursor','no-drop');
                    $("#dyMobileButton").css('color','#ccc');
                    let time = null;
                    if($("#dyMobileButton").html()=='获取'){
                      let i = 5;
                      time = setInterval(function(){
                        i--;
                        $("#dyMobileButton").html('('+i+')s');
                        if(i < 1){
                          $('#sendMobileCode').attr('disabled',false);
                          $('#sendMobileCode').css('color','#333');
                          $('#sendMobileCode').css('cursor','pointer');
                          $("#dyMobileButton").css('color','#333');
                          $("#dyMobileButton").html('获取');
                          clearInterval(time);
                        }
                      },1000);

                      //发送验证码
                      $.get('/home/register/sendPhone',{phone},function(res){
                        console.log(res);
                        if(res.error_code == 0){
                          alert('发送成功，验证码十分钟有效');
                        }else{
                          alert('发送失败');
                        }
                      },'json');
                    }else{

                    }
                  }
                </script>
@endsection