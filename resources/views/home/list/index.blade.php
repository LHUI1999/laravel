<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class='container'>
		<h3>列表</h3>
		<form action="" method="get" action="/home/list" class='form-inline'>
			<div class="row">

			  <div class="col-lg-6">
			    <div class="input-group">
			      <input type="text" name='search' class="form-control" placeholder="Search for...">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button">Go!</button>
			      </span>
			    </div><!-- /input-group -->
			  </div><!-- /.col-lg-6 -->
			</div><!-- /.row -->

		</form>

		<a style='float:right' href="/home/car/index">购物车({{$countcar}})</a>

		<table class='table'>
			<tr>
				<td>ID</td>
				<td>商品名称</td>
				<td>商品价格</td>
				<td>操作</td>
			</tr>
			
				@foreach($data as $k => $v)
				<tr>
					<td>{{$v->id}}</td>
					<td>{{$v->title}}</td>
					<td>{{$v->price}}</td>
					<td>
						<a href="/home/car/add?id={{$v->id}}" class='btn btn-danger'>加入购物车</a>
					</td>
				</tr>
				@endforeach
			
		</table>
	</div>
</body>
</html>