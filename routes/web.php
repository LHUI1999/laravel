<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	session(['admin_login'=>null]);
	session(['admin_userinfo'=>null]);

    return view('welcome');
});

//后台登陆路由
Route::get('admin/login','Admin\LoginController@login');
//后台执行登录路由
Route::post('admin/login/dologin','Admin\LoginController@dologin');
//退出登录
Route::get('admin/login/logout','Admin\LoginController@logout');
//权限页面
Route::get('admin/allow',function(){
	return view('admin.allow.allow');
});

Route::group(['middleware'=>['login','allow']],function(){
	//后台首页
	Route::get('admin','Admin\IndexController@index');
	//后台用户路由
	Route::resource('admin/users','Admin\UserController');
	//后台分类路由
	Route::resource('admin/cates','Admin\CatesController');
	//后台管理员路由
	Route::resource('admin/adminuser','Admin\AdminuserController');
	//后台权限管理
	Route::post('/admin/nodes/store','Admin\NodesController@store');
	Route::resource('admin/nodes','Admin\NodesController');

	//后台角色管理
	Route::post('/admin/roles/store','Admin\RolesController@store');
	Route::resource('admin/roles','Admin\RolesController');

	//后台商品管理
	//待发货
	Route::get('admin/goods/sendorder','Admin\GoodsController@sendorder');
	//订单详情
	Route::get('admin/goods/orderinfo','Admin\GoodsController@orderinfo');
	//已发货
	Route::get('admin/goods/send','Admin\GoodsController@send');
	//后台商品管理
	Route::resource('admin/goods','Admin\GoodsController');
	//后台商品评价
	Route::get('admin/goods/comment/{id}','Admin\GoodsController@comment');
	
	// 后台收货地址
	Route::get('admin/users/address/{id}','Admin\UserController@address');

	//后台订单管理
	//待发货
	Route::get('admin/order/sendorder','Admin\OrderController@sendorder');
	//订单详情
	Route::get('admin/order/orderinfo','Admin\OrderController@orderinfo');
	//已发货
	Route::get('admin/order/send','Admin\OrderController@send');

	// 待付款
	Route::get('admin/order/payorder','Admin\OrderController@payorder');
	// 订单详情
	Route::get('admin/order/payinfo','Admin\OrderController@payinfo');

	// 待收货
	Route::get('admin/order/overorder','Admin\OrderController@overorder');
	// 查看详情
	Route::get('admin/order/overinfo','Admin\OrderController@overinfo');

	// 待评价
	Route::get('admin/order/commentorder','Admin\OrderController@commentorder');
	// 查看详情
	Route::get('admin/order/commentinfo','Admin\OrderController@commentinfo');
	// 售后
	Route::get('admin/order/refund','Admin\OrderController@refund');
	// 处理退款
	Route::get('admin/order/refundstore','Admin\OrderController@refundstore');

});


//前台登录路由
Route::get('/home/login','Home\LoginController@index');
Route::post('/home/login/dologin','Home\LoginController@dologin');

Route::get('home/register/changestatus','Home\RegisterController@changestatus');
Route::get('home/register/sendPhone','Home\RegisterController@sendPhone');
Route::post('home/register/phonestore','Home\RegisterController@phonestore');
//前台注册
Route::resource('home/register','Home\RegisterController');


//前台首页
Route::any('/home/index','Home\IndexController@index');


//商品列表页面

	Route::get('home/list','Home\ListController@index');

	//加入购物车
	Route::get('/home/car/add','Home\CarController@add');
	//购物车列表
	Route::get('/home/car/index','Home\CarController@index');
	//增加商品数量
	Route::get('/home/car/addnum','Home\CarController@addNum');
	//减少商品数量
	Route::get('/home/car/descnum','Home\CarController@descNum');
	//删除商品
	Route::get('/home/car/delete','Home\CarController@delete');
	//选择商品
	Route::get('/home/car/select','Home\CarController@select');
	//选择所有商品
	Route::get('/home/car/selectall','Home\CarController@selectall');

	//结算
	Route::get('/home/order/account','Home\OrderController@account');
	//订单结算
	Route::post('/home/order/pay','Home\OrderController@pay');
	//选择地址
	Route::get('/home/order/addr','Home\OrderController@addr');
	//提交订单
	Route::post('/home/order/success','Home\OrderController@success');
	//生成订单
	Route::get('/home/order/over','Home\OrderController@over');
	//q取消订单
	Route::get('/home/order/cancel','Home\OrderController@cancel');
	//订单管理
	Route::get('/home/order/index','Home\OrderController@index');
	//删除订单
	Route::get('/home/order/delorder','Home\OrderController@delorder');
	//取消订单
	Route::get('/home/order/quxiaoorder','Home\OrderController@quxiaoorder');
	//一键支付
	Route::get('/home/order/onepay','Home\OrderController@onepay');
	//执行一键支付
	Route::post('/home/order/onesuccess','Home\OrderController@onesuccess');
	//确认收货
	Route::get('/home/order/takeorder','Home\OrderController@takeorder');
	//订单详情
	Route::get('/home/order/orderinfo','Home\OrderController@orderinfo');
	//退款退货
	Route::get('/home/order/refund','Home\OrderController@refund');
	//执行退款退货
	Route::post('/home/order/refundstore','Home\OrderController@refundstore');
	//退款退货
	Route::get('/home/order/refundshang','Home\OrderController@refundshang');
	//退款售后
	Route::get('/home/order/change','Home\OrderController@change');
	//钱款去向
	Route::get('/home/order/record','Home\OrderController@record');


	//评论
	Route::get('/home/comment','Home\CommentController@index');
	//添加评论
	Route::post('/home/comment/store','Home\CommentController@store');

	//个人中心
	Route::get('/home/center','Home\CenterController@index');

	//安全设置
	Route::get('/home/safe','Home\SafeController@index');
	//登陆密码
	Route::get('/home/safe/password','Home\SafeController@password');
	Route::post('/home/safe/passedit/{id}','Home\SafeController@passedit');
	//支付密码
	Route::get('/home/safe/paypass','Home\SafeController@paypass');
	Route::post('/home/safe/paystore','Home\SafeController@paystore');
	//手机验证
	Route::get('/home/safe/bindphone','Home\SafeController@bindphone');
	Route::post('/home/safe/changephone','Home\SafeController@changephone');
	//邮箱换绑
	Route::get('/home/safe/email','Home\SafeController@email');
	Route::post('/home/safe/changeemail','Home\SafeController@changeemail');
	Route::post('/home/safe/sendemail','Home\SafeController@sendemail');

	 //个人信息
	Route::resource('/home/geren','Home\GerenController');
	Route::PUT('/home/geren/edit/{id}','Home\GerenController@edit');
	Route::resource('/home/geren','Home\GerenController');
	Route::PUT('/home/geren/edit/{id}','Home\GerenController@edit');
	
	//点击查看商品详情
	Route::resource('/home/goods', 'Home\GoodsController');

	//今日推荐
	Route::resource('/home/tuijian', 'Home\TuijianController');
	Route::resource('/home/tunhuo', 'Home\TunhuoController');
	Route::resource('/home/langman', 'Home\LangmanController');


	


























// 收货地址
Route::get('/home/address','Home\AddressController@index');
// 添加收货地址
Route::post('/home/address/add','Home\AddressController@add');
// 删除收货地址
Route::get('/home/address/destroy/{id}','Home\AddressController@destroy');
// 修改收货地址
Route::get('/home/address/{id}/edit','Home\AddressController@edit');
Route::get('/home/address/update/{id}','Home\AddressController@update');

// 订单管理
Route::get('/home/order','Home\OrderController@index');


// 新闻
Route::get('/home/news/new1','Home\NewsController@new1');
Route::get('/home/news/new2','Home\NewsController@new2');
Route::get('/home/news/new3','Home\NewsController@new3');
Route::get('/home/news/new4','Home\NewsController@new4');
Route::get('/home/news/new5','Home\NewsController@new5');

// 收藏
Route::get('/home/collection','Home\CollectionController@index');
Route::get('/home/collection/add','Home\CollectionController@add');
Route::get('/home/collection/delete','Home\CollectionController@delete');

// 足迹
Route::get('/home/foot','Home\FootController@index');
Route::get('/home/foot/delete','Home\FootController@delete');

// 评价
Route::get('/home/comment/comment','Home\CommentController@comment');

//账单
Route::get('/home/bill','Home\BillController@index');


// 未登录不能访问的页面
Route::group(['middleware' => 'check.login'], function() {
	//个人中心
	Route::get('/home/center','Home\CenterController@index');
	//结算
	Route::get('/home/order/account','Home\OrderController@account');
	// 收藏
	Route::get('/home/collection','Home\CollectionController@index');
	// 新闻
	Route::get('/home/news/new1','Home\NewsController@new1');
	Route::get('/home/news/new2','Home\NewsController@new2');
	Route::get('/home/news/new3','Home\NewsController@new3');
	Route::get('/home/news/new4','Home\NewsController@new4');
	Route::get('/home/news/new5','Home\NewsController@new5');
	// 订单管理
	Route::get('/home/order','Home\OrderController@index');
	//账单
	Route::get('/home/bill','Home\BillController@index');
});




