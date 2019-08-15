
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>Orange lala</title>

		<!-- 城市三级连动 -->
		<script type="text/javascript" src="/h/3/jquery.provincesCity.js"></script>
		<script type="text/javascript" src="/h/3/provincesData.js"></script>

		<!-- 首页 -->
		
		<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="/h/basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="/h/css/hmstyle.css" rel="stylesheet" type="text/css" />
		<script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/h/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
		<style type="text/css">
    #page_page li{
        list-style-type: none;
        margin:0;
        padding: 0;
    }
    #page_page li{
        position: relative;
        float: left;
        padding: 6px 12px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
    }

   
</style>	
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
					<div class="menu-hd"><a href="/home/collection" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span><strong id="J_MiniCartNum" class="h"></strong></a></div>
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