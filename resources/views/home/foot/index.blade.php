@extends('home.layout.index')

@section('content')

<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

<link href="/h/css/personal.css" rel="stylesheet" type="text/css">
<link href="/h/css/footstyle.css" rel="stylesheet" type="text/css">

		
<div class="nav-table">
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
</div>
<b class="line"></b>
<div class="center">
    <div class="col-main">
        <div class="main-wrap">

            <div class="user-foot">
                <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的足迹</strong> / <small>Browser&nbsp;History</small></div>
                </div>
                <hr/>

                <!--足迹列表 -->
                @foreach ($goods as $k=>$v)
                <div class="goods">
                    <div class="goods-date" data-date="2015-12-21">
                        {{-- <span><i class="month-lite">12</i>.<i class="day-lite">21</i><i class="date-desc">今天</i></span> --}}
                        <span><i class="month-lite">{{ $v->updated_at }}</i></span>
                        {{-- <del class="am-icon-trash"></del> --}}
                        {{-- <s class="line"></s> --}}
                    </div>

                    <div class="goods-box first-box">
                        <div class="goods-pic">
                            <div class="goods-pic-box">
                                <a class="goods-pic-link" target="_blank" href="#" title="意大利费列罗进口食品巧克力零食24粒  进口巧克力食品">
                                    <img src="/uploads/{{ $v->pic->pic }}" class="goods-img"></a>
                            </div>
                            <a class="goods-delete" href="/home/foot/delete?id={{ $v->id }}"><i class="am-icon-trash"></i></a>
                            <div class="goods-status goods-status-show"><span class="desc">宝贝已下架</span></div>
                        </div>

                        <div class="goods-attr">
                            <div class="good-title">
                                <a class="title" href="#" target="_blank">{{ $v->title }}</a>
                            </div>
                            <div class="goods-price">
                                <span class="g_price">                                    
                                <span>¥</span><strong>{{ $v->price }}</strong>
                                </span>
                                <span class="g_price g_price-original">                                    
                                {{-- <span>¥</span><strong>142</strong> --}}
                                </span>
                            </div>
                            <div class="clear"></div>
                            <div class="goods-num">
                                <div class="match-recom">
                                    <a href="#" class="match-recom-item">找相似</a>
                                    <a href="#" class="match-recom-item">找搭配</a>
                                    <i><em></em><span></span></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- <div class="goods">
                    <div class="goods-date" data-date="2015-12-21">
                        <s class="line"></s>
                    </div>

                    <div class="goods-box">
                        <div class="goods-pic">
                            <div class="goods-pic-box">
                                <a class="goods-pic-link" target="_blank" href="#" title="意大利费列罗进口食品巧克力零食24粒  进口巧克力食品">
                                    <img src="/h/images/TB1_pic.jpg_200x200.jpg" class="goods-img"></a>
                            </div>
                            <a class="goods-delete" href="javascript:void(0);"><i class="am-icon-trash"></i></a>
                            <div class="goods-status goods-status-show"><span class="desc">宝贝已下架</span></div>
                        </div>

                        <div class="goods-attr">
                            <div class="good-title">
                                <a class="title" href="#" target="_blank">意大利费列罗进口食品巧克力零食24粒  进口巧克力食品</a>
                            </div>
                            <div class="goods-price">
                                <span class="g_price">                                    
                                <span>¥</span><strong>71</strong>
                                </span>
                                <span class="g_price g_price-original">                                    
                                <span>¥</span><strong>142</strong>
                                </span>
                            </div>
                            <div class="clear"></div>
                            <div class="goods-num">
                                <div class="match-recom">
                                    <a href="#" class="match-recom-item">找相似</a>
                                    <a href="#" class="match-recom-item">找搭配</a>
                                    <i><em></em><span></span></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="goods">
                    <div class="goods-date" data-date="2015-12-21">
                        <s class="line"></s>
                    </div>

                    <div class="goods-box">
                        <div class="goods-pic">
                            <div class="goods-pic-box">
                                <a class="goods-pic-link" target="_blank" href="#" title="意大利费列罗进口食品巧克力零食24粒  进口巧克力食品">
                                    <img src="/h/images/TB1_pic.jpg_200x200.jpg" class="goods-img"></a>
                            </div>
                            <a class="goods-delete" href="javascript:void(0);"><i class="am-icon-trash"></i></a>
                            <div class="goods-status goods-status-show"><span class="desc">宝贝已下架</span></div>
                        </div>

                        <div class="goods-attr">
                            <div class="good-title">
                                <a class="title" href="#" target="_blank">意大利费列罗进口食品巧克力零食24粒  进口巧克力食品</a>
                            </div>
                            <div class="goods-price">
                                <span class="g_price">                                    
                                <span>¥</span><strong>71</strong>
                                </span>
                                <span class="g_price g_price-original">                                    
                                <span>¥</span><strong>142</strong>
                                </span>
                            </div>
                            <div class="clear"></div>
                            <div class="goods-num">
                                <div class="match-recom">
                                    <a href="#" class="match-recom-item">找相似</a>
                                    <a href="#" class="match-recom-item">找搭配</a>
                                    <i><em></em><span></span></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="goods">
                    <div class="goods-date" data-date="2015-12-21">
                        <s class="line"></s>
                    </div>

                    <div class="goods-box">
                        <div class="goods-pic">
                            <div class="goods-pic-box">
                                <a class="goods-pic-link" target="_blank" href="#" title="意大利费列罗进口食品巧克力零食24粒  进口巧克力食品">
                                    <img src="/h/images/TB1_pic.jpg_200x200.jpg" class="goods-img"></a>
                            </div>
                            <a class="goods-delete" href="javascript:void(0);"><i class="am-icon-trash"></i></a>
                            <div class="goods-status goods-status-show"><span class="desc">宝贝已下架</span></div>
                        </div>

                        <div class="goods-attr">
                            <div class="good-title">
                                <a class="title" href="#" target="_blank">意大利费列罗进口食品巧克力零食24粒  进口巧克力食品</a>
                            </div>
                            <div class="goods-price">
                                <span class="g_price">                                    
                                <span>¥</span><strong>71</strong>
                                </span>
                                <span class="g_price g_price-original">                                    
                                <span>¥</span><strong>142</strong>
                                </span>
                            </div>
                            <div class="clear"></div>
                            <div class="goods-num">
                                <div class="match-recom">
                                    <a href="#" class="match-recom-item">找相似</a>
                                    <a href="#" class="match-recom-item">找搭配</a>
                                    <i><em></em><span></span></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="goods">
                    <div class="goods-date" data-date="2015-12-21">
                        <s class="line"></s>
                    </div>

                    <div class="goods-box">
                        <div class="goods-pic">
                            <div class="goods-pic-box">
                                <a class="goods-pic-link" target="_blank" href="#" title="意大利费列罗进口食品巧克力零食24粒  进口巧克力食品">
                                    <img src="/h/images/TB1_pic.jpg_200x200.jpg" class="goods-img"></a>
                            </div>
                            <a class="goods-delete" href="javascript:void(0);"><i class="am-icon-trash"></i></a>
                            <div class="goods-status goods-status-show"><span class="desc">宝贝已下架</span></div>
                        </div>

                        <div class="goods-attr">
                            <div class="good-title">
                                <a class="title" href="#" target="_blank">意大利费列罗进口食品巧克力零食24粒  进口巧克力食品</a>
                            </div>
                            <div class="goods-price">
                                <span class="g_price">                                    
                                <span>¥</span><strong>71</strong>
                                </span>
                                <span class="g_price g_price-original">                                    
                                <span>¥</span><strong>142</strong>
                                </span>
                            </div>
                            <div class="clear"></div>
                            <div class="goods-num">
                                <div class="match-recom">
                                    <a href="#" class="match-recom-item">找相似</a>
                                    <a href="#" class="match-recom-item">找搭配</a>
                                    <i><em></em><span></span></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>						
                <div class="clear"></div>
                <div class="goods">
                    <div class="goods-date" data-date="2015-12-17">
                        <span><i class="month-lite"></i><i class="day-lite"></i>	<i class="date-desc">一周内</i></span>
                        <del class="am-icon-trash"></del>
                        <s class="line"></s>
                    </div>
                    <div class="goods-box">
                        <div class="goods-pic">
                            <div class="goods-pic-box">
                                <a class="goods-pic-link" target="_blank" href="#" title="意大利费列罗进口食品巧克力零食24粒  进口巧克力食品">
                                    <img src="/h/images/TB1_pic.jpg_200x200.jpg" class="goods-img"></a>
                            </div>
                            <a class="goods-delete" href="javascript:void(0);"><i class="am-icon-trash"></i></a>
                            <div class="goods-status goods-status-show"><span class="desc">宝贝已下架</span></div>
                        </div>

                        <div class="goods-attr">
                            <div class="good-title">
                                <a class="title" href="#" target="_blank">意大利费列罗进口食品巧克力零食24粒  进口巧克力食品</a>
                            </div>
                            <div class="goods-price">
                                <span class="g_price">                                    
                                <span>¥</span><strong>71</strong>
                                </span>
                                <span class="g_price g_price-original">                                    
                                <span>¥</span><strong>142</strong>
                                </span>
                            </div>
                            <div class="clear"></div>
                            <div class="goods-num">
                                <div class="match-recom">
                                    <a href="#" class="match-recom-item">找相似</a>
                                    <a href="#" class="match-recom-item">找搭配</a>
                                    <i><em></em><span></span></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  --}}
                
                
            </div>
        </div>

        
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
                    <li class="active"> <a href="foot.html">足迹</a></li>
                    <li> <a href="comment.html">评价</a></li>
                    <li> <a href="news.html">消息</a></li>
                </ul>
            </li>

        </ul>

    </aside>
</div>


@include('home.layout.footer')
@endsection

