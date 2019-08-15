@extends('home.layout.index')
@section('content')
<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/h/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/h/css/optstyle.css" rel="stylesheet" type="text/css" />
		<link href="/h/css/jsstyle.css" rel="stylesheet" type="text/css" />
		<link href="/h/css/cartstyle.css" rel="stylesheet" type="text/css" />
<div id="cartTable">
					@if(!$data)	
					<img src="https://img02.hua.com/pc/images/gwc_k2.jpg">
					@else
					<div class="cart-table-th">
						<div class="wp">
							<div class="th th-chk">
								<div id="J_SelectAll1" class="select-all J_SelectAll"></div>
							</div>
							<div style="line-height: 50px;width:50px" class="th th-item">
								<div class="td-inner">全选</div>
							</div>
							<div style="line-height: 50px" class="th th-item">
								<div class="td-inner">商品信息</div>
							</div>
							<div style="line-height: 50px" class="th th-price">
								<div class="td-inner">单价</div>
							</div>
							<div style="line-height: 50px" class="th th-amount">
								<div class="td-inner">数量</div>
							</div>
							
							<div style="line-height: 50px" class="th th-op">
								<div class="td-inner">操作</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
						<div class="bundle  bundle-last ">
							<div class="clear"></div>
							<div class="bundle-main">
								
							@foreach($data as $k => $v)
								<ul class="item-content clearfix">
									<!-- <li>11</li> -->
									<li class="td td-item" style="width:50px">
										<a href="/home/car/select?id={{$v->id}}&select={{$v->select}}">
											<input <?php
											if($v->select == '1'){
												echo "checked";
											}

											?> type="checkbox" name="select" value='{{$v->id}}'>
											
										</a>
									</li>
									<li class="td td-item" >

										<div class="item-pic">


											<a href="/home/goods?id={{$v->id}}" target="_blank" data-title="{{$v->title}}" class="J_MakePoint" data-point="tbcart.8.12">
												<img style="width:80px" src="/uploads/{{$v->pic->pic}}" class="itempic J_ItemImg"></a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="/home/goods?id={{$v->id}}" target="_blank" title="{{$v->title}}" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$v->title}}</a>

											</div>
										</div>
									</li>
									<li class="td td-info">
										<div class="item-props item-props-can">
											
											<i class="theme-login am-icon-sort-desc"></i>


										</div>
									</li>
									<li class="td td-price">
										<div class="item-price price-promo-promo">
											<div class="price-content">
												<div class="price-line">
													<em name='price' class="J_Price price-now" tabindex="0">{{$v->price}}</em>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													<a href="/home/car/descnum?id={{$v->id}}"><input class="min am-btn" name="" type="button" value="-"></a>
													<input class="text_box" name="num" type="text" value="{{$v->num}}" style="width:30px;">
													<a href="/home/car/addnum?id={{$v->id}}"><input class="add am-btn" name="" type="button" value="+"></a>
												</div>
											</div>
										</div>
									</li>
									
									<li class="td td-op">
										<div class="td-inner">

											<a title="移入收藏夹" class="btn-fav" href="/home/collection/add?id={{ $v->id }}">
                  移入收藏夹</a>

											<a href="/home/car/delete?id={{$v->id}}" data-point-url="#" class="delete">
												  删除
											</a>
										</div>
									</li>
								</ul>
							@endforeach	
							</div>
						</div>
					
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<div class="float-bar-wrapper">
					<div id="J_SelectAll2" class="select-all J_SelectAll">
						<div class="cart-checkbox">

							<a href="/home/car/selectall?select={{$_SESSION['selectall']}}">
							<input @if($_SESSION['selectall']=='1') checked @endif onClick="quanxuan();" class="check-all check" id="selectAll" name="select-all" value="true" type="checkbox">
							<label for="J_SelectAllCbx2">全选</label>
							</a>

						</div>
					
						
						<script type="text/javascript">
							var btns=document.getElementsByTagName('button');
							var btnq=btns[0];
							var btnx=btns[1];
							var inputs=document.getElementsByTagName('input');
							btnq.onclick=function(){
								for(var i=0;i<inputs.length;i++){
									inputs[i].checked=true;
								}
							}
							//全部取消
							btnx.onclick=function(){
								//遍历选项
								for (var i = 0; i < inputs.length; i++) {
									inputs[i].checked=false;
								};
							};
						</script>
					</div>
					
					<div class="float-bar-right">
						<div class="amount-sum">
							<span class="txt">已选商品</span>
							<em id="J_SelectedItemsCount">{{$goods}}</em><span class="txt">件</span>
							<div class="arrow-box">
								<span class="selected-items-arrow"></span>
								<span class="arrow"></span>
							</div>
						</div>
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong class="price">¥<em id='total'>{{$pricecount}}</em></strong>
						</div>
						<div class="btn-area">
							<a href="/home/order/account" id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>结&nbsp;算</span></a>
						</div>
					</div>
				@endif
				</div>
				
				
			</div>
		@include('home.layout.footer')
		<script type="text/javascript">

			function quanxuan()
			{
				//全选
				var all = document.getElementById('selectAll');
				var select = document.getElementsByName('select');
				//总价
				var total = document.getElementById('total');

				if(all.checked==true){
					for(i=0;i<select.length;i++){
						select[i].checked = true;
					}

				

				}else{
					for(i=0;i<select.length;i++){
						select[i].checked = false;
					}
					// total.innerHTML = 0;
				}
				
			}

	
		</script>
			
@endsection