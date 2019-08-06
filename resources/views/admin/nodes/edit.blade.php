@extends('admin.layout.index')
@section('content')
<div id="content" class="span10" style="min-height: 406px;">
        <div class="container">
                                            <!--显示验证错误开始-->
<!--显示验证错误结束-->

<div class="box span12">
    <div class="box-header" data-original-title="">
        <h3><i class="halflings-icon white edit"></i><span class="break"></span>权限修改</h3>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
        </div>
    </div>
    <div class="box-content">
    <form class="form-horizontal" action="/admin/nodes/{{ $data->id }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
            <fieldset>
              <div class="control-group">
                <label class="control-label" for="focusedInput">描述</label>
                <div class="controls">
                <input class="input-xlarge focused" name="desc" value="{{ $data->desc }}" type="text" placeholder="This is Description…">
                </div>
              </div>
              <div class="control-group">
                    <label class="control-label">控制器名称</label>
                    <div class="controls">
                      <input class="input-xlarge focused" name="cname" value="{{ $data->cname }}" type="text" placeholder="This is Controller…">
                    </div>
                  </div>
              <div class="control-group">
                <label class="control-label">方法名称</label>
                <div class="controls">
                  <input class="input-xlarge focused" name="aname" type="text" value="{{ $data->aname }}" placeholder="This is Method…">
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button class="btn">Cancel</button>
              </div>
            </fieldset>
          </form>
    
    </div>
</div>
    </div>
<!--/row-->
</div>
@endsection