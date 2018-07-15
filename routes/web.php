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

//day3
Route::get('/day3','Day3Controller@index')->name('day3');
//Route::get('/test','Day3Controller@test');

//响应
Route::get('/response',function (){
    //$students = \App\Models\Student::all();
    //$student = \App\Models\Student::find(1);
//    return $students;
    //return response('无权限',403);
    //return response('设置cookie')->cookie('name','zhangsan');
//    dd(request()->cookie('name'));
    //return redirect('/day3');//路由地址
    //return redirect()->route('day3',['name'=>'张三']);
    //return redirect()->route('day3',['id'=>$student->id]);//命名路由
    //return redirect()->action('Day3Controller@test');


    //视图响应
    //$article = \App\Models\Article::find(6);
    //return view('article/show',['article'=>$article]);
    //return response()->json(['name'=>'zhangsan']);
    //return ['name'=>'zhangsan'];
    //return response()->download('pure.tar.gz')->deleteFileAfterSend(true);
    return response()->file('head6.jpg');
});