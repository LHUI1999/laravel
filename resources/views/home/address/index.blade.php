@extends('home.layout.index')

@section('content')

        <link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

        <link href="/h/css/personal.css" rel="stylesheet" type="text/css">
        <link href="/h/css/addstyle.css" rel="stylesheet" type="text/css">
        <script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="/h/AmazeUI-2.4.2/assets/js/amazeui.js"></script>



<div class="center">
    <div class="col-main">
        <div class="main-wrap">

            <div class="user-address">
                <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
                </div>
                <hr/>
                <ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
                    @foreach ($address as $k=>$v)   
                    <li class="user-addresslist">
                        <span class="new-option-r"><i class="am-icon-check-circle"></i>设为默认</span>
                        <p class="new-tit new-p-re">
                            <span class="new-txt">{{ $v->uname }}</span>
                            <span class="new-txt-rd2">{{ $v->phone }}</span>
                        </p>
                        <div class="new-mu_l2a new-p-re">
                            <p class="new-mu_l2cw">
                                <span class="title">地址：{{ $v->addr }}</span>
                            </p>
                        </div>
                        <div class="new-addr-btn">
                            <a href="/home/address/{{ $v->id }}/edit"><i class="am-icon-edit"></i>编辑</a>
                            <span class="new-addr-bar">|</span>                      
                            <a href="/home/address/destroy/{{ $v->id }}"><i class="am-icon-trash"></i>删除</a>
                        </div>
                    </li>
                    @endforeach
                    
                </ul>
                <div class="clear"></div>
                <a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
                <!--例子-->
                <div class="am-modal am-modal-no-btn" id="doc-modal-1">

                    <div class="add-dress">
                        <!--标题 -->
                        <div class="am-cf am-padding">
                            <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
                        </div>
                        <hr/>

                        <div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
                            <script src="/region_select.js"></script>
                            <form action="/home/address/add" method="post" class="am-form am-form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="am-form-group">
                                    <label for="user-name" class="am-form-label">收货人</label>
                                    <div class="am-form-content">
                                        <input type="text" name="uname" id="user-name" placeholder="收货人">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-phone" class="am-form-label">手机号码</label>
                                    <div class="am-form-content">
                                        <input id="user-phone" name="phone" placeholder="手机号必填" type="text">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-address" class="am-form-label">所在地</label>
                                    <div class="am-form-content address">

                                        <select name="province" id="province" >
                                             <!-- <option value="a">浙江省</option> -->
                                            <!-- <option value="b" selected>湖北省</option>  -->
                                        </select>
                                        <select name="country" id="country" >
                                             <!-- <option value="a">温州市</option> -->
                                            <!-- <option value="b" selected>武汉市</option>  -->
                                        </select>
                                        <select name="town" id="town" >
                                             <!-- <option value="a">瑞安区</option> -->
                                            <!-- <option value="b" selected>洪山区</option>  -->

                                        </select>
                                    </div>
                                    
                                </div>

                                <div class="am-form-group">
                                    <label for="user-intro" class="am-form-label">详细地址</label>
                                    <div class="am-form-content">
                                        <textarea class="" name="addr" rows="3" id="user-intro" placeholder="输入详细地址"></textarea>
                                        <small>100字以内写出你的详细地址...</small>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    //地址的默认值设置
                                    new PCAS('province', 'country', 'town', '北京', '', '昌平区');
                                </script>


                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button style="margin-top:30px" type="submit" class="am-btn am-btn-danger">保存</button>
                                        <button style="margin-top:30px" type="reset" class="am-btn am-btn-danger">取消</button>
                                        <!-- {{-- <a href="" class="am-close am-btn am-btn-danger" data-am-modal-close>取消</a> --}} -->
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

            </div>

            <script type="text/javascript">
                $(document).ready(function() {							
                    $(".new-option-r").click(function() {
                        $(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
                    });
                    
                    var $ww = $(window).width();
                    if($ww>640) {
                        $("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
                    }
                    
                })
            </script>

            <div class="clear"></div>

        </div>
        
    </div>

    <aside class="menu">
        <ul>
            <li class="person">
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
                    <li> <a href="coupon.html">优惠券 </a></li>
                    <li> <a href="bonus.html">红包</a></li>
                    <li> <a href="bill.html">账单明细</a></li>
                </ul>
            </li>

            <li class="person">
                <a href="#">我的小窝</a>
                <ul>
                    <li> <a href="/home/collection">收藏</a></li>
                    <li> <a href="foot.html">足迹</a></li>
                    <li> <a href="comment.html">评价</a></li>
                    <li> <a href="news.html">消息</a></li>
                </ul>
            </li>

        </ul>

    </aside>
</div>
        @include('home.layout.footer')

@endsection