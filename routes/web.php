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

/*Route::get('/', function () {
    return view('welcome');
});*/

//首页  关于我们  帮助
Route::get('/','StaticController@index');
//  /请求交给 StaticController的index方法来处理

Route::get('about','StaticController@about');//关于
Route::get('/help','StaticController@help');//帮助

//学生列表
Route::get('/students','StudentController@index');
//添加学生
Route::get('/student/add','StudentController@add')->name('addStudent');
Route::post('/student/save','StudentController@save')->name('saveStudent');

//文章资源路由
Route::resource('articles','ArticleController');

//
Route::get('/db','DbController@index');