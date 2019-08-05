@extends('admin.layout.index')
@section('content')
@if (count($errors) > 0)
<!-- 显示验证错误 -->
    <div class="alert alert-error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
<!-- 验证错误结束 -->
<div class="box span12" style="">
	<div class="box-header" data-original-title="">
		<h2><i class="halflings-icon white edit"></i><span class="break"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品添加</font></font></h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<form class="form-horizontal" action="/admin/goods" method='post' enctype="multipart/form-data">
			{{ csrf_field() }}
			<fieldset>
				<!-- 用户名 -->
			  <div class="control-group">
				<label class="control-label" for="selectError3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">所属分类</font></font></label>
				<div class="controls">
				  <select id="selectError3" name='cates'>
				  	@foreach($cates as $k => $v)
					<option value="{{$v->id}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->cname}}</font></font></option>
					@endforeach
					
				  </select>
				</div>
			  </div>
				<!-- 用户名 -->
			  <div class="control-group">
				<label class="control-label" for="focusedInput"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">标题</font></font></label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="title">
				</div>
			  </div>
			  <!-- 密码 -->
			   <div class="control-group">
				<label class="control-label" for="focusedInput"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">价格</font></font></label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="price">
				</div>
			  </div>
			  <!-- 确认密码 -->
			   <div class="control-group">
				<label class="control-label" for="focusedInput"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">数量</font></font></label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="num">
				</div>
			  </div>

			  
			  <!-- 商品图片 -->
			   <div class="control-group">
				<label class="control-label" for="focusedInput"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品图片</font></font></label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="file" value="" name="goodspic[]" multiple>
				</div>
			  </div>

			  <!-- 详情图片 -->
			  <div class="control-group">
				<label class="control-label" for="focusedInput"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">详情图片</font></font></label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="file" value="" name="infopic[]" multiple>
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