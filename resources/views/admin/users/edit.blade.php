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
		<h2><i class="halflings-icon white edit"></i><span class="break"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户添加</font></font></h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<form class="form-horizontal" action="/admin/users/{{$user->id}}" method='post' enctype="multipart/form-data">
			{{ csrf_field() }}
			{{method_field('PUT')}}
			<fieldset>
				<!-- 用户名 -->
			  <div class="control-group">
				<label class="control-label" for="focusedInput"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户名</font></font></label>
				<div class="controls">
				  <input disabled class="input-xlarge focused" id="focusedInput" type="text" value="{{$user->uname}}" name="uname">
				</div>
			  </div>
			  <!-- 邮箱 -->
			   <div class="control-group">
				<label class="control-label" for="focusedInput"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">邮箱</font></font></label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="email" value="{{$user->email}}" name="email">
				</div>
			  </div>
			  <!-- 手机 -->
			   <div class="control-group">
				<label class="control-label" for="focusedInput"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">手机</font></font></label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="text" value="{{$user->phone}}" name="phone">
				</div>
			  </div>
			  <!-- 头像 -->
			   <div class="control-group">
				<label class="control-label" for="focusedInput"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">头像</font></font></label>
				
				<div class="controls">
				 <img style="width:150px;height:150px" src="/uploads/{{$user->profile}}">
				  <input class="input-xlarge focused" id="focusedInput" type="file" value="" name="profile">
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