@extends('admin.layout.index')
@section('content')
<div class="box span12">
			<div class="box-header" data-original-title="">
				<h2><i class="halflings-icon white user"></i><span class="break"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理员列表</font></font></h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form action="/admin/adminuser" method="get">
					关键字
					<input type="text" name="search" placeholder="管理员名称" value="">
					<input type="submit" class="btn btn-danger" value="搜索">
				</form>
				<table class="table table-striped table-bordered ">
				  <thead>
					  <tr role="row">
					  	<th class="sorting_asc" tabindex="0" a="" rowspan="1" colspan="1" style="width: 182px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">id</font></font>
					  	</th>
					  	<th class="sorting_asc" tabindex="0" rowspan="1" colspan="1" style="width: 182px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理员名称</font></font>
					  	</th>
					  	<th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 264px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理员头像</font></font>
					  	</th>
					  	<th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 264px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作</font></font>
					  	</th>
					  	
					  </tr>
				  </thead>   
				  
			  		<tbody role="alert" aria-live="polite" aria-relevant="all">
			  			@foreach($adminusers as $k => $v)
			  			<tr class="odd">
				  			<td class="  sorting_1">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->id}}</font></font>
							</td>
							<td class="  sorting_1">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->uname}}</font></font>
							</td>
							
							<td class="center ">
								<img style="width:40px;height:40px;border-radius:8px" src="/uploads/{{$v->profile}}">
							</td>
							<td class="center ">
								<form action="/admin/adminuser/{{ $v->id }}" method="post" style="display:inline;">
									{{ csrf_field() }}
									{{-- 类型伪装 --}}
									{{ method_field('DELETE') }}
									<input type="submit" value="删除" class="btn btn-danger">
								</form>

								<a class="btn btn-info" href="/admin/adminuser/{{ $v->id }}/edit">修改</a>
								
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div id="page_page">
					{{ $adminusers->appends($requests)->links() }}
				</div>
						
			</div>
		</div>
@endsection