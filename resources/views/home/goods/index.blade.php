@extends('home.layout.index')
@section('content')

<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
        <link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
        <link href="/h/basic/css/demo.css" rel="stylesheet" type="text/css" />
        <link type="text/css" href="/h/css/optstyle.css" rel="stylesheet" />
        <link type="text/css" href="/h/css/style.css" rel="stylesheet" />

        <script type="text/javascript" src="/h/basic/js/jquery-1.7.min.js"></script>
        <script type="text/javascript" src="/h/basic/js/quick_links.js"></script>

        <script type="text/javascript" src="/h/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
        <script type="text/javascript" src="/h/js/jquery.imagezoom.min.js"></script>
        <script type="text/javascript" src="/h/js/jquery.flexslider.js"></script>
        <script type="text/javascript" src="/h/js/list.js"></script>
<div class="clear"></div>
<b class="line"></b>
<div class="listMain">

                <!--分类-->
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
                <ol class="am-breadcrumb am-breadcrumb-slash">
                    <li><a href="#">首页</a></li>
                    <li><a href="#">分类</a></li>
                    <li class="am-active">内容</li>
                </ol>
                <script type="text/javascript">
                    $(function() {});
                    $(window).load(function() {
                        $('.flexslider').flexslider({
                            animation: "slide",
                            start: function(slider) {
                                $('body').removeClass('loading');
                            }
                        });
                    });
                </script>
                <div class="scoll">
                    <section class="slider">
                        <div class="flexslider" style="">
                            
                        <div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 1000%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);"><li class="clone" aria-hidden="true" style="width: 0px; float: left; display: block;">
                                    <img src="/h/images/03.jpg" draggable="false">
                                </li>
                                <li style="width: 0px; float: left; display: block;" class="flex-active-slide">
                                    <img src="/h/images/01.jpg" title="pic" draggable="false">
                                </li>
                                <li style="width: 0px; float: left; display: block;">
                                    <img src="/h/images/02.jpg" draggable="false">
                                </li>
                                <li style="width: 0px; float: left; display: block;">
                                    <img src="/h/images/03.jpg" draggable="false">
                                </li>
                            <li style="width: 0px; float: left; display: block;" class="clone" aria-hidden="true">
                                    <img src="/h/images/01.jpg" title="pic" draggable="false">
                                </li></ul></div><ol class="flex-control-nav flex-control-paging"><li><a class="flex-active">1</a></li><li><a>2</a></li><li><a>3</a></li></ol><ul class="flex-direction-nav"><li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a></li><li class="flex-nav-next"><a class="flex-next" href="#">Next</a></li></ul></div>
                    </section>
                </div>

                <!--放大镜-->

                <div class="item-inform">
                    <div class="clearfixLeft" id="clearcontent">

                        <div class="box">
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $(".jqzoom").imagezoom();
                                    $("#thumblist li a").click(function() {
                                        $(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
                                        $(".jqzoom").attr('src', $(this).find("img").attr("mid"));
                                        $(".jqzoom").attr('rel', $(this).find("img").attr("big"));
                                    });
                                });
                            </script>

                            <div class="tb-booth tb-pic tb-s310">
                                <a href="{{$goods->pic[0]->pic}}"><img src="/uploads/{{$goods->pic[0]->pic}}" alt="" rel="/uploads/{{$goods->pic[0]->pic}}" class="jqzoom" style="cursor: crosshair;"></a>
                            </div>
                            <ul class="tb-thumb" id="thumblist">
                                @foreach($goods->pic as $k=>$v)
                                <li class="tb-selected">
                                    <div class="tb-pic tb-s40">
                                        <a href="#"><img src="/uploads/{{$v->pic}}" mid="/uploads/{{$v->pic}}" big="/uploads/{{$v->pic}}"></a>
                                    </div>
                                </li>
                               {{-- <!--  <li>
                                    <div class="tb-pic tb-s40">
                                        <a href="#"><img src="/h/images/02_small.jpg" mid="/h/images/02_mid.jpg" big="/h/images/02.jpg"></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="tb-pic tb-s40">
                                        <a href="#"><img src="/h/images/03_small.jpg" mid="/h/images/03_mid.jpg" big="/h/images/03.jpg"></a>
                                    </div>
                                </li> --> --}}
                                @endforeach
                            </ul>
                        </div>
                        
                        
                        <div class="clear"></div>
                    </div>
                    
                    <div class="clearfixRight">

                        <!--规格属性-->
                        <!--名称-->
                        <div class="tb-detail-hd">
                            <h1>{{$goods[0]->title}}</h1>
                        </div>
                        <div class="tb-detail-list">
                            <!--价格-->
                            <div style="height:100px" class="tb-detail-price">
                                <li style="margin-top:13px" class="price iteminfo_price">
                                    <dt>悦桔价</dt>
                                    <dd><em>¥</em><b class="sys_item_price">{{$goods[0]->price}}</b>  </dd>                                 
                                </li>
                                
                                <div style="margin-left:610px;margin-top:17px;">
                                    @if ($coll == 1)
                                    <a href="/home/collection/delete?id={{$goods[0]->id}}">
                                        <span @if($coll==1) style="color:red" @endif  id="kongxin"> ☆</span>   
                                        <p style="font-size:15px;color:#888;margin-left:15px;margin-top:-21px;">收藏商品</p>  
                                    </a>
                                    @else
                                    <a href="/home/collection/add?id={{ $goods[0]->id }}">
                                        <span @if($coll==1) style="color:blue" @endif  id="kongxin"> ☆</span>   
                                        <p style="font-size:15px;color:#888;margin-left:15px;margin-top:-21px;">收藏商品</p>                            
                                    </a>
                                    @endif
                                    
                                </div>

                                <div class="clear"></div>
                            </div>

                            <!--地址-->
                            <dl class="iteminfo_parameter freight">
                                <dt>配送费</dt>
                                <div class="iteminfo_freprice">
                                    
                                    <div style="position:absolute;left:80px" class="pay-logis">
                                        <b  style="position:absolute;left:0px" class="sys_item_freprice">免运费</b><br>
                                        <span style="color:#929293">24:00之前下单，预计<?php echo date('Y-m-d',time()+3*3600*24)?>送达</span>
                                    </div>

                                </div>
                            </dl>
                            <div class="clear"></div>

                            <!--销量-->
                            <ul class="tm-ind-panel" style="margin-top: 25px">
                                <li class="tm-ind-item tm-ind-sellCount canClick">
                                    <div class="tm-indcon"><span class="tm-label">月销量</span><span class="tm-count">1015</span></div>
                                </li>
                                <li class="tm-ind-item tm-ind-sumCount canClick">
                                    <div class="tm-indcon"><span class="tm-label">累计销量</span><span class="tm-count">6015</span></div>
                                </li>
                                <li class="tm-ind-item tm-ind-reviewCount canClick tm-line3">
                                    <div class="tm-indcon"><span class="tm-label">累计评价</span><span class="tm-count">640</span></div>
                                </li>
                            </ul>
                            <div class="clear"></div>

                            <!--各种规格-->
                            <dl class="iteminfo_parameter sys_item_specpara">
                                <dt class="theme-login"><div class="cart-title">可选规格<span class="am-icon-angle-right"></span></div></dt>
                                <dd>
                                    <!--操作页面-->

                                    <div class="theme-popover-mask"></div>

                                    <div class="theme-popover">
                                        <div class="theme-span"></div>
                                        <div class="theme-poptit">
                                            <a href="javascript:;" title="关闭" class="close">×</a>
                                        </div>
                                        <div class="theme-popbod dform">
                                            <form class="theme-signin" name="loginform" action="" method="post">

                                                <div class="theme-signin-left">
                                                    <div class="theme-options">
                                                        <div class="cart-title">温馨提示：支持七天无理由退货（拆封后不支持）</div>
                                                        <div style="width:20px;height:40px"></div>
                                                    </div>
                                                    <div class="theme-options">
                                                        <div class="cart-title">库存：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$goods[0]->num}}件</div>
                                                        <div style="width:20px;height:40px"></div>
                                                    </div>

                                                    
                                                    <div class="clear"></div>

                                                    <div class="btn-op">
                                                        <div class="btn am-btn am-btn-warning">确认</div>
                                                        <div class="btn close am-btn am-btn-warning">取消</div>
                                                    </div>
                                                </div>
                                                <div class="theme-signin-right">
                                                    <div class="img-info">
                                                        <img src="/h/images/songzi.jpg">
                                                    </div>
                                                    <div class="text-info">
                                                        <span class="J_Price price-now">¥39.00</span>
                                                        <span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>

                                </dd>
                            </dl>
                            <div class="clear"></div>
                            <!--活动  -->
                            <div class="shopPromotion gold">
                                <div class="hot">
                                    <dt class="tb-metatit">店铺优惠</dt>
                                    <div class="gold-list">
                                        <p>购物满2件打8折，满3件7折<span></span></p>
                                    </div>
                                </div>
                                <div class="clear"></div>
                               
                            </div>
                        </div>

                        <div class="pay">
                            <div class="pay-opt">
                            <a href="home.html"><span class="am-icon-home am-icon-fw">首页</span></a>
                            <a><span class="am-icon-heart am-icon-fw">收藏</span></a>
                            
                            </div>
                            <!-- <li>
                                <div class="clearfix tb-btn tb-btn-buy theme-login">
                                    <a id="LikBuy" title="点此按钮到下一步确认购买信息" href="/home/order/index?id={{$goods[0]->id}}">立即购买</a>
                                </div>
                            </li> -->
                            <li>
                                <div class="clearfix tb-btn tb-btn-basket theme-login">
                                    <a id="LikBasket" title="加入购物车" href="/home/car/add?id={{$goods[0]->id}}"><i></i>加入购物车</a>
                                </div>
                            </li>
                            
                            
                        </div>


                    </div>

                    <div class="clear"></div>

                </div>

                <!--优惠套装-->
             
                <div class="clear"></div>
                
                            
                <!-- introduce-->

                <div class="introduce" style="margin-top:100px">
                    <div class="browse">
                        <div class="mc"> 
                             <ul>                       
                                <div class="mt">            
                                    <h2>看了又看</h2>        
                                </div>
                                @foreach($look as $k => $v)
                                  <li>
                                    <div class="p-img">                    
                                        <a href="/home/goods?id={{$v->id}}"> <img class="" src="/uploads/{{$v->goodspic->pic}}"> </a>               
                                    </div>
                                    <div class="p-name"><a href="#">
                                        {{$v->title}}
                                    </a>
                                    </div>
                                    <div class="p-price"><strong>￥{{$v->price}}</strong></div>
                                  </li> 
                                  @endforeach                              
                          
                             </ul>                  
                        </div>
                    </div>
                    <div class="introduceMain">
                        <div class="am-tabs" data-am-tabs="">
                            <ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs" otop="996.6458587646484">
                                <li class="am-active">
                                    <a href="#">

                                        <span class="index-needs-dt-txt">宝贝详情</span></a>

                                </li>

                                <li>
                                    <a href="#">

                                        <span class="index-needs-dt-txt">全部评价</span></a>

                                </li>

                                <li>
                                    <a href="#">

                                        <span class="index-needs-dt-txt">猜你喜欢</span></a>
                                </li>
                            </ul>

                            <div class="am-tabs-bd" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

                                <div class="am-tab-panel am-fade am-in am-active">
                                    <div class="details">
                                        <div class="twlistNews">
  
                                            @foreach($goods->infopic as $k=>$v)
                                            <img src="/uploads/{{$v->infopic}}">
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="clear"></div>

                                </div>

                                <div class="am-tab-panel am-fade">
                                    
                                    <!-- <div class="actor-new">
                                        <div class="rate">                
                                            <strong>100<span>%</span></strong><br> <span>好评度</span>            
                                        </div>
                                        <dl>                    
                                            <dt>买家印象</dt>                    
                                            <dd class="p-bfc">
                                                        <q class="comm-tags"><span>味道不错</span><em>(2177)</em></q>
                                                        <q class="comm-tags"><span>颗粒饱满</span><em>(1860)</em></q>
                                                        <q class="comm-tags"><span>口感好</span><em>(1823)</em></q>
                                                        <q class="comm-tags"><span>商品不错</span><em>(1689)</em></q>
                                                        <q class="comm-tags"><span>香脆可口</span><em>(1488)</em></q>
                                                        <q class="comm-tags"><span>个个开口</span><em>(1392)</em></q>
                                                        <q class="comm-tags"><span>价格便宜</span><em>(1119)</em></q>
                                                        <q class="comm-tags"><span>特价买的</span><em>(865)</em></q>
                                                        <q class="comm-tags"><span>皮很薄</span><em>(831)</em></q> 
                                            </dd>                                           
                                         </dl> 
                                    </div>  --> 
                                    <div class="clear"></div>
                                    <div class="tb-r-filter-bar">
                                        <ul class=" tb-taglist am-avg-sm-4">
                                            <li class="tb-taglist-li tb-taglist-li-current">
                                                <div class="comment-info">
                                                    <span>全部评价</span>
                                                    <span class="tb-tbcr-num">({{$commentcount}})</span>
                                                </div>
                                            </li>

                                            <li class="tb-taglist-li tb-taglist-li-1">
                                                <div class="comment-info">
                                                    <span>好评</span>
                                                    <span class="tb-tbcr-num">({{$level3}})</span>
                                                </div>
                                            </li>

                                            <li class="tb-taglist-li tb-taglist-li-0">
                                                <div class="comment-info">
                                                    <span>中评</span>
                                                    <span class="tb-tbcr-num">({{$level2}})</span>
                                                </div>
                                            </li>

                                            <li class="tb-taglist-li tb-taglist-li--1">
                                                <div class="comment-info">
                                                    <span>差评</span>
                                                    <span class="tb-tbcr-num">({{$level1}})</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clear"></div>

                                    <ul class="am-comments-list am-comments-list-flip">
                                        @foreach($comment as $k=>$v)
                                        <li class="am-comment">
                                            <!-- 评论容器 -->
                                            <a href="">
                                                <img class="am-comment-avatar" src="/uploads/{{$v->upic->profile}}">
                                                <!-- 评论者头像 -->
                                            </a>

                                            <div class="am-comment-main">
                                                <!-- 评论内容容器 -->
                                                <header class="am-comment-hd">
                                                    <!--<h3 class="am-comment-title">评论标题</h3>-->
                                                    <div class="am-comment-meta">
                                                        <!-- 评论元数据 -->
                                                        <a href="#link-to-user" class="am-comment-author">{{$v->user->uname}}</a>
                                                        <!-- 评论者 -->
                                                        评论于
                                                        <time datetime="">{{$v->created_at}}</time>

                                                    </div>
                                                </header>

                                                <div class="am-comment-bd">
                                                    <div class="tb-rev-item " data-id="255776406962">
                                                        <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                            <!-- {{$v->text}} -->
                                                            @if($v->text=='')
                                                            此用户没有填写评价
                                                            @else
                                                            {{$v->text}}
                                                            @endif
                                                        </div>
                                                        <div>
                                                            @foreach($v->cmpic as $kk=>$vv)
                                                                <img style="width:50px" src="/uploads/{{$vv->cmpic}}">
                                                            @endforeach
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                                <!-- 评论内容 -->
                                            </div>
                                        </li>
                                        @endforeach
                                        <!--  -->
                                    </ul>

                                    <div class="clear"></div>

                                    <!--分页 -->
                                   <!--  <ul class="am-pagination am-pagination-right">
                                        <li class="am-disabled"><a href="#">«</a></li>
                                        <li class="am-active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">»</a></li>
                                    </ul> -->
                                    <div id="page_page">
                                    {{$comment->appends(['id'=>$id])->links()}}
                                        
                                    </div>
                                    <div class="clear"></div>

                                    <div class="tb-reviewsft">
                                        <div class="tb-rate-alert type-attention">购买前请查看该商品的 <a href="#" target="_blank">购物保障</a>，明确您的售后保障权益。</div>
                                    </div>

                                </div>

                                <div class="am-tab-panel am-fade">
                                    <div class="like">
                                        <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/h/images/imgsearch1.jpg">
                                                    <p>【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>东北红松子奶油味</span></p>
                                                    <p class="price fl">
                                                        <b>¥</b>
                                                        <strong>298.00</strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/h/images/imgsearch1.jpg">
                                                    <p>【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>东北红松子奶油味</span></p>
                                                    <p class="price fl">
                                                        <b>¥</b>
                                                        <strong>298.00</strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/h/images/imgsearch1.jpg">
                                                    <p>【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>东北红松子奶油味</span></p>
                                                    <p class="price fl">
                                                        <b>¥</b>
                                                        <strong>298.00</strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/h/images/imgsearch1.jpg">
                                                    <p>【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>东北红松子奶油味</span></p>
                                                    <p class="price fl">
                                                        <b>¥</b>
                                                        <strong>298.00</strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/h/images/imgsearch1.jpg">
                                                    <p>【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>东北红松子奶油味</span></p>
                                                    <p class="price fl">
                                                        <b>¥</b>
                                                        <strong>298.00</strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/h/images/imgsearch1.jpg">
                                                    <p>【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>东北红松子奶油味</span></p>
                                                    <p class="price fl">
                                                        <b>¥</b>
                                                        <strong>298.00</strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/h/images/imgsearch1.jpg">
                                                    <p>【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>东北红松子奶油味</span></p>
                                                    <p class="price fl">
                                                        <b>¥</b>
                                                        <strong>298.00</strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/h/images/imgsearch1.jpg">
                                                    <p>【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>东北红松子奶油味</span></p>
                                                    <p class="price fl">
                                                        <b>¥</b>
                                                        <strong>298.00</strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/h/images/imgsearch1.jpg">
                                                    <p>【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>东北红松子奶油味</span></p>
                                                    <p class="price fl">
                                                        <b>¥</b>
                                                        <strong>298.00</strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/h/images/imgsearch1.jpg">
                                                    <p>【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>东北红松子奶油味</span></p>
                                                    <p class="price fl">
                                                        <b>¥</b>
                                                        <strong>298.00</strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/h/images/imgsearch1.jpg">
                                                    <p>【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>东北红松子奶油味</span></p>
                                                    <p class="price fl">
                                                        <b>¥</b>
                                                        <strong>298.00</strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/h/images/imgsearch1.jpg">
                                                    <p>【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>东北红松子奶油味</span></p>
                                                    <p class="price fl">
                                                        <b>¥</b>
                                                        <strong>298.00</strong>
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clear"></div>

                                    <!--分页 -->
                                    <ul class="am-pagination am-pagination-right">
                                        <li class="am-disabled"><a href="#">«</a></li>
                                        <li class="am-active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">»</a></li>
                                    </ul>
                                    <div class="clear"></div>

                                </div>

                            </div>

                        </div>

                        <div class="clear"></div>

                        
                    </div>

                </div>
            </div>
@include('home.layout.right')
<div style="display:none;" class="jqPreload0"><img src="/h/images/01.jpg"></div>
<div class="zoomMask" style="width: 225px; height: 200px; visibility: visible; top: 439.646px; left: 277.667px;">&nbsp;</div>



@endsection