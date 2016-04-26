<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// //网站根目录，交给闭包函数处理
// Route::get('/', function(){
// 	return 'hello index';
// });


// //http://127.0.0.1:8080/view/id(view代表查看动作，id代表查看的是哪一条留言信息)
// Route::get('view/{id?}', function($id=1){
// 	return 'Comment/view/'.$id;
// });



//HTTP请求类型路由和控制器的绑定
// Route::get('/', 'CommentController@index');
//Route::get('view/id?', 'CommentContrller@show');


//RESTful资源控制器形式绑定路由

//Route::resource('comment','CommentController');


//隐式控制器路由绑定
//Route::controller('comment', 'CommentController');

//绑定评论页面
//Route::get('/', 'CommentController@index');	
// 评论页面的路由绑定

// Route::get('/view/{id}', 'CommentController@view');
// Route::get('/add', function(){
// 	return view('add');
// });
// Route::post('/add', 'CommentController@add');
// Route::get('/delete/{id}', 'CommentController@delete');
// Route::get('/edit/{id}', 'CommentController@edit');
// Route::post('/edit/{id}', 'CommentController@postEdit');


//首页
Route::get('/homepage', 'BloglistController@homepage');

//个人中心
Route::get('/editUser/{id}', 'userController@editUser');
Route::post('/postEditUser/{id}', 'userController@postEditUser');

//绑定博文全览列表
Route::get('/allblog', 'BloglistController@view');

//绑定个人博客列表
Route::get('/myblog/{author}', 'BloglistController@myblog');
//绑定博文类别
Route::get('/blogclass/{bclass}', 'BloglistController@blogclass');

//绑定博文详情
Route::get('/blogdetail/{id}','BloglistController@detail');
//绑定发表博文
Route::get('/publish', 'BloglistController@publish');
Route::post('/publish/{author}', 'BloglistController@add');
//搜索博文
Route::get('/searchT/{keywords}', 'BloglistController@searchT');
Route::get('/searchA/{keywords}', 'BloglistController@searchA');
Route::get('/searchD/{keywords}', 'BloglistController@searchD');
Route::get('/searchC/{keywords}', 'BloglistController@searchC');

//删除博文
Route::get('/delete/{id}', 'bloglistController@delete');



//评论页面
Route::post('/blogdetail/{id}', 'CommentController@add');
//删除评论
Route::get('/deleteComment/{id}', 'CommentController@deleteComment');

//登录和注册页面
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');

Route::get('/auth/register', 'Auth\AuthController@getRegister');
Route::post('/auth/register', 'Auth\AuthController@postRegister');

Route::get('/auth/logout', 'Auth\AuthController@getLogout');

 

//后台api

  
//用户表
Route::group(array('prefix' => 'api'), function() {
  Route::resource('management/0', 'Auth\AuthController', 
    array('only' => array('index', 'store')));
});

Route::group(array('prefix' => 'api'), function() {
  Route::resource('users', 'Auth\AuthController', 
    array('only' => array('destroy')));
});

//博文表
Route::group(array('prefix' => 'api'), function() {
  Route::resource('management/1', 'bloglistController', 
    array('only' => array('index', 'store')));
});

Route::group(array('prefix' => 'api'), function() {
  Route::resource('bloglists', 'bloglistController', 
    array('only' => array('destroy')));
});

Route::group(array('prefix' => 'api'), function() {
  Route::resource('blogdetail', 'BloglistController', 
    array('only' => array('show')));
});

//评论表
Route::group(array('prefix' => 'api'), function() {
  Route::resource('management/2', 'CommentController', 
    array('only' => array('index', 'store')));
});

Route::group(array('prefix' => 'api'), function() {
  Route::resource('comments', 'CommentController', 
    array('only' => array('destroy')));
});

Route::group(array('prefix' => 'api'), function() {
  Route::resource('commentdetail', 'CommentController', 
    array('only' => array('show')));
});


Route::group(array('prefix' => 'api'), function() {
  Route::resource('admins', 'AdminController', 
    array('only' => array('index')));
});

//登录页面  
Route::get('/', function() {
  
  return View::make('/index');  
  
});

