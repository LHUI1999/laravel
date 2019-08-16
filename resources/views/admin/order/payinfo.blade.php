@extends('admin.layout.index')
@section('content')
<div class="row-fluid sortable ui-sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title="">
				<h2><i class="halflings-icon white user"></i><span class="break"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">代付款详情</font></font></h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				{{-- <form action="/admin/order" method="get">
					关键字
					<input type="text" name="search" placeholder="用户名" value="{{ $requests['search'] or '' }}">
					<input type="submit"class="btn btn-danger"  value="搜索">
				</form> --}}
				<table class="table table-striped table-bordered " >
				  <thead>
					  <tr role="row">
					  	<th class="sorting_asc"  tabindex="0" a rowspan="1" colspan="1"   style="width: 182px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">id</font></font>
					  	</th>
					  	<th class="sorting_asc"  tabindex="0"  rowspan="1" colspan="1"   style="width: 182px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品标题</font></font>
					  	</th>
					  	
					  	
					  	<th class="sorting"  tabindex="0"  rowspan="1" colspan="1"  style="width: 154px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品图片</font></font>
					  	</th>
					  	<th class="sorting"  tabindex="0"  rowspan="1" colspan="1"  style="width: 154px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品单价</font></font>
					  	</th>
					  	<th class="sorting"  tabindex="0"  rowspan="1" colspan="1"  style="width: 154px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">购买数量</font></font>
					  	</th>
					  	
					  </tr>
				  </thead>   
				  
			  		<tbody role="alert" aria-live="polite" aria-relevant="all">
			  			
			  			@foreach($data as $k=>$v)
				  		<tr class="odd">
				  			<td class="  sorting_1">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->id}}</font></font>
							</td>
							<td class="  sorting_1">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->goods->title}}</font></font>
							</td>
							<td class="center ">
								<img style="width:50px" src="/uploads/{{$v->goodspic->pic}}">
							</td>
							<td class="center ">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->goods->price}}</font></font>
							</td>
							
							<td class="center ">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->num}}</font></font>
							</td>
							
						</tr>
						@endforeach
						
						
						
					</tbody>
				</table>
				<div id="page_page">

					

				</div>
						
			</div>
		</div>
	</div>
@endsection