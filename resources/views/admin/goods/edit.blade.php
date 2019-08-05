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
		<form class="form-horizontal" action="/admin/goods/{{$goods[0]['id']}}" method='post' enctype="multipart/form-data">
			{{ csrf_field() }}
			{{method_field('PUT')}}
			<fieldset>
				<!-- 用户名 -->
			  <div class="control-group">
				<label class="control-label" for="focusedInput"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">标题</font></font></label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="text" value="{{$goods[0]['title']}}" name="title">
				</div>
			  </div>
			  <!-- 密码 -->
			   <div class="control-group">
				<label class="control-label" for="focusedInput"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">价格</font></font></label>
				<div class="controls">
				  <input class="input-xlarge focused"  id="focusedInput" type="text" value="{{$goods[0]['price']}}" name="price">
				</div>
			  </div>
			  <!-- 确认密码 -->
			   <div class="control-group">
				<label class="control-label" for="focusedInput"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">数量</font></font></label>
				<div class="controls">
				  <input class="input-xlarge focused"  id="focusedInput" type="text" value="{{$goods[0]['num']}}" name="num">
				</div>
			  </div>

			  
			  <!-- 商品图片 -->
			   <div class="control-group">
				<label class="control-label" for="focusedInput"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品图片</font></font></label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="file" value="" name="goodspic[]" multiple>

				</div>
				<div class="controls">
				  @foreach($goodspic as $k => $v)
				  	<img style="width:50px;height:50px" src="/uploads/{{$v->pic}}">
				  @endforeach
				  
				</div>
			  </div>

			  <!-- 详情图片 -->
			  <div class="control-group">
				<label class="control-label" for="focusedInput"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">详情图片</font></font></label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="file" value="" name="infopic[]" multiple>
				</div>
				<div class="controls">
				  @foreach($goodsinfopic as $k => $v)
				  	<img style="width:50px;height:50px" src="/uploads/{{$v->infopic}}">
				  @endforeach
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