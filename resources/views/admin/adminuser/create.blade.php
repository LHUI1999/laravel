@extends('admin.layout.index')

@section('content')
    {{-- 显示验证错误开始 --}}
@if (count($errors) > 0)
<div class="alert alert-error">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{-- <strong>哦，快！</strong> 更改一些内容并尝试再次提交。 --}}

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{{-- 显示验证错误结束 --}}

<div class="box span12">
<div class="box-header" data-original-title="">
    <h2><i class="halflings-icon white edit"></i><span class="break"></span>管理员添加</h2>
    <div class="box-icon">
        <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
        <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
        <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
    </div>
</div>
<div class="box-content">
    <form class="form-horizontal" action="/admin/adminuser" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
      <fieldset>
        <div class="control-group">
          <label class="control-label" for="typeahead">管理员名称 </label>
          <div class="controls">
            <input type="text" name="uname" value="{{ old('uname') }}" class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" data-source="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]">
          </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="typeahead">密码 </label>
            <div class="controls">
              <input type="password" name="upass" value="" class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" data-source="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="fileInput">头像</label>
            <div class="controls">
              <div class="uploader hover" id="uniform-fileInput">
                  <input class="input-file uniform_on" name="profile" value="" id="fileInput" type="file">
                  <span class="filename" style="user-select: none;">No file selected</span>
                  <span class="action" style="user-select: none;">Choose File</span>
              </div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">角色</label>
            <div class="controls">
            @foreach ($roles as $k=>$v)
                <label class="checkbox inline">
                    <input type="radio" id="inlineCheckbox1" name="rname" value="{{ $v->id }}"> {{ $v->rname }}
                </label>
            @endforeach
             
            </div>
          </div>
   
                
       
        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Save changes</button>
          <a href="/admin/user">
              <button type="" class="btn">Cancel</button>
          </a>
        </div>
      </fieldset>
    </form>   

</div>
</div>
@endsection