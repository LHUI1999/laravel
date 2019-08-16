@extends('home.layout.index')
@section('content')
<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
        <link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

        <link href="/h/css/personal.css" rel="stylesheet" type="text/css">
        <link href="/h/css/orstyle.css" rel="stylesheet" type="text/css">

        <script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
        <script src="/h/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

<div class="nav-table">
   <div class="long-title"><span class="all-goods">全部分类</span></div>
   
</div>
<b class="line"></b>
<div class="center">
    <div class="col-main">
        <div class="main-wrap">

            <div class="user-order">

                <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
                </div>
                <hr>

                <div class="am-tabs am-tabs-d2 am-margin" data-am-tabs="">

                    <ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
                        <li class=""><a href="#tab1">所有订单</a></li>
                        <li class=""><a href="#tab2">待付款</a></li>
                        <li class="am-active"><a href="#tab3">待发货</a></li>
                        <li class=""><a href="#tab4">待收货</a></li>
                        <li class=""><a href="#tab5">待评价</a></li>
                    </ul>

                    <div class="am-tabs-bd" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                        <div class="am-tab-panel am-fade" id="tab1">
                            <div class="order-top">
                                <div class="th th-item">
                                    商品
                                </div>
                                <div class="th th-price">
                                    单价
                                </div>
                                <div class="th th-number">
                                    数量
                                </div>
                                <div class="th th-operation">
                                    商品操作
                                </div>
                                <div class="th th-amount">
                                    合计
                                </div>
                                <div class="th th-status">
                                    交易状态
                                </div>
                                <div class="th th-change">
                                    交易操作
                                </div>
                            </div>

                            <div class="order-main">
                                @foreach($order as $k=>$v)
                                <div class="order-list">
                                    
                                    <!--交易成功-->
                                    <div class="order-status5">
                                        <div class="order-title">
                                            <div class="dd-num">订单编号：<a href="javascript:;">{{$v->order}}</a></div>
                                            <span>成交时间：{{$v->created_at}}</span>
                                            <!--    <em>店铺：小桔灯</em>-->
                                        </div>
                                        <div class="order-content">
                                            <div class="order-left">
                                                @foreach($v->orderinfo as $kk=>$vv)
                                                <ul class="item-list">
                                                    <li class="td td-item">
                                                        <div class="item-pic">
                                                            <a href="#" class="J_MakePoint">
                                                                <img src="/uploads/{{$vv->pic->pic}}" class="itempic J_ItemImg">
                                                            </a>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-basic-info">
                                                                <a href="#">
                                                                    <p>{{$vv->goods->title}}</p>
                                                                   
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="td td-price">
                                                        <div class="item-price">
                                                            {{$vv->goods->price}}
                                                        </div>
                                                    </li>
                                                    <li class="td td-number">
                                                        <div class="item-number">
                                                            {{$vv->num}}
                                                        </div>
                                                    </li>
                                                    <li class="td td-operation">
                                                        <div class="item-operation">
                                                            @if($v->status=='0')
                                                                <div class="item-operation">
                                                                    <a href="/home/order/refund?oid={{$v->id}}&gid={{$vv->gid}}">退款</a>
                                                                </div>
                                                            @elseif($v->status==5)
                                                            <div class="item-operation">
                                                                    退款中
                                                                </div>
                                                            @elseif($v->status==1)
                                                            <div class="item-operation">
                                                                    
                                                                </div>
                                                            @else
                                                            <div class="item-operation">
                                                                    <a href="/home/order/refund?oid={{$v->id}}&gid={{$vv->gid}}">退款/退货</a>
                                                                </div>
                                                            @endif
                                                            
                                                        </div>
                                                    </li>
                                                </ul>
                                                @endforeach

                                                
                                            </div>
                                            <div class="order-right">
                                                <li class="td td-amount">
                                                    <div class="item-amount">
                                                        合计：{{$v->price}}
                                                        <p>含运费：<span>包邮</span></p>
                                                    </div>
                                                </li>
                                                @if($v->status=='4')
                                                <div class="move-right">
                                                    <li class="td td-status">
                                                        <div class="item-status">
                                                            <p class="Mystatus">交易成功</p>
                                                            <p class="order-info"><a href="/home/order/orderinfo?oid={{$v->id}}">订单详情</a></p>
                                                            
                                                        </div>
                                                    </li>
                                                    <li class="td td-change">
                                                        <a href="/home/order/delorder?oid={{$v->id}}">
                                                            <div class="am-btn am-btn-danger anniu">
                                                            删除订单</div>
                                                        </a>
                                                        
                                                    </li>
                                                </div>
                                                @elseif($v->status=='0')
                                                <div class="move-right">
                                                    <li class="td td-status">
                                                        <div class="item-status">
                                                            <p class="Mystatus">买家已付款</p>
                                                            <p class="order-info"><a href="/home/order/orderinfo?oid={{$v->id}}">订单详情</a></p>
                                                        </div>
                                                    </li>
                                                    <li class="td td-change">
                                                        <div onclick="test()" class="am-btn am-btn-danger anniu">
                                                            提醒发货</div>
                                                    </li>
                                                </div>

                                                @elseif($v->status=='1')
                                                <div class="move-right">
                                                    <li class="td td-status">
                                                        <div class="item-status">
                                                            <p class="Mystatus">等待买家付款</p>
                                                            <p class="order-info"><a href="/home/order/quxiaoorder?oid={{$v->id}}">取消订单</a></p>

                                                        </div>
                                                    </li>
                                                    <li class="td td-change">
                                                        <a href="/home/order/onepay?order={{$v->order}}">
                                                        <div class="am-btn am-btn-danger anniu">
                                                            一键支付</div></a>
                                                    </li>
                                                </div>
                                                @elseif($v->status=='2')
                                                <div class="move-right">
                                                    <li class="td td-status">
                                                        <div class="item-status">
                                                            <p class="Mystatus">卖家已发货</p>
                                                            <p class="order-info"><a href="/home/order/orderinfo?oid={{$v->id}}">订单详情</a></p>
                                                            <p class="order-info"><a href="logistics.html">查看物流</a></p>
                                                            
                                                        </div>
                                                    </li>
                                                    <li class="td td-change">
                                                        <a href="/home/order/takeorder?oid={{$v->id}}"><div class="am-btn am-btn-danger anniu">
                                                            确认收货</div></a>
                                                    </li>
                                                </div>
                                                @elseif($v->status=='3')
                                                 <div class="move-right">
                                                        <li class="td td-status">
                                                            <div class="item-status">
                                                                <p class="Mystatus">交易成功</p>
                                                                <p class="order-info"><a href="/home/order/orderinfo?oid={{$v->id}}">订单详情</a></p>
                                                                <p class="order-info"><a href="logistics.html">查看物流</a></p>
                                                            </div>
                                                        </li>
                                                        <li class="td td-change">
                                                            <a href="/home/comment?oid={{$v->id}}">
                                                                <div class="am-btn am-btn-danger anniu">
                                                                    评价商品</div>
                                                            </a>
                                                        </li>
                                                    </div>
                                                    @elseif($v->status=='5')
                                                 <div class="move-right">
                                                        <li class="td td-status">
                                                            <div class="item-status">
                                                                <p class="Mystatus">退款退货</p>
                                                                <p class="order-info"><a href="/home/order/orderinfo?oid={{$v->id}}">订单详情</a></p>
                                                                <p class="order-info"><a href="logistics.html">查看物流</a></p>
                                                            </div>
                                                        </li>
                                                        <li class="td td-change">
                                                            <a href="/home/comment?oid={{$v->id}}">
                                                                <div class="am-btn am-btn-danger anniu">
                                                                    删除订单</div>
                                                            </a>
                                                        </li>
                                                    </div>
                                                    @elseif($v->status=='6')
                                                 <div class="move-right">
                                                        <li class="td td-status">
                                                            <div class="item-status">
                                                                <p class="Mystatus">订单取消</p>
                                                                
                                                            </div>
                                                        </li>
                                                        <li class="td td-change">
                                                            <a href="/home/comment?oid={{$v->id}}">
                                                                <div class="am-btn am-btn-danger anniu">
                                                                    删除订单</div>
                                                            </a>
                                                        </li>
                                                    </div>
                                                @endif



                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endforeach

                            </div>

                        </div>
                        <div class="am-tab-panel am-fade" id="tab2">

                            <div class="order-top">
                                <div class="th th-item">
                                    商品
                                </div>
                                <div class="th th-price">
                                    单价
                                </div>
                                <div class="th th-number">
                                    数量
                                </div>
                                <div class="th th-operation">
                                    商品操作
                                </div>
                                <div class="th th-amount">
                                    合计
                                </div>
                                <div class="th th-status">
                                    交易状态
                                </div>
                                <div class="th th-change">
                                    交易操作
                                </div>
                            </div>

                            <div class="order-main">
                                @foreach($order as $k=>$v)
                                    @if($v->status == '1')
                                <div class="order-list">
                                    <div class="order-status1">
                                        <div class="order-title">
                                            <div class="dd-num">订单编号：<a href="javascript:;">{{$v->order}}</a></div>
                                            <span>成交时间：{{$v->created_at}}</span>
                                            <!--    <em>店铺：小桔灯</em>-->
                                        </div>
                                        <div class="order-content">
                                            <div class="order-left">
                                               @foreach($v->orderinfo as $kk=>$vv)
                                                <ul class="item-list">
                                                    <li class="td td-item">
                                                        <div class="item-pic">
                                                            <a href="#" class="J_MakePoint">
                                                                <img src="/uploads/{{$vv->pic->pic}}" class="itempic J_ItemImg">
                                                            </a>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-basic-info">
                                                                <a href="#">
                                                                    <p>{{$vv->goods->title}}</p>
                                                                    
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="td td-price">
                                                        <div class="item-price">
                                                            {{$vv->goods->price}}
                                                        </div>
                                                    </li>
                                                    <li class="td td-number">
                                                        <div class="item-number">
                                                            {{$vv->num}}
                                                        </div>
                                                    </li>
                                                    <li class="td td-operation">
                                                        <div class="item-operation">

                                                        </div>
                                                    </li>
                                                </ul>
                                                @endforeach 
                                            </div>
                                            <div class="order-right">
                                                <li class="td td-amount">
                                                    <div class="item-amount">
                                                        合计：{{$v->price}}
                                                        <p>含运费：<span>包邮</span></p>
                                                    </div>
                                                </li>
                                                <div class="move-right">
                                                    <li class="td td-status">
                                                        <div class="item-status">
                                                            <p class="Mystatus">等待买家付款</p>
                                                            <p class="order-info"><a href="/home/order/quxiaoorder?oid={{$v->id}}">取消订单</a></p>

                                                        </div>
                                                    </li>
                                                    <li class="td td-change">
                                                        <a href="/home/order/onepay?order={{$v->order}}">
                                                        <div class="am-btn am-btn-danger anniu">
                                                            一键支付</div></a>
                                                    </li>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach



                            </div>
                        </div>
                        <div class="am-tab-panel am-fade am-active am-in" id="tab3">
                            <div class="order-top">
                                <div class="th th-item">
                                    商品
                                </div>
                                <div class="th th-price">
                                    单价
                                </div>
                                <div class="th th-number">
                                    数量
                                </div>
                                <div class="th th-operation">
                                    商品操作
                                </div>
                                <div class="th th-amount">
                                    合计
                                </div>
                                <div class="th th-status">
                                    交易状态
                                </div>
                                <div class="th th-change">
                                    交易操作
                                </div>
                            </div>

                            <div class="order-main">
                                @foreach($order as $k=>$v)
                                @if($v->status == '0')
                                <div class="order-list">
                                    <div class="order-status2">
                                        <div class="order-title">
                                            <div class="dd-num">订单编号：<a href="javascript:;">{{$v->order}}</a></div>
                                            <span>成交时间：{{$v->created_at}}</span>
                                            <!--    <em>店铺：小桔灯</em>-->
                                        </div>
                                        <div class="order-content">
                                            <div class="order-left">
                                                @foreach($v->orderinfo as $kk=>$vv)
                                                <ul class="item-list">
                                                    <li class="td td-item">
                                                        <div class="item-pic">
                                                            <a href="#" class="J_MakePoint">
                                                                <img src="/uploads/{{$vv->pic->pic}}" class="itempic J_ItemImg">
                                                            </a>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-basic-info">
                                                                <a href="#">
                                                                    <p>{{$vv->goods->title}}</p>
                                                                    
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="td td-price">
                                                        <div class="item-price">
                                                            {{$vv->goods->price}}
                                                        </div>
                                                    </li>
                                                    <li class="td td-number">
                                                        <div class="item-number">
                                                            {{$vv->num}}
                                                        </div>
                                                    </li>
                                                    <li class="td td-operation">
                                                        
                                                        <div class="item-operation">
                                                            <a href="/home/order/refund?oid={{$v->id}}&gid={{$vv->gid}}">退款</a>
                                                        </div>
                                                        
                                                    </li>
                                                </ul>
                                                @endforeach

                                                
                                            </div>
                                            <div class="order-right">
                                                <li class="td td-amount">
                                                    <div class="item-amount">
                                                        合计：{{$v->price}}
                                                        <p>含运费：<span>包邮</span></p>
                                                    </div>
                                                </li>
                                                <div class="move-right">
                                                    <li class="td td-status">
                                                        <div class="item-status">
                                                            <p class="Mystatus">买家已付款</p>
                                                            <p class="order-info"><a href="/home/order/orderinfo?oid={{$v->id}}">订单详情</a></p>
                                                        </div>
                                                    </li>
                                                    <li class="td td-change">
                                                        <div onclick="test()"  id='fa' class="am-btn am-btn-danger anniu">
                                                            提醒发货</div>
                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="am-tab-panel am-fade" id="tab4">
                            <div class="order-top">
                                <div class="th th-item">
                                    商品
                                </div>
                                <div class="th th-price">
                                    单价
                                </div>
                                <div class="th th-number">
                                    数量
                                </div>
                                <div class="th th-operation">
                                    商品操作
                                </div>
                                <div class="th th-amount">
                                    合计
                                </div>
                                <div class="th th-status">
                                    交易状态
                                </div>
                                <div class="th th-change">
                                    交易操作
                                </div>
                            </div>

                            <div class="order-main">
                                @foreach($order as $k=>$v)
                                @if($v->status=='2')
                                <div class="order-list">
                                    <div class="order-status3">
                                        <div class="order-title">
                                            <div class="dd-num">订单编号：<a href="javascript:;">{{$v->order}}</a></div>
                                            <span>成交时间：{{$v->created_at}}</span>
                                            <!--    <em>店铺：小桔灯</em>-->
                                        </div>
                                        <div class="order-content">
                                            <div class="order-left">
                                                @foreach($v->orderinfo as $kk=>$vv)
                                                <ul class="item-list">
                                                    <li class="td td-item">
                                                        <div class="item-pic">
                                                            <a href="#" class="J_MakePoint">
                                                                <img src="/uploads/{{$vv->pic->pic}}" class="itempic J_ItemImg">
                                                            </a>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-basic-info">
                                                                <a href="#">
                                                                    <p>{{$vv->goods->title}}</p>
                                                                    
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="td td-price">
                                                        <div class="item-price">
                                                            {{$vv->goods->price}}
                                                        </div>
                                                    </li>
                                                    <li class="td td-number">
                                                        <div class="item-number">
                                                            {{$vv->num}}
                                                        </div>
                                                    </li>
                                                    <li class="td td-operation">
                                                        <div class="item-operation">
                                                            <a href="/home/order/refund?oid={{$v->id}}&gid={{$vv->gid}}">退款/退货</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                                @endforeach  
                                            </div>
                                            <div class="order-right">
                                                <li class="td td-amount">
                                                    <div class="item-amount">
                                                        合计：{{$v->price}}
                                                        <p>含运费：<span>包邮</span></p>
                                                    </div>
                                                </li>
                                                <div class="move-right">
                                                    <li class="td td-status">
                                                        <div class="item-status">
                                                            <p class="Mystatus">卖家已发货</p>
                                                            <p class="order-info"><a href="/home/order/orderinfo?oid={{$v->id}}">订单详情</a></p>
                                                            
                                                        </div>
                                                    </li>
                                                    <li class="td td-change">
                                                        <a href="/home/order/takeorder?oid={{$v->id}}"><div class="am-btn am-btn-danger anniu">
                                                            确认收货</div></a>
                                                        
                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="am-tab-panel am-fade" id="tab5">
                            <div class="order-top">
                                <div class="th th-item">
                                    商品
                                </div>
                                <div class="th th-price">
                                    单价
                                </div>
                                <div class="th th-number">
                                    数量
                                </div>
                                <div class="th th-operation">
                                    商品操作
                                </div>
                                <div class="th th-amount">
                                    合计
                                </div>
                                <div class="th th-status">
                                    交易状态
                                </div>
                                <div class="th th-change">
                                    交易操作
                                </div>
                            </div>

                            <div class="order-main">
                                @foreach($order as $k=>$v)
                                @if($v->status == '3')
                                <div class="order-list">
                                    <!--不同状态的订单 -->
                                    <div class="order-status4">
                                            <div class="order-title">
                                                <div class="dd-num">订单编号：<a href="javascript:;">{{$v->order}}</a></div>
                                                <span>成交时间：{{$v->created_at}}</span>

                                            </div>
                                            <div class="order-content">
                                                <div class="order-left">
                                                    @foreach($v->orderinfo as $kk=>$vv)
                                                    <ul class="item-list">
                                                        <li class="td td-item">
                                                            <div class="item-pic">
                                                                <a href="#" class="J_MakePoint">
                                                                    <img src="/uploads/{{$vv->pic->pic}}" class="itempic J_ItemImg">
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-basic-info">
                                                                    <a href="#">
                                                                        <p>{{$vv->goods->title}}</p>
                                                                        
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="td td-price">
                                                            <div class="item-price">
                                                                {{$vv->goods->price}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-number">
                                                            <div class="item-number">
                                                                {{$vv->num}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-operation">
                                                            <div class="item-operation">
                                                                <a href="/home/order/refund?oid={{$v->id}}&gid={{$vv->gid}}">退款/退货</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    @endforeach

                                                </div>
                                                <div class="order-right">
                                                    <li class="td td-amount">
                                                        <div class="item-amount">
                                                            合计：{{$v->price}}
                                                            <p>含运费：<span>包邮</span></p>
                                                        </div>
                                                    </li>
                                                    <div class="move-right">
                                                        <li class="td td-status">
                                                            <div class="item-status">
                                                                <p class="Mystatus">交易成功</p>
                                                                <p class="order-info"><a href="/home/order/orderinfo?oid={{$v->id}}">订单详情</a></p>
                                                                
                                                            </div>
                                                        </li>
                                                        <li class="td td-change">
                                                            <a href="/home/comment?oid={{$v->id}}">
                                                                <div class="am-btn am-btn-danger anniu">
                                                                    评价商品</div>
                                                            </a>
                                                        </li>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                                @endif
                                @endforeach

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--底部-->
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
    function test(){
        alert('提醒发货成功，卖家会尽快为您发货');
    }
</script>
@endsection