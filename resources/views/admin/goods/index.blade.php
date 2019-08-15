@extends('admin.layout.index')
@section('content')
	<div class="row-fluid sortable ui-sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title="">
				<h2><i class="halflings-icon white user"></i><span class="break"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品列表</font></font></h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form action="/admin/goods" method="get">
					关键字
					<input type="text" name="search" placeholder="用户名" value="{{ $requests['search'] or '' }}">
					<input type="submit"class="btn btn-danger"  value="搜索">
				</form>
				<table class="table table-striped table-bordered " >
				  <thead>
					  <tr role="row">
					  	<th class="sorting_asc"  tabindex="0" a rowspan="1" colspan="1"   style="width: 182px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">id</font></font>
					  	</th>

					  	<th class="sorting_asc"  tabindex="0"  rowspan="1" colspan="1"   style="width: 182px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">标题</font></font>
					  	</th>
					  	<th class="sorting"  tabindex="0"  rowspan="1" colspan="1" style="width: 264px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">价格</font></font>
					  	</th>
					  	<th class="sorting" tabindex="0"  rowspan="1" colspan="1"  style="width: 145px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">库存</font></font>
					  	</th>
					  	<th class="sorting"  tabindex="0"  rowspan="1" colspan="1"  style="width: 154px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品图片</font></font>
					  	</th>
					  	<th class="sorting"  tabindex="0"  rowspan="1" colspan="1"  style="width: 154px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品详情图片</font></font>
					  	</th>
					  	<th class="sorting"  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 306px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作</font></font>
					  	</th>
					  </tr>
				  </thead>   
				  
			  		<tbody role="alert" aria-live="polite" aria-relevant="all">
			  			@foreach($goods as $k => $v)
				  		<tr class="odd">
				  			<td class="  sorting_1">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->id}}</font></font>
							</td>
							<td class="  sorting_1">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->title}}</font></font>
							</td>
							<td class="center ">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->price}}</font></font>
							</td>
							<td class="center ">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->num}}</font></font>
							</td>
							<td class="center ">
								@foreach($goodspic as $kk => $vv)
									@if($vv->gid == $v->id)
									<img style="width:30px;height:30px" src="/uploads/{{$vv->pic}}">
									@endif
								@endforeach
							</td>
							<td class="center ">
								@foreach($goodsinfopic as $kkk => $vvv)
									@if($vvv->gid == $v->id)
									<img style="width:30px;height:30px" src="/uploads/{{$vvv->infopic}}">
									@endif
								@endforeach
							</td>
							<td class="center ">
								<a class="btn btn-info" href="/admin/goods/{{$v->id}}/edit">
									<i class="halflings-icon white edit"></i> 
								</a>
								<!--  -->
								<form action="/admin/goods/{{$v->id}}" method="post" style="display:inline">
									{{csrf_field()}}
									{{method_field('DELETE')}}
									<button class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</button>
								</form>
								<a class="btn btn-info" href="/admin/goods/comment/{{$v->id}}">
									查看评论
								</a>
								
							</td>
						</tr>
						@endforeach
						
					</tbody>
				</table>
				<div id="page_page">

					{{ $goods->appends($requests)->links() }}

				</div>
						
			</div>
		</div>
	</div>
@endsection