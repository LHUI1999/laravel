@extends('admin.layout.index')
@section('content')

<div class="box span12" style="">
	<div class="box-header" data-original-title="">
		<h2><i class="halflings-icon white edit"></i><span class="break"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">角色添加</font></font></h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<form class="form-horizontal" action="/admin/roles/store" method="post" enctype="multipart/form-data">
			{{csrf_field()}}

			<!-- <input type="hidden" name="_token" value="uhkuS5vb3gF17KSHh8Y0MmpJ6BgcXnbvlnTuRDUd"> -->
			<fieldset>
				<!-- 用户名 -->
			  <div class="control-group">
				<label class="control-label" for="focusedInput"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">角色名称</font></font></label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="rname">
				</div>
			  </div>
			@foreach($nodes as $k=>$v)
			  <div class="control-group">
				<label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$controllernames[$k]}}</font></font></label>
				<div class="controls">
					@foreach($v as $kk=> $vv)

					  <label class="checkbox inline">
						<div class="checker" id="uniform-inlineCheckbox1"><span><input type="checkbox" id="inlineCheckbox1" name='nid[]' value="{{$vv['id']}}"></span></div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> {{$vv['desc']}}
					  </font></font></label>
					@endforeach
				</div>
			  </div>
			@endforeach

			  
			 
			  <div class="form-actions">
				<button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">保存更改</font></font></button>
				<button class="btn"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">取消</font></font></button>
			  </div>
			</fieldset>
		  </form>
	
	</div>
</div>
@endsection