@extends('home.layout.index')
@section('content')
<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="/h/basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="/h/css/hmstyle.css" rel="stylesheet" type="text/css" />
		<script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/h/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
<div class="banner">
                      <!--轮播 -->
						<div class="am-slider am-slider-default scoll" data-am-flexslider="" id="demo-slider-0">
							
						<div class="am-viewport" style="overflow: hidden; position: relative;"><ul class="am-slides" style="width: 1200%; transition-duration: 0s; transform: translate3d(-5692px, 0px, 0px);"><li class="banner4 clone" aria-hidden="true" style="width: 1423px; float: left; display: block;"><a><img src="/h/images/ad4.jpg" draggable="false"></a></li>
								<li class="banner1" style="width: 1423px; float: left; display: block;"><a href="introduction.html"><img src="/h/images/ad1.jpg" draggable="false"></a></li>
								<li class="banner2" style="width: 1423px; float: left; display: block;"><a><img src="/h/images/ad2.jpg" draggable="false"></a></li>
								<li class="banner3" style="width: 1423px; float: left; display: block;"><a><img src="/h/images/ad3.jpg" draggable="false"></a></li>
								<li class="banner4 am-active-slide" style="width: 1423px; float: left; display: block;"><a><img src="/h/images/ad4.jpg" draggable="false"></a></li>

							<li class="banner1 clone" style="width: 1423px; float: left; display: block;" aria-hidden="true"><a href="introduction.html"><img src="/h/images/ad1.jpg" draggable="false"></a></li></ul></div><ol class="am-control-nav am-control-paging"><li><a class="">1</a><i></i></li><li class=""><a class="">2</a><i></i></li><li class=""><a class="">3</a><i></i></li><li class=""><a class="am-active">4</a><i></i></li></ol><ul class="am-direction-nav"><li class="am-nav-prev"><a class="am-prev" href="#"> </a></li><li class="am-nav-next"><a class="am-next" href="#"> </a></li></ul></div>
						<div class="clear"></div>	
			</div>

<div class="shopNav">
				<div class="slideall">

					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
		        				
						<!--侧边导航 -->
						<div id="nav" class="navfull">
							<div class="area clearfix">
								<div class="category-content" id="guide_2">
									
									<div class="category">
										<ul class="category-list" id="js_climit_li">
											@foreach($common_cates_data as $k => $v)
											<li class="appliance js_toggle relative first">
												<div class="category-info">
													<h3 class="category-name b-category-name"><a class="ml-22" title="点心">{{$v->cname}}</a></h3>
													<em>&gt;</em></div>
												<div class="menu-item menu-in top" style="display: none;">
													<div class="area-in">
														<div class="area-bg">
															<div class="menu-srot">
																<div class="sort-side">
															@foreach($v->sub as $a => $b)
																	<dl class="dl-sort">
																		<dt><span >{{$b->cname}}</span></dt>
																		@foreach($b->sub as $c => $d)
																		<dd><a href="/home/index?search={{$d->cname}}"><span>{{$d->cname}}</span></a></dd>
																		@endforeach	
																	</dl>
																@endforeach
																</div>				
															</div>
														</div>
													</div>
												</div>
											
											<b class="arrow"></b>	
											</li>
											@endforeach 
											
										</ul>
									</div>
								</div>

							</div>
						</div>
						
						<!--轮播 -->
						<script type="text/javascript">
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script>


					<!--小导航 -->
					<div class="am-g am-g-fixed smallnav">
						<div class="am-u-sm-3">
							<a href="sort.html"><img src="/h/images/navsmall.jpg">
								<div class="title">商品分类</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/h/images/huismall.jpg">
								<div class="title">大聚惠</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/h/images/mansmall.jpg">
								<div class="title">个人中心</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/h/images/moneysmall.jpg">
								<div class="title">投资理财</div>
							</a>
						</div>
					</div>

					<!--走马灯 -->

					<div class="marqueen">
						<span class="marqueen-title">商城头条</span>
						<div class="demo">

							<ul>
								<li class="title-first"><a target="_blank" href="#">
									<img src="/h/images/TJ2.jpg">
									<span>[特惠]</span>商城爆品1分秒								
								</a></li>
								<li class="title-first"><a target="_blank" href="#">
									<span>[公告]</span>商城与广州市签署战略合作协议
								     <img src="/h/images/TJ.jpg">
								     <p>XXXXXXXXXXXXXXXXXX</p>
							    </a></li>
							    
						<div class="mod-vip">

							@if(isset($_SESSION['user']))
							<div class="m-baseinfo">
								<a href="person/index.html">
									<img src="/uploads/{{$_SESSION['user']->profile}}">
								</a>
								<em>
									Hi,<span class="s-name">{{$_SESSION['user']->uname}}</span>
									<a href="#"><p>点击更多优惠活动</p></a>									
								</em>
							</div>
							<div class="member-logout">
								<a class="am-btn-warning btn" href="/home/center">个人中心</a>
								<a class="am-btn-warning btn" href="/home/collecct">收藏</a>
							</div>
							@else
							<div class="m-baseinfo">
								<a href="person/index.html">
									<img src="/h/images/getAvatar.do.jpg">
								</a>
								<em>
									Hi,<span class="s-name">小叮当</span>
									<a href="#"><p>点击更多优惠活动</p></a>									
								</em>
							</div>
							<div class="member-logout">
								<a class="am-btn-warning btn" href="/home/login">登录</a>
								<a class="am-btn-warning btn" href="/home/register">注册</a>
							</div>
							@endif

							<div class="member-login">
								<a href="#"><strong>0</strong>待收货</a>
								<a href="#"><strong>0</strong>待发货</a>
								<a href="#"><strong>0</strong>待付款</a>
								<a href="#"><strong>0</strong>待评价</a>
							</div>
							<div class="clear"></div>	
						</div>																    
							    
								<li><a target="_blank" href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a></li>
								<li><a target="_blank" href="#"><span>[公告]</span>华北、华中部分地区配送延迟</a></li>
								<li><a target="_blank" href="#"><span>[特惠]</span>家电狂欢千亿礼券 买1送1！</a></li>
								
							</ul>
                        <div class="advTip"><img src="/h/images/advTip.jpg"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script>
			</div>
