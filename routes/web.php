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
    return view('admin.login');
}); //登陆

//后台-----登陆注册
Route::get('/reg','Admin\AdminController@reg');   //注册
Route::post('/reg','Admin\AdminController@regDo');    //执行注册
Route::post('/log','Admin\AdminController@log');    //执行登陆
Route::get('/test','Admin\AdminController@redis');  //测试redis
Route::get('/forget','Admin\AdminController@forget');   //忘记密码
Route::post('/forget','Admin\AdminController@forge');  //执行修改忘记密码


Route::group(['middleware' => 'login'], function() {
    Route::get('/index','Admin\AdminController@index'); //后台首页
    Route::post('/send','Admin\AdminController@send');   //发送验证码
    Route::get('/out','Admin\AdminController@logOut'); //退出登陆

    //后台-----导航栏
    Route::get('/bar','Admin\NavBarController@first');  //展示顶部导航栏
    Route::get('/low','Admin\NavBarController@low');    //展示底部导航栏
    Route::get('/nav','Admin\NavBarController@barAdd'); //添加导航栏
    Route::post('/nav','Admin\NavBarController@addBar'); //执行添加导航栏
    Route::get('/upd/{id}','Admin\NavBarController@upd')->name('edit');    //修改顶部导航栏页面
    Route::get('/edit/{id}','Admin\NavBarController@edit'); //修改底部导航栏页面
    Route::post('/upd','Admin\NavBarController@update');  //执行修改导航栏
    Route::post('/edit','Admin\NavBarController@editDo'); //执行修改底部导航栏
    Route::get('/del/{id}','Admin\NavBarController@del');   //删除顶部导航栏
    Route::get('/delete/{id}','Admin\NavBarController@delete');   //删除底部导航栏

    //后台-----轮播图
    Route::get('/thump','Admin\ThumpController@first');     //展示顶部轮播图
    Route::get('/lotmp','Admin\ThumpController@low');   //展示底部轮播图
    Route::get('tmp','Admin\ThumpController@tmpAdd');   //添加轮播图
    Route::post('tmp','Admin\ThumpController@addTmp');  //执行添加轮播图
    Route::post('soft','Admin\ThumpController@soft');    //给图片进行软删除

    //后台-----栏目
    Route::get('/column','Admin\ColumnController@first');   //展示栏目
    Route::get('/col','Admin\ColumnController@colAdd');     //添加栏目
    Route::post('/col','Admin\ColumnController@addCol');    //执行添加栏目
    Route::get('/upcol/{id}','Admin\ColumnController@upCol');    //修改栏目
    Route::post('/upcol','Admin\ColumnController@colUp');   //执行修改
    Route::post('/decol','Admin\ColumnController@colDe');   //软删除栏目

    //后台-----专栏
    Route::get('/report','Admin\ReportController@first');   //展示专栏
    Route::get('/rep','Admin\ReportController@repAdd');     //添加专栏
    Route::post('/rep','Admin\ReportController@addRep');    //执行添加专栏
    Route::get('/port/{id}','Admin\ReportController@repUp');      //修改专栏
    Route::post('/port','Admin\ReportController@upRep');     //执行修改
    Route::post('/por','Admin\ReportController@repDe');     //执行软删除专栏

});

//前台
Route::get('/first','Index\IndexController@first');     //前台首页
Route::get('/index/about','Index\IndexController@about');     //关于我们
Route::get('/index/news','Index\IndexController@news');     //新闻展示
