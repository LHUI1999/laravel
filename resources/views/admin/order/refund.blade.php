@extends('admin.layout.index')
@section('content')
<div class="row-fluid sortable ui-sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title="">
				<h2><i class="halflings-icon white user"></i><span class="break"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">售后</font></font></h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form action="/admin/order/refund" method="get">
					关键字
					<input type="text" name="search" placeholder="订单号" value="{{ $requests['search'] or '' }}">
					<input type="submit"class="btn btn-danger"  value="搜索">
				</form>
				<table class="table table-striped table-bordered " >
				  <thead>
					  <tr role="row">
					  	<th class="sorting_asc"  tabindex="0" a rowspan="1" colspan="1"   style="width: 182px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">id</font></font>
					  	</th>
					  	<th class="sorting_asc"  tabindex="0"  rowspan="1" colspan="1"   style="width: 182px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">退款编号</font></font>
					  	</th>
					  	<th class="sorting_asc"  tabindex="0"  rowspan="1" colspan="1"   style="width: 182px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">退款人</font></font>
					  	</th>
					  	
					  	
					  	<th class="sorting"  tabindex="0"  rowspan="1" colspan="1"  style="width: 154px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品</font></font>
					  	</th>
					  	<th class="sorting"  tabindex="0"  rowspan="1" colspan="1"  style="width: 154px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">订单号</font></font>
					  	</th>
					  	<th class="sorting"  tabindex="0"  rowspan="1" colspan="1"  style="width: 154px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">类型</font></font>
					  	</th>
					  	<th class="sorting"  tabindex="0"  rowspan="1" colspan="1"  style="width: 154px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">原因</font></font>
					  	</th>
					  	<th class="sorting"  tabindex="0"  rowspan="1" colspan="1"  style="width: 154px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">说明</font></font>
					  	</th>
					  	<th class="sorting"  tabindex="0"  rowspan="1" colspan="1"  style="width: 154px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">退款图片</font></font>
					  	</th>
					  	<th class="sorting"  tabindex="0"  rowspan="1" colspan="1"  style="width: 154px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">退款金额</font></font>
					  	</th>
					  	<th class="sorting"  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 306px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作</font></font>
					  	</th>
					  </tr>
				  </thead>   
				  
			  		<tbody role="alert" aria-live="polite" aria-relevant="all">
			  			
			  			@foreach($refund as $k=>$v)
				  		<tr class="odd">
				  			<td class="  sorting_1">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->id}}</font></font>
							</td>
							<td class="  sorting_1">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->reorder}}</font></font>
							</td>
							<td class="  sorting_1">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->user->uname}}</font></font>
							</td>
							<td class="center ">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->goods->title}}</font></font>
							</td>
							<td class="center ">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->orders->order}}</font></font>
							</td>
							
							<td class="center ">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
									@if($v->type=='a')
									仅退款
									@elseif($v->type=='b')
									退款退货
									@endif
								</font></font>
							</td>
							<td class="center ">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
									@if($v->reason=='a')
									不想要了
									@elseif($v->reason=='b')
									买错了
									@elseif($v->reason=='c')
									没收到货
									@elseif($v->reason=='d')
									与说明不符
									@endif

									
								</font></font>
							</td>
							<td class="center ">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
									{{$v->explain}}
								</font></font>
							</td>
							<td class="center ">
								@if($v->pic！=null)
									@foreach($v->pic as $kk=>$vv)
									<img src="/uploads/{{$vv->pic}}">
									@endforeach
								@endif
							</td>
							<td class="center ">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
									{{$v->price}}
								</font></font>
							</td>
							<td class="center ">
								@if($v->orderinfo->status=='1')
								<a class="btn btn-info" href="/admin/order/refundstore?id={{$v->id}}">
									同意退款
								</a>
								@elseif($v->orderinfo->status=='2')
								<a class="btn btn-info" href="#">
									退款完成

								</a>
								@endif
							</td>
						</tr>
						@endforeach
					
						
						
					</tbody>
				</table>
				<div id="page_page">
					{{ $refund->appends($requests)->links() }}
				</div>
						
			</div>
		</div>
	</div>
@endsection