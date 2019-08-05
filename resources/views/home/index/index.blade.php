@extends('home.layout.index')
@section('content')

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
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
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
											@foreach($cate as $k => $v)
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
																		<dt><span title="蛋糕">{{$b->cname}}</span></dt>
																		@foreach($b->sub as $c => $d)
																		<dd><a title="蒸蛋糕" href="#"><span>{{$d->cname}}</span></a></dd>
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

					<!--甜点-->
					<div id="f1">
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>甜品</h4>
							<h3>每一道甜品都有一个故事</h3>
							<div class="today-brands ">
								<a href="# ">桂花糕</a>
								<a href="# ">奶皮酥</a>
								<a href="# ">栗子糕 </a>
								<a href="# ">马卡龙</a>
								<a href="# ">铜锣烧</a>
								<a href="# ">豌豆黄</a>
							</div>
							<span class="more ">
                                 <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
                            </span>
						</div>
					</div>
					
					<div class="am-g am-g-fixed floodFive ">
												
						<div class="am-u-sm-5 am-u-md-3 text-one list">
							<div class="word">
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>	
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>									
							</div>						
							<a href="# ">
								<img src="/h/images/act1.png ">
								<div class="outer-con ">
									<div class="title ">
										零食大礼包开抢啦
									</div>
									<div class="sub-title ">
										当小鱼儿恋上软豆腐
									</div>
								</div>
							</a>
							<div class="triangle-topright"></div>	
						</div>
						<div class="am-u-sm-7 am-u-md-5 am-u-lg-2 text-two">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>
									<div class="sub-title ">
										¥13.8
									</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>									
								</div>
								<a href="# "><img src="/h/images/1.jpg "></a>						
						</div>
						
						<div class="am-u-md-2 am-u-lg-2 text-three sug">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>								
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/2.jpg"></a>
						</div>
						<div class="am-u-md-2 am-u-lg-2 text-three big">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/5.jpg"></a>
						</div>			
						<div class="am-u-sm-4 am-u-md-5 am-u-lg-4 text-five">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>								
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/3.jpg"></a>
						</div>	
						<div class="am-u-sm-4 am-u-md-2 am-u-lg-2 text-six">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/4.jpg"></a>
						</div>	
						<div class="am-u-sm-4 am-u-md-2 am-u-lg-4 text-six big">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/5.jpg"></a>
						</div>							
					</div>

					<div class="clear "></div>
					</div>

                    <div id="f2">
					<!--坚果-->
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>坚果</h4>
							<h3>酥酥脆脆，回味无穷</h3>
							<div class="today-brands ">
								<a href="# ">腰果</a>
								<a href="# ">松子</a>
								<a href="# ">夏威夷果 </a>
								<a href="# ">碧根果</a>
								<a href="# ">开心果</a>
								<a href="# ">核桃仁</a>
							</div>
							<span class="more ">
                                <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
                            </span>
						</div>
					</div>
					<div class="am-g am-g-fixed floodFour">
						<div class="am-u-sm-5 am-u-md-4 text-one list ">
							<div class="word">
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>	
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>									
							</div>
							<a href="# ">
								<div class="outer-con ">
									<div class="title ">
									开抢啦！
									</div>
									<div class="sub-title ">
										零食大礼包
									</div>									
								</div>
                                  <img src="/h/images/act1.png ">								
							</a>
							<div class="triangle-topright"></div>						
						</div>
						
							<div class="am-u-sm-7 am-u-md-4 text-two sug">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>									
									<div class="sub-title ">
										¥13.8
									</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>									
								</div>
								<a href="# "><img src="/h/images/6.jpg"></a>
							</div>

							<div class="am-u-sm-7 am-u-md-4 text-two">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>
									<div class="sub-title ">
										¥13.8
									</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>									
								</div>
								<a href="# "><img src="/h/images/7.jpg"></a>
							</div>


						<div class="am-u-sm-3 am-u-md-2 text-three big">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/10.jpg"></a>
						</div>

						<div class="am-u-sm-3 am-u-md-2 text-three sug">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/9.jpg"></a>
						</div>

						<div class="am-u-sm-3 am-u-md-2 text-three ">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/8.jpg"></a>
						</div>

						<div class="am-u-sm-3 am-u-md-2 text-three last big ">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/10.jpg"></a>
						</div>

					</div>
                 <div class="clear "></div>                 
                 </div>				

					<!--甜点-->
					<div id="f3">
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>甜品</h4>
							<h3>每一道甜品都有一个故事</h3>
							<div class="today-brands ">
								<a href="# ">桂花糕</a>
								<a href="# ">奶皮酥</a>
								<a href="# ">栗子糕 </a>
								<a href="# ">马卡龙</a>
								<a href="# ">铜锣烧</a>
								<a href="# ">豌豆黄</a>
							</div>
							<span class="more ">
                                 <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
                            </span>
						</div>
					</div>
					
					<div class="am-g am-g-fixed floodFive ">
												
						<div class="am-u-sm-5 am-u-md-3 text-one list">
							<div class="word">
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>	
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>									
							</div>						
							<a href="# ">
								<img src="/h/images/act1.png ">
								<div class="outer-con ">
									<div class="title ">
										零食大礼包开抢啦
									</div>
									<div class="sub-title ">
										当小鱼儿恋上软豆腐
									</div>
								</div>
							</a>
							<div class="triangle-topright"></div>	
						</div>
						<div class="am-u-sm-7 am-u-md-5 am-u-lg-2 text-two">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>
									<div class="sub-title ">
										¥13.8
									</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>									
								</div>
								<a href="# "><img src="/h/images/1.jpg "></a>						
						</div>
						
						<div class="am-u-md-2 am-u-lg-2 text-three sug">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>								
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/2.jpg"></a>
						</div>
						<div class="am-u-md-2 am-u-lg-2 text-three big">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/5.jpg"></a>
						</div>			
						<div class="am-u-sm-4 am-u-md-5 am-u-lg-4 text-five">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>								
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/3.jpg"></a>
						</div>	
						<div class="am-u-sm-4 am-u-md-2 am-u-lg-2 text-six">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/4.jpg"></a>
						</div>	
						<div class="am-u-sm-4 am-u-md-2 am-u-lg-4 text-six big">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/5.jpg"></a>
						</div>							
					</div>
					<div class="clear "></div>
					</div>

                    <div id="f4">
					<!--坚果-->
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>坚果</h4>
							<h3>酥酥脆脆，回味无穷</h3>
							<div class="today-brands ">
								<a href="# ">腰果</a>
								<a href="# ">松子</a>
								<a href="# ">夏威夷果 </a>
								<a href="# ">碧根果</a>
								<a href="# ">开心果</a>
								<a href="# ">核桃仁</a>
							</div>
							<span class="more ">
                                <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
                            </span>
						</div>
					</div>
					<div class="am-g am-g-fixed floodFour">
						<div class="am-u-sm-5 am-u-md-4 text-one list ">
							<div class="word">
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>	
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>									
							</div>
							<a href="# ">
								<div class="outer-con ">
									<div class="title ">
									开抢啦！
									</div>
									<div class="sub-title ">
										零食大礼包
									</div>									
								</div>
                                  <img src="/h/images/act1.png ">								
							</a>
							<div class="triangle-topright"></div>						
						</div>
						
							<div class="am-u-sm-7 am-u-md-4 text-two sug">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>									
									<div class="sub-title ">
										¥13.8
									</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>									
								</div>
								<a href="# "><img src="/h/images/6.jpg"></a>
							</div>

							<div class="am-u-sm-7 am-u-md-4 text-two">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>
									<div class="sub-title ">
										¥13.8
									</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>									
								</div>
								<a href="# "><img src="/h/images/7.jpg"></a>
							</div>


						<div class="am-u-sm-3 am-u-md-2 text-three big">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/10.jpg"></a>
						</div>

						<div class="am-u-sm-3 am-u-md-2 text-three sug">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/9.jpg"></a>
						</div>

						<div class="am-u-sm-3 am-u-md-2 text-three ">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/8.jpg"></a>
						</div>

						<div class="am-u-sm-3 am-u-md-2 text-three last big ">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/10.jpg"></a>
						</div>

					</div>
                 <div class="clear "></div>                 
                 </div>	
                 
					<!--甜点-->
					<div id="f5">
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>甜品</h4>
							<h3>每一道甜品都有一个故事</h3>
							<div class="today-brands ">
								<a href="# ">桂花糕</a>
								<a href="# ">奶皮酥</a>
								<a href="# ">栗子糕 </a>
								<a href="# ">马卡龙</a>
								<a href="# ">铜锣烧</a>
								<a href="# ">豌豆黄</a>
							</div>
							<span class="more ">
                                 <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
                            </span>
						</div>
					</div>
					
					<div class="am-g am-g-fixed floodFive ">
												
						<div class="am-u-sm-5 am-u-md-3 text-one list">
							<div class="word">
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>	
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>									
							</div>					
							<a href="# ">
								<img src="/h/images/act1.png ">
								<div class="outer-con ">
									<div class="title ">
										零食大礼包开抢啦
									</div>
									<div class="sub-title ">
										当小鱼儿恋上软豆腐
									</div>
								</div>
							</a>
							<div class="triangle-topright"></div>	
						</div>
						<div class="am-u-sm-7 am-u-md-5 am-u-lg-2 text-two">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>
									<div class="sub-title ">
										¥13.8
									</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>									
								</div>
								<a href="# "><img src="/h/images/1.jpg "></a>						
						</div>
						
						<div class="am-u-md-2 am-u-lg-2 text-three sug">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>								
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/2.jpg"></a>
						</div>
						<div class="am-u-md-2 am-u-lg-2 text-three big">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/5.jpg"></a>
						</div>			
						<div class="am-u-sm-4 am-u-md-5 am-u-lg-4 text-five">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>								
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/3.jpg"></a>
						</div>	
						<div class="am-u-sm-4 am-u-md-2 am-u-lg-2 text-six">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/4.jpg"></a>
						</div>	
						<div class="am-u-sm-4 am-u-md-2 am-u-lg-4 text-six big">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/5.jpg"></a>
						</div>							
					</div>
					<div class="clear "></div>
					</div>

                    <div id="f6">
					<!--坚果-->
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>坚果</h4>
							<h3>酥酥脆脆，回味无穷</h3>
							<div class="today-brands ">
								<a href="# ">腰果</a>
								<a href="# ">松子</a>
								<a href="# ">夏威夷果 </a>
								<a href="# ">碧根果</a>
								<a href="# ">开心果</a>
								<a href="# ">核桃仁</a>
							</div>
							<span class="more ">
                                <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
                            </span>
						</div>
					</div>
					<div class="am-g am-g-fixed floodFour">
						<div class="am-u-sm-5 am-u-md-4 text-one list ">
							<div class="word">
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>	
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>									
							</div>
							<a href="# ">
								<div class="outer-con ">
									<div class="title ">
									开抢啦！
									</div>
									<div class="sub-title ">
										零食大礼包
									</div>									
								</div>
                                  <img src="/h/images/act1.png ">								
							</a>
							<div class="triangle-topright"></div>						
						</div>
						
							<div class="am-u-sm-7 am-u-md-4 text-two sug">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>									
									<div class="sub-title ">
										¥13.8
									</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>									
								</div>
								<a href="# "><img src="/h/images/6.jpg"></a>
							</div>

							<div class="am-u-sm-7 am-u-md-4 text-two">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>
									<div class="sub-title ">
										¥13.8
									</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>									
								</div>
								<a href="# "><img src="/h/images/7.jpg"></a>
							</div>


						<div class="am-u-sm-3 am-u-md-2 text-three big">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/10.jpg"></a>
						</div>

						<div class="am-u-sm-3 am-u-md-2 text-three sug">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/9.jpg"></a>
						</div>

						<div class="am-u-sm-3 am-u-md-2 text-three ">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>									
							</div>
							<a href="# "><img src="/h/images/8.jpg"></a>
						</div>

						<div class="am-u-sm-3 am-u-md-2 text-three last big ">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>									
							</div>
							<a href="# "><img src="/h/images/10.jpg"></a>
						</div>

					</div>
                 <div class="clear "></div>                 
                 </div>	
                 
					<!--甜点-->
					<div id="f7">
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>甜品</h4>
							<h3>每一道甜品都有一个故事</h3>
							<div class="today-brands ">
								<a href="# ">桂花糕</a>
								<a href="# ">奶皮酥</a>
								<a href="# ">栗子糕 </a>
								<a href="# ">马卡龙</a>
								<a href="# ">铜锣烧</a>
								<a href="# ">豌豆黄</a>
							</div>
							<span class="more ">
                                 <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
                            </span>
						</div>
					</div>
					
					<div class="am-g am-g-fixed floodFive ">
												
						<div class="am-u-sm-5 am-u-md-3 text-one list">
							<div class="word">
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>	
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>									
							</div>						
							<a href="# ">
								<img src="/h/images/act1.png ">
								<div class="outer-con ">
									<div class="title ">
										零食大礼包开抢啦
									</div>
									<div class="sub-title ">
										当小鱼儿恋上软豆腐
									</div>
								</div>
							</a>
							<div class="triangle-topright"></div>	
						</div>
						<div class="am-u-sm-7 am-u-md-5 am-u-lg-2 text-two">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>
									<div class="sub-title ">
										¥13.8
									</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>									
								</div>
								<a href="# "><img src="/h/images/1.jpg "></a>						
						</div>
						
						<div class="am-u-md-2 am-u-lg-2 text-three sug">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>								
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/2.jpg"></a>
						</div>
						<div class="am-u-md-2 am-u-lg-2 text-three big">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/5.jpg"></a>
						</div>			
						<div class="am-u-sm-4 am-u-md-5 am-u-lg-4 text-five">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>								
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/3.jpg"></a>
						</div>	
						<div class="am-u-sm-4 am-u-md-2 am-u-lg-2 text-six">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/4.jpg"></a>
						</div>	
						<div class="am-u-sm-4 am-u-md-2 am-u-lg-4 text-six big">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/5.jpg"></a>
						</div>							
					</div>

					<div class="clear "></div>
					</div>

                    <div id="f8">
					<!--坚果-->
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>坚果</h4>
							<h3>酥酥脆脆，回味无穷</h3>
							<div class="today-brands ">
								<a href="# ">腰果</a>
								<a href="# ">松子</a>
								<a href="# ">夏威夷果 </a>
								<a href="# ">碧根果</a>
								<a href="# ">开心果</a>
								<a href="# ">核桃仁</a>
							</div>
							<span class="more ">
                                <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
                            </span>
						</div>
					</div>
					<div class="am-g am-g-fixed floodFour">
						<div class="am-u-sm-5 am-u-md-4 text-one list ">
							<div class="word">
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>	
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>									
							</div>
							<a href="# ">
								<div class="outer-con ">
									<div class="title ">
									开抢啦！
									</div>
									<div class="sub-title ">
										零食大礼包
									</div>									
								</div>
                                  <img src="/h/images/act1.png ">								
							</a>
							<div class="triangle-topright"></div>						
						</div>
						
							<div class="am-u-sm-7 am-u-md-4 text-two sug">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>									
									<div class="sub-title ">
										¥13.8
									</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>									
								</div>
								<a href="# "><img src="/h/images/6.jpg"></a>
							</div>

							<div class="am-u-sm-7 am-u-md-4 text-two">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>
									<div class="sub-title ">
										¥13.8
									</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>									
								</div>
								<a href="# "><img src="/h/images/7.jpg"></a>
							</div>


						<div class="am-u-sm-3 am-u-md-2 text-three big">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/10.jpg"></a>
						</div>

						<div class="am-u-sm-3 am-u-md-2 text-three sug">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/9.jpg"></a>
						</div>

						<div class="am-u-sm-3 am-u-md-2 text-three ">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/8.jpg"></a>
						</div>

						<div class="am-u-sm-3 am-u-md-2 text-three last big ">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/10.jpg"></a>
						</div>

					</div>
                 <div class="clear "></div>                 
                 </div>				

					<!--甜点-->
					<div id="f9">
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>甜品</h4>
							<h3>每一道甜品都有一个故事</h3>
							<div class="today-brands ">
								<a href="# ">桂花糕</a>
								<a href="# ">奶皮酥</a>
								<a href="# ">栗子糕 </a>
								<a href="# ">马卡龙</a>
								<a href="# ">铜锣烧</a>
								<a href="# ">豌豆黄</a>
							</div>
							<span class="more ">
                                 <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
                            </span>
						</div>
					</div>
					
					<div class="am-g am-g-fixed floodFive ">
												
						<div class="am-u-sm-5 am-u-md-3 text-one list">
							<div class="word">
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>	
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>									
							</div>							
							<a href="# ">
								<img src="/h/images/act1.png ">
								<div class="outer-con ">
									<div class="title ">
										零食大礼包开抢啦
									</div>
									<div class="sub-title ">
										当小鱼儿恋上软豆腐
									</div>
								</div>
							</a>
							<div class="triangle-topright"></div>	
						</div>
						<div class="am-u-sm-7 am-u-md-5 am-u-lg-2 text-two">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>
									<div class="sub-title ">
										¥13.8
									</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>									
								</div>
								<a href="# "><img src="/h/images/1.jpg "></a>						
						</div>
						
						<div class="am-u-md-2 am-u-lg-2 text-three sug">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>								
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/2.jpg"></a>
						</div>
						<div class="am-u-md-2 am-u-lg-2 text-three big">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/5.jpg"></a>
						</div>			
						<div class="am-u-sm-4 am-u-md-5 am-u-lg-4 text-five">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>								
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/3.jpg"></a>
						</div>	
						<div class="am-u-sm-4 am-u-md-2 am-u-lg-2 text-six">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/4.jpg"></a>
						</div>	
						<div class="am-u-sm-4 am-u-md-2 am-u-lg-4 text-six big">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/5.jpg"></a>
						</div>							
					</div>

					<div class="clear "></div>
					</div>

                    <div id="f10">
					<!--坚果-->
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>坚果</h4>
							<h3>酥酥脆脆，回味无穷</h3>
							<div class="today-brands ">
								<a href="# ">腰果</a>
								<a href="# ">松子</a>
								<a href="# ">夏威夷果 </a>
								<a href="# ">碧根果</a>
								<a href="# ">开心果</a>
								<a href="# ">核桃仁</a>
							</div>
							<span class="more ">
                                <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
                            </span>
						</div>
					</div>
					<div class="am-g am-g-fixed floodFour">
						<div class="am-u-sm-5 am-u-md-4 text-one list ">
							<div class="word">
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>	
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>									
							</div>
							<a href="# ">
								<div class="outer-con ">
									<div class="title ">
									开抢啦！
									</div>
									<div class="sub-title ">
										零食大礼包
									</div>									
								</div>
                                  <img src="/h/images/act1.png ">								
							</a>
							<div class="triangle-topright"></div>						
						</div>
						
							<div class="am-u-sm-7 am-u-md-4 text-two sug">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>									
									<div class="sub-title ">
										¥13.8
									</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>									
								</div>
								<a href="# "><img src="/h/images/6.jpg"></a>
							</div>

							<div class="am-u-sm-7 am-u-md-4 text-two">
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>
									<div class="sub-title ">
										¥13.8
									</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>									
								</div>
								<a href="# "><img src="/h/images/7.jpg"></a>
							</div>


						<div class="am-u-sm-3 am-u-md-2 text-three big">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/10.jpg"></a>
						</div>

						<div class="am-u-sm-3 am-u-md-2 text-three sug">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/9.jpg"></a>
						</div>

						<div class="am-u-sm-3 am-u-md-2 text-three ">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/8.jpg"></a>
						</div>

						<div class="am-u-sm-3 am-u-md-2 text-three last big ">
							<div class="outer-con ">
								<div class="title ">
									小优布丁
								</div>
								<div class="sub-title ">
									¥4.8
								</div>
<i class="am-icon-shopping-basket am-icon-md  seprate"></i>								
							</div>
							<a href="# "><img src="/h/images/10.jpg"></a>
						</div>

					</div>
                     
                 </div>				


					
				</div>
			</div>
			<div class="navCir">
			<li class="active"><a href="home1.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>

<div class="tip">
			<div id="sidebar">
				<div id="wrap">
					<div id="prof" class="item ">
						<a href="# ">
							@if(isset($_SESSION['user']))
							<img class="setting " style="width:25px;height:25px;border-radius: 50%" src="/uploads/{{$_SESSION['user']->profile}}">
							@else
							<span class="setting "></span>
							@endif
						</a>
						<div class="ibar_login_box status_login " style="display: none;">
							@if(isset($_SESSION['user']))

							<div class="avatar_box ">
								<p class="avatar_imgbox "><img style="width:80px;height:80px;border-radius: 50%" src="/uploads/{{$_SESSION['user']->profile}}"></p>
								<ul class="user_info ">
									<li>用户名：{{$_SESSION['user']->uname}}</li>
									<li>级&nbsp;别：普通会员</li>
								</ul>
							</div>
							@else
							<div class="avatar_box ">
								<p class="avatar_imgbox "><img src="/h/images/no-img_mid_.jpg "></p>
								<ul class="user_info ">
									<li>用户名：sl1903</li>
									<li>级&nbsp;别：普通会员</li>
								</ul>
							</div>
							@endif

							<div class="login_btnbox ">
								<a href="# " class="login_order ">我的订单</a>
								<a href="# " class="login_favorite ">我的收藏</a>
							</div>
							<i class="icon_arrow_white "></i>
						</div>

					</div>
					<div id="shopCart " class="item ">
						<a href="/home/car/index ">
							<span class="message "></span>
						</a>

						<p>
							购物车
						</p>

						<p class="cart_num ">0</p>
					</div>
					<div id="asset " class="item ">
						<a href="# ">
							<span class="view "></span>
						</a>
						<div class="mp_tooltip " style="left: -121px; visibility: hidden;">
							我的资产
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="foot " class="item ">
						<a href="# ">
							<span class="zuji "></span>
						</a>
						<div class="mp_tooltip ">
							我的足迹
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="brand " class="item ">
						<a href="#">
							<span class="wdsc "><img src="/h/images/wdsc.png "></span>
						</a>
						<div class="mp_tooltip " style="left: -121px; visibility: hidden;">
							我的收藏
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="broadcast " class="item ">
						<a href="# ">
							<span class="chongzhi "><img src="/h/images/chongzhi.png "></span>
						</a>
						<div class="mp_tooltip " style="left: -121px; visibility: hidden;">
							我要充值
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div class="quick_toggle ">
						<li class="qtitem">
							<a href="# "><span class="kfzx "></span></a>
							<div class="mp_tooltip " style="left: -121px; visibility: hidden;">客服中心<i class="icon_arrow_right_black "></i></div>
						</li>
						<!--二维码 -->
						<li class="qtitem">
							<a href="#none "><span class="mpbtn_qrcode "></span></a>
							<div class="mp_qrcode " style="display: none;"><img src="images/weixin_code_145.png "><i class="icon_arrow_white "></i></div>
						</li>
						<li class="qtitem">
							<a href="#top " class="return_top "><span class="top "></span></a>
						</li>
					</div>

					<!--回到顶部 -->
					<div id="quick_links_pop " class="quick_links_pop hide "></div>

				</div>

			</div>
			<div id="prof-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					我
				</div>
			</div>
			<div id="shopCart-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					购物车
				</div>
			</div>
			<div id="asset-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					资产
				</div>

				<div class="ia-head-list ">
					<a href="# " target="_blank " class="pl ">
						<div class="num ">0</div>
						<div class="text ">优惠券</div>
					</a>
					<a href="# " target="_blank " class="pl ">
						<div class="num ">0</div>
						<div class="text ">红包</div>
					</a>
					<a href="# " target="_blank " class="pl money ">
						<div class="num ">￥0</div>
						<div class="text ">余额</div>
					</a>
				</div>

			</div>
			<div id="foot-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					足迹
				</div>
			</div>
			<div id="brand-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					收藏
				</div>
			</div>
			<div id="broadcast-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					充值
				</div>
			</div>
		</div>
		<script>
			window.jQuery || document.write('<script src="basic/js/jquery.min.js "><\/script>');
		</script>
		<script type="text/javascript " src="/h/basic/js/quick_links.js "></script>
@endsection