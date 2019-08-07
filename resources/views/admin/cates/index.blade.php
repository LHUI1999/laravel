@extends('admin.layout.index')
@section('content')
<div class="box span12">
	<div class="box-header" data-original-title="">
		<h2><i class="halflings-icon white user"></i><span class="break"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户列表</font></font></h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<form action="/admin/cates" method="get">
			关键字
			<input type="text" name="search" placeholder="用户名" >
			<input type="submit" class="btn btn-danger" value="搜索">
		</form>
		<table class="table table-striped table-bordered ">
		  <thead>
			  <tr role="row">
			  	<th class="sorting_asc" tabindex="0" a="" rowspan="1" colspan="1" style="width: 182px;">
			  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">id</font></font>
			  	</th>
			  	<th class="sorting_asc" tabindex="0" rowspan="1" colspan="1" style="width: 182px;">
			  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">分类名称</font></font>
			  	</th>
			  	<th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 264px;">
			  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">父级id</font></font>
			  	</th>
			  	<th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 145px;">
			  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">分类路径</font></font>
			  	</th>
			  	<th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 154px;">
			  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">状态</font></font>
			  	</th>
			  	<th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 154px;">
			  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">创建时间</font></font>
			  	</th>
			  	<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 306px;">
			  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作</font></font>
			  	</th>
			  </tr>
		  </thead>   
		  
	  		<tbody role="alert" aria-live="polite" aria-relevant="all">
	  			@foreach($cate as $k=>$v)
	  			<tr class="odd">
		  			<td class="  sorting_1">
						<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->id}}</font></font>
					</td>
					<td class="  sorting_1">
						<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->cname}}</font></font>
					</td>
					<td class="center ">
						<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->pid}}</font></font>
					</td>
					<td class="center ">
						<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->path}}</font></font>
					</td>
					<td class="center ">
						@if($v->status == 1)
						<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">启用</font></font>
						@else
						<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">未启用</font></font>
						@endif

					</td>
					<td class="center ">
						<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->created_at}}</font></font>
					</td>
					<td class="center ">
						@if(substr_count($v->path,',')<2)
						<a href="/admin/cates/create?id={{$v->id}}">
							<button class='btn btn-info'>添加子分类</button>
						</a>
						@if(substr_count($v->path,',')>1)
						<form action="/admin/cates/{{$v->id}}" method="post" style="display:inline">
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button class="btn btn-danger" href="#">
								<i class="halflings-icon white trash"></i> 
							</button>
						</form>
						@endif
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div id="page_page">

		</div>
				
	</div>
</div>
@endsection