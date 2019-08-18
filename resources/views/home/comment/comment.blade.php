@extends('home.layout.index')

@section('content')
    
    <link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

    <link href="/h/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/h/css/cmstyle.css" rel="stylesheet" type="text/css">

    <script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/h/AmazeUI-2.4.2/assets/js/amazeui.js"></script>


		
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-comment">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">评价管理</strong> / <small>Manage&nbsp;Comment</small></div>
						</div>
						<hr/>
						@if(!$data)
						<div style="width:500px;height:100px;margin-left:350px;margin-top:50px;">
							<h2 class="am-article-title blog-title" style="font-weight: 700;font-size:25px;">
								您还没有评论呦！！！
							</h2>
						</div>
						@else
						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

							{{-- <ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">所有评价</a></li>
								<li><a href="#tab2">有图评价</a></li>

							</ul> --}}

							<div class="am-tabs-bd">
									
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
										
									<div class="comment-main">
											
										<div class="comment-list">
											
											<ul class="item-list">
												
												<div class="comment-top">
													<div class="th th-price">
														<td class="td-inner">评论</td>
													</div>
													<div class="th th-item">
														<td class="td-inner">商品</td>
													</div>	
                                                </div>
                                                @foreach ($data as $k=>$v)  
												<li class="td td-item">
													<div class="item-pic">                                                           
														<a href="/home/goods?id={{ $v->goods->id }}" class="J_MakePoint">       
                                                            <img src="/uploads/{{ $v->gpic->pic }}" class="itempic">                                                           
                                                        </a>                                                      
													</div>
												</li>

												<li class="td td-comment">
													<div class="item-title">
														<div class="">
															@if($v->level == 3)
															好评
															@elseif($v->level == 2)
															中评
															@else
															差评
															@endif
														</div>
														<div class="item-name">
															<a href="/home/goods?id={{ $v->goods->id }}">
																<p class="item-basic-info" style="margin-left:50px;width:333px">{{ $v->goods->title }}</p>
															</a>
														</div>
													</div>
													
													<div class="item-comment">
														{{ $v->text }}
                                                        <div class="filePic">
                                                            <div style="width:800px;height:50px;">
                                                            @foreach($v->cmpic as $kk=>$vv)
                                                                <img style="width:30px;height:30px;margin-top:30px;" src="/uploads/{{$vv->cmpic}}">
                                                            @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

													<div class="item-info">
														<div>
															{{-- <p class="info-little"><span>颜色：12#玛瑙</span> <span>包装：裸装</span> </p> --}}
															<p class="info-time">{{ $v->created_at }}</p>

														</div>
													</div>
                                                </li>
                                                @endforeach
												
											</ul>
											
										</div>
										
									</div>
									
								</div>
								
								{{-- <div class="am-tab-panel am-fade" id="tab2">
									
									<div class="comment-main">
										<div class="comment-list">
											<ul class="item-list">
												
												
												<div class="comment-top">
													<div class="th th-price">
														<td class="td-inner">评价</td>
													</div>
													<div class="th th-item">
														<td class="td-inner">商品</td>
													</div>													
												</div>
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img src="images/kouhong.jpg_80x80.jpg" class="itempic">
														</a>
													</div>
												</li>											
												
												<li class="td td-comment">
													<div class="item-title">
														<div class="item-opinion">好评</div>
														<div class="item-name">
															<a href="#">
																<p class="item-basic-info">美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
															</a>
														</div>
													</div>
													<div class="item-comment">
														宝贝非常漂亮，超级喜欢！！！ 口红颜色很正呐，还有第两支半价，买三支免单一支的活动，下次还要来买。就是物流太慢了，还要我自己去取快递，店家不考虑换个物流么？
													<div class="filePic"><img src="images/image.jpg" alt=""></div>	
													</div>

													<div class="item-info">
														<div>
															<p class="info-little"><span>颜色：12#玛瑙</span> <span>包装：裸装</span> </p>
															<p class="info-time">2015-12-24</p>

														</div>
													</div>
												</li>

											</ul>

										</div>
									</div>									
									
								</div> --}}
							</div>
						</div>
						@endif
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

  

@include('home.layout.footer')
@endsection