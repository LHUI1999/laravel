@extends('home.layout.index')

@section('content')
<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
        <link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

        <link href="/h/css/personal.css" rel="stylesheet" type="text/css">
        <link href="/h/css/addstyle.css" rel="stylesheet" type="text/css">
        <script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="/h/AmazeUI-2.4.2/assets/js/amazeui.js"></script>


<div class="nav-table">
    <div class="long-title"><span class="all-goods">全部分类</span></div>
    
</div>
<b class="line"></b>


<div class="center">
    <div class="col-main">
        <div class="main-wrap">

            <div class="user-address">
                <a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
                <!--例子-->
                <div class="am-modal am-modal-no-btn" id="doc-modal-1">

                    <div class="add-dress">

                        <!--标题 -->
                        <div class="am-cf am-padding">
                            <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改地址</strong> / <small>Edit&nbsp;address</small></div>
                        </div>
                        <hr/>

                        <div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
                            <script src="/region_select.js"></script>
                            <form action="/home/address/update/{{ $data->id }}" method='get' class="am-form am-form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                
                                <div class="am-form-group">
                                    <label for="user-name" class="am-form-label">收货人</label>
                                    <div class="am-form-content">
                                        <input type="text" name="uname" value="{{ $data->uname }}" id="user-name" placeholder="收货人">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-phone" class="am-form-label">手机号码</label>
                                    <div class="am-form-content">
                                        <input id="user-phone" name="phone" value="{{ $data->phone }}" placeholder="手机号必填" type="text">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-address" class="am-form-label">所在地</label>
                                    <div class="am-form-content address">
                                        <select name="province" id="province"></select>
                                        <select name="country" id="country"></select>
                                        <select name="town" id="town"></select>
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

                                        <button style="margin-top: 40px" type="submit" class="am-btn am-btn-danger">保存</button>
                                        
                                        <a href="/home/address" class="am-close am-btn am-btn-danger" style="margin-top: 40px" data-am-modal-close>取消</a> 
                                    </div>
                                </div>
                            </form>
                            <a href="/home/address">
                                <!-- <button type="reset" class="am-btn am-btn-danger" style="margin-left:272px;margin-top:-50px;">取消</button> -->
                            </a>

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