@extends('home.layout.index')
@section('content')
<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="/h/basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="/h/css/seastyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/h/basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="/h/js/script.js"></script>
<div class="clear"></div>
<b class="line"></b>
<div class="search">
			<div class="search-list">
			<div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					  
			</div>
			
				
					<div class="am-g am-g-fixed">
						<div class="am-u-sm-12 am-u-md-12">
	                  	<div class="them-popover">														
							
							<div class="clear"></div>
                        </div>
							<div class="search-content" style="width:100%;margin-top:20px">
								
								<div class="clear"></div>


								<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
									@foreach($data as $k => $v)
									
									<li>
										<a href="/home/goods?id={{$v->id}}">
										<div class="i-pic limit">

											<img src="/uploads/{{$v->goodspic->pic}}">											
											<p class="title fl">{{$v->title}}</p>
											<p class="price fl">
												<b>¥</b>
												<strong>{{$v->price}}</strong>
											</p>
											<p class="number fl">
												销量<span>1110</span>
											</p>
										</div>
										</a>
									</li>
									@endforeach
								
								</ul>
							</div>

			
		</div>
							
<!-- >>>>>>> origin/songxin -->
							<div class="clear"></div>
							<!--分页 -->
							

						</div>
					</div>
					
				</div>

			</div>
			<div class="navCir">
			<li><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>
		
		<script>
			window.jQuery || document.write('<script src="/h/basic/js/jquery-1.9.min.js"><\/script>');
		</script>
		<script type="text/javascript" src="/h/basic/js/quick_links.js"></script>
		<div class="theme-popover-mask"></div>
		
		
@endsection