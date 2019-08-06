@extends('admin.layout.index')
@section('content')

	<div class="row-fluid sortable ui-sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title="">
				<h2><i class="halflings-icon white user"></i><span class="break"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">收货地址</font></font></h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form action="/admin/users/address/{{ $_SESSION['user']->uid }}" method="get">
					关键字
					<input type="text" name="search" placeholder="收货人" value="{{ $requests['search'] or '' }}">
					<input type="submit"class="btn btn-danger"  value="搜索">
				</form>
				<table class="table table-striped table-bordered " >
				  <thead>
					  <tr role="row">
					  	<th class="sorting_asc"  tabindex="0" a rowspan="1" colspan="1"   style="width: 182px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">id</font></font>
					  	</th>
					  	<th class="sorting_asc"  tabindex="0"  rowspan="1" colspan="1"   style="width: 182px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">收货人</font></font>
					  	</th>
					  
					  	<th class="sorting" tabindex="0"  rowspan="1" colspan="1"  style="width: 145px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">手机号</font></font>
					  	</th>
					  	<th class="sorting"  tabindex="0"  rowspan="1" colspan="1"  style="width: 154px;">
					  		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">详细地址</font></font>
					  	</th>
					  	
					  </tr>
				  </thead>   
				  
			  		<tbody role="alert" aria-live="polite" aria-relevant="all">
			  			@foreach($data as $k=> $v)
				  		<tr class="odd">
				  			<td class="  sorting_1">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->id }}</font></font>
							</td>
							<td class="  sorting_1">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->uname }}</font></font>
							</td>
							<td class="center ">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->phone }}</font></font>
							</td>
							<td class="center ">
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->addr }}</font></font>
							</td>
							
							
						</tr>
						@endforeach
					</tbody>
				</table>
				<div id="page_page">
					{{ $data->appends($requests)->links() }}
				</div>
						
			</div>
		</div>
	</div>
@endsection