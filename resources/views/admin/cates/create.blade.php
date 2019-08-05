@extends('admin.layout.index')
@section('content')
<div class="box span12" style="">
	<div class="box-header" data-original-title="">
		<h2><i class="halflings-icon white edit"></i><span class="break"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">添加分类</font></font></h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<form class="form-horizontal" action="/admin/cates" method='post' enctype="multipart/form-data">
			{{ csrf_field() }}
			<fieldset>
				<!-- 用户名 -->
			  <div class="control-group">
				<label class="control-label" for="focusedInput"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">分类名称</font></font></label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="cname">
				</div>
			  </div>
			 

			 <div class="control-group">
				<label class="control-label" for="selectError3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">所属分类</font></font></label>
				<div class="controls">
				  <select name='pid' id="selectError3">
					<option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">请选择</font></font></option>
					@foreach( $cates as $k=>$v)
					<option {{$v->id==$id?'selected' : ''}} value="{{$v->id}}" {{substr_count($v->path,',') >=2 ? 'disabled' : ''}} ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->cname}}</font></font></option>
					@endforeach
					
				  </select>
				</div>
			 </div>

			 <div class="form-actions">
				<button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">保存更改</font></font></button>
				<button class="btn"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">取消</font></font></button>
			  </div>
			</fieldset>
		  </form>
	
	</div>
</div>
@endsection