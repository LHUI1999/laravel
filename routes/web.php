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

Route::group(['middleware'=>['login']],function(){
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
	Route::resource('admin/goods','Admin\GoodsController');
	//后台优惠券
	Route::resource('admin/youhui', 'Admin\YouhuiController');
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

	//结算
	Route::get('/home/order/account','Home\OrderController@account');
	Route::post('/home/order/pay','Home\OrderController@pay');

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

	 //个人信息
	Route::resource('/home/geren','Home\GerenController');
	Route::PUT('/home/geren/edit/{id}','Home\GerenController@edit');
	//优惠券
	Route::resource('/home/youhui', 'Home\YouhuiController');
	//点击查看商品详情
	Route::resource('/home/goods', 'Home\GoodsController');
	//今日推荐
	Route::resource('/home/tuijian', 'Home\TuijianController');
	Route::resource('/home/tunhuo', 'Home\TunhuoController');
	Route::resource('/home/langman', 'Home\LangmanController');

	























// 后台收货地址
Route::get('admin/users/address/{id}','Admin\UserController@address');

// 收货地址
Route::get('/home/address','Home\AddressController@index');
// 添加收货地址
Route::post('/home/address/add','Home\AddressController@add');
// 删除收货地址
Route::get('/home/address/destroy/{id}','Home\AddressController@destroy');
// 修改收货地址
Route::get('/home/address/{id}/edit','Home\AddressController@edit');
Route::get('/home/address/update/{id}','Home\AddressController@update');






