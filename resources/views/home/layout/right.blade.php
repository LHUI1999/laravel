<head>
    <script type='text/javascript' src='https://webchat.7moor.com/javascripts/7moorInit.js?accessId=231515b0-b999-11e9-ba32-bfd32cf2bdfe&autoShow=false&language=ZHCN' async='async'>
    </script>
</head>
<div class="tip">
            <div id="sidebar">
                <div id="wrap">
                    <div id="prof" class="item ">
                        <a href="# ">
                            @if(isset($_SESSION['user']))
                            <img class="setting " style="width:25px;height:25px;border-radius: 50%" src="/uploads/{{$_SESSION['user']->profile}}">
                            @else
                            <span class="setting "></span>
                            @endif
                        </a>
                        <div class="ibar_login_box status_login " style="display: none;">
                            @if(isset($_SESSION['user']))

                            <div class="avatar_box ">
                                <p class="avatar_imgbox "><img style="width:80px;height:80px;border-radius: 50%" src="/uploads/{{$_SESSION['user']->profile}}"></p>
                                <ul class="user_info ">
                                    <li>用户名：{{$_SESSION['user']->uname}}</li>
                                    <li>级&nbsp;别：普通会员</li>
                                </ul>
                            </div>
                            @else
                            <div class="avatar_box ">
                                <p class="avatar_imgbox "><img src="/h/images/no-img_mid_.jpg "></p>
                                <ul class="user_info ">
                                    <li>用户名：sl1903</li>
                                    <li>级&nbsp;别：普通会员</li>
                                </ul>
                            </div>
                            @endif

                            <div class="login_btnbox ">
                                <a href="/home/order " class="login_order ">我的订单</a>
                                <a href="/home/collection " class="login_favorite ">我的收藏</a>
                            </div>
                            <i class="icon_arrow_white "></i>
                        </div>

                    </div>
                    <div id="shopCart " class="item ">
                        <a href="/home/car/index ">
                            <span class="message "></span>
                        </a>

                        <p>
                            购物车
                        </p>

                        <p class="cart_num ">{{$carcount}}</p>
                    </div>
                    <div id="asset " class="item ">
                        <a href="/home/bill ">
                            <span class="view "></span>
                        </a>
                        <div class="mp_tooltip " style="left: -121px; visibility: hidden;">
                            我的账单
                            <i class="icon_arrow_right_black "></i>
                        </div>
                    </div>


                    <div id="brand " class="item ">
                        <a href="/home/collection">
                            <span class="wdsc "><img src="/h/images/wdsc.png "></span>
                        </a>
                        <div class="mp_tooltip " style="left: -121px; visibility: hidden;">
                            我的收藏
                            <i class="icon_arrow_right_black "></i>
                        </div>
                    </div>

                    

                    <div class="quick_toggle ">
                        <li class="qtitem">
                            <a href="#"><span class="kfzx "></span></a>
                            <div class="mp_tooltip " style="left: -121px; visibility: hidden;" onclick="qimoChatClick();">客服中心<i class="icon_arrow_right_black "></i></div>
                        </li>
                        <!--二维码 -->
                       
                        
                    </div>

                    <!--回到顶部 -->
                    <div id="quick_links_pop " class="quick_links_pop hide "></div>

                </div>

            </div>
            <div id="prof-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    我
                </div>
            </div>
            <div id="shopCart-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    购物车
                </div>
            </div>
            <div id="asset-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    资产
                </div>

                <div class="ia-head-list ">
                    <a href="# " target="_blank " class="pl ">
                        <div class="num ">0</div>
                        <div class="text ">优惠券</div>
                    </a>
                    <a href="# " target="_blank " class="pl ">
                        <div class="num ">0</div>
                        <div class="text ">红包</div>
                    </a>
                    <a href="# " target="_blank " class="pl money ">
                        <div class="num ">￥0</div>
                        <div class="text ">余额</div>
                    </a>
                </div>

            </div>
            <div id="foot-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    足迹
                </div>
            </div>
            <div id="brand-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    收藏
                </div>
            </div>
            <div id="broadcast-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    充值
                </div>
            </div>
        </div>