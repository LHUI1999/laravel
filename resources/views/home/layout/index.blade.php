
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>Orange lala</title>


		<!-- 城市三级连动 -->
		<script type="text/javascript" src="/h/3/jquery.provincesCity.js"></script>
		<script type="text/javascript" src="/h/3/provincesData.js"></script>

	</head>

	<body>

		<!--顶部导航条 -->
		<div class="am-container header">
			<ul class="message-l">
				<div class="topMessage">
					@if(isset($_SESSION['user']))
					<div class="menu-hd">
						<img style="width:35px;height:35px;border-radius: 50%;" src="/uploads/{{$_SESSION['user']->profile}}">
						{{ $_SESSION['user']->uname }}
					</div>
					@else
					<div class="menu-hd">
						<a href="/home/login" target="_top" class="h">亲，请登录</a>
						<a href="/home/register" target="_top">免费注册</a>
					</div>
					@endif
				</div>
			</ul>
			<ul class="message-r">
				<div class="topMessage home">
					<div class="menu-hd"><a href="/home/index" target="_top" class="h">商城首页</a></div>
				</div>
				<div class="topMessage my-shangcheng">
					<div class="menu-hd MyShangcheng"><a href="/home/center" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
				</div>
				<div class="topMessage mini-cart">
					<div class="menu-hd"><a id="mc-menu-hd" href="/home/car/index" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">{{$carcount}}</strong></a></div>
				</div>
				<div class="topMessage favorite">
					<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
			</ul>
			</div>

			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo"><img src="/h/images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="/h/images/logobig.png" /></li>
				</div>

				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="#"></a>
					<form action="/home/index" method="post">
						{{csrf_field()}}
						<input id="searchInput" name="search" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn"  value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>

			<div class="clear"></div>

			<!--购物车 -->
			<div class="concent">

				@if(session('success'))
						<div class='alert alert-success'>
							{{session('success')}}
						</div>
					@endif
					@if(session('error'))
						<div class='alert alert-error'>
							{{session('success')}}
						</div>
					@endif

				@section('content')
				@show

				

			</div>

			

			<!--操作页面-->

			<div class="theme-popover-mask"></div>

			
		
	</body>

</html>