@extends('home.layout.index')
@section('content')
<link rel="stylesheet"  type="text/css" href="AmazeUI-2.4.2/assets/css/amazeui.css"/>
<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="/h/basic/css/demo.css" rel="stylesheet" type="text/css" />

<link href="/h/css/sustyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/h/basic/js/jquery-1.7.min.js"></script>

<div class="clear"></div>
<div class="take-delivery">
 <div class="status">
   <h2>您已成功付款</h2>
   <div class="successInfo">
     <ul>
       <li>付款金额<em>¥{{ $pricecount}}</em></li>
       <div class="user-info">
         <p>收货人：{{$_SESSION['address']->uname}}</p>
         <p>联系电话：{{$_SESSION['address']->phone}}</p>
         <p>收货地址：{{$_SESSION['address']->addr}}</p>
       </div>
             请认真核对您的收货信息，如有错误请联系客服
                               
     </ul>
     <div class="option">
       <span class="info">您可以</span>
        <a href="/home/order" class="J_MakePoint">查看<span>已买到的宝贝</span></a>
        <a href="/home/index" class="J_MakePoint"><span>返回首页</span></a>
     </div>
    </div>
  </div>
</div>
<div class="footer">
 <div class="footer-hd">
 <p>
 <a href="#">恒望科技</a>
 <b>|</b>
 <a href="#">商城首页</a>
 <b>|</b>
 <a href="#">支付宝</a>
 <b>|</b>
 <a href="#">物流</a>
 </p>
 </div>
 <div class="footer-bd">
 <p>
 <a href="#">关于恒望</a>
 <a href="#">合作伙伴</a>
 <a href="#">联系我们</a>
 <a href="#">网站地图</a>
 <em>© 2015-2025 Hengwang.com 版权所有</em>
 </p>
 </div>
</div>
@endsection