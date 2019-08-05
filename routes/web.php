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
 
});
Route::get('home/register/changestatus','Home\RegisterController@changestatus');
Route::get('home/register/sendPhone','Home\RegisterController@sendPhone');
Route::post('home/register/phonestore','Home\RegisterController@phonestore');

//前台
Route::resource('home/register','Home\RegisterController');

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



//前台登录路由
Route::get('/home/login','Home\LoginController@index');
Route::post('/home/login/dologin','Home\LoginController@dologin');

//前台首页
Route::get('/home/index','Home\IndexController@index');
//个人中心
Route::get('/home/center','Home\CenterController@index');