<div class="shopMainbg">
				<div class="shopMain" id="shopmain">

					<!--今日推荐 -->

					<div class="am-g am-g-fixed recommendation">
						<div class="clock am-u-sm-3" "="">
							<img src="/h/images/2016.png ">
							<p>今日<br>推荐</p>
						</div>
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>真的有鱼</h3>
								<h4>开年福利篇</h4>
							</div>
							<div class="recommendationMain one">
								<img src="/h/images/tj.png ">
							</div>
						</div>						
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>囤货过冬</h3>
								<h4>让爱早回家</h4>
							</div>
							<div class="recommendationMain two">
								<img src="/h/images/tj1.png ">
							</div>
						</div>
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>浪漫情人节</h3>
								<h4>甜甜蜜蜜</h4>
							</div>
							<div class="recommendationMain three ">
								<img src="/h/images/tj2.png ">
							</div>
						</div>

					</div>
					<div class="clear "></div>
					<!--热门活动 -->

					<div class="am-container activity ">
						<div class="shopTitle ">
							<h4>活动</h4>
							<h3>每期活动 优惠享不停 </h3>
							<span class="more ">
                               <a href="# ">全部活动<i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
                            </span>
						</div>
					
					  <div class="am-g am-g-fixed ">
						<div class="am-u-sm-3 ">
							<div class="icon-sale one "></div>	
								<h4>秒杀</h4>							
							<div class="activityMain ">
								<img src="/h/images/activity1.jpg ">
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>
							</div>														
						</div>
						
						<div class="am-u-sm-3 ">
						  <div class="icon-sale two "></div>	
							<h4>特惠</h4>
							<div class="activityMain ">
								<img src="/h/images/activity2.jpg ">
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>								
							</div>							
						</div>						
						
						<div class="am-u-sm-3 ">
							<div class="icon-sale three "></div>
							<h4>团购</h4>
							<div class="activityMain ">
								<img src="/h/images/activity3.jpg ">
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>
							</div>							
						</div>						

						<div class="am-u-sm-3 last ">
							<div class="icon-sale "></div>
							<h4>超值</h4>
							<div class="activityMain ">
								<img src="/h/images/activity.jpg ">
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>
							</div>													
						</div>

					  </div>
                   </div>
					<div class="clear "></div>

					@foreach($common_cates_data  as $k => $v)
                <div id="f1">
					
					
					<!--坚果-->
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>{{$v->cname}}</h4>
							
							<div class="today-brands ">
								@foreach($v->sub as $a=>$b)
								<a href="/home/index?search={{$b->cname}} ">{{$b->cname}}</a>
								@endforeach
								
							</div>
							<span class="more ">
                                <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
                            </span>
						</div>
					</div>
					<div class="am-g am-g-fixed floodFour" >
						<div class="am-u-sm-5 am-u-md-4 text-one list " style="background:#<?php 
								if($v->cname=='休闲食品'){
									echo 'FF7A64';
								}elseif($v->cname=='茶饮冲调'){
									echo 'B373FB';
								}elseif($v->cname=='生鲜果蔬'){
									echo '8ED515';
								}elseif($v->cname=='米面粮油'){
									echo 'FEBD00';
								}elseif($v->cname=='厨房调味'){
									echo 'F49360';
								}elseif($v->cname=='牛奶饮品'){
									echo '2ABFF7';
								}elseif($v->cname=='美酒佳酿'){
									echo '84D2F6';
								}elseif($v->cname=='批发城'){
									echo 'FF9229';
								}elseif($v->cname=='滋养保健'){
								echo 'FFF001';
								}	

							?>
							



						">
							<div class="word">
								@foreach($v->sub as $a=> $b)
								<a class="outer" href="/home/index?search={{$b->cname}}"><span class="inner"><b class="text">{{$b->cname}}</b></span></a>
								@endforeach
																
							</div>
							<a href="# ">
								<div class="outer-con ">
									<!-- <div class="title ">
									开抢啦！
									</div>
									<div class="sub-title ">
										{{$v->cname}}
									</div>	 -->								
								</div>
								@if($v->cname=='休闲食品')
									 <img src="/h/images/O1CN01ZGUD2S1KMk0kln48R_!!1893751150.jpg ">
								@elseif($v->cname=='茶饮冲调')
								<img src="/h/images/TB1ZqQgXRHH8KJjy0FbXXcqlpXa-240-296.jpg ">
								
								@elseif($v->cname=='生鲜果蔬')
								<img src="/h/images/activity2.jpg">
								@elseif($v->cname=='米面粮油')
								<img src="/h/images/TB1wzRexCtYBeNjSspkXXbU8VXa-240-290.jpg">
								@elseif($v->cname=='厨房调味')
								<img src="/h/images/TB1nFQQRpXXXXaFXXXXXXXXXXXX-240-296.jpg">
								@elseif($v->cname=='牛奶饮品')
								<img src="/h/images/TB1sbeZzNTpK1RjSZFGSuwHqFXa.jpg">
								@elseif($v->cname=='美酒佳酿')
								<img src="/h/images/TB1centbSf2gK0jSZFPXXXsopXa-240-296.jpg">
								@elseif($v->cname=='批发城')
								<img src="/h/images/TB1jFxCSpXXXXcXaFXXSutbFXXX.jpg">
								@elseif($v->cname=='滋养保健')
								<img src="/h/images/activity.jpg">
								@endif
                                  <!-- <img src="/h/images/act1.png ">								 -->
							</a>
							<div class="triangle-topright"></div>						
						</div>
								
							
							@foreach($data as $c=>$d)
						

								@foreach($d->name as $e=> $f)
								@if($f->cid==$v->id)
								<div class="am-u-sm-7 am-u-md-4 text-two ">
									<div class="outer-con ">
										<div class="title ">
											{{$f->title}}
										</div>									
										<div class="sub-title ">
											{{$f->price}}
										</div>
											<a href="/home/car/add?id={{$f->id}}">
												<i class="am-icon-shopping-basket am-icon-md  seprate"></i>				
											</a>					
									</div>
									<a href="/home/goods?id={{$f->id}} "><img src="/uploads/{{$f->goodspic->pic}}"></a>
								</div>
								@endif
								@endforeach
								
							@endforeach

					</div>
                     
                 </div>				
                 @endforeach


					
		<!-- </div>
			</div>
			<div class="navCir">
			<li class="active"><a href="home1.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div> -->

@include('home.layout.right')
		<script>
			window.jQuery || document.write('<script src="basic/js/jquery.min.js "><\/script>');
		</script>
		<script type="text/javascript " src="/h/basic/js/quick_links.js "></script>
		@include('home.layout.footer')
@endsection