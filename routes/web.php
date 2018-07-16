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
//Route::middleware(['auth'])->group(function(){
    Route::resource('articles','ArticleController');

//});


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


//会话管理
Route::get('login','SessionController@login')->name('login');
Route::post('login','SessionController@store')->name('login');
Route::delete('logout','SessionController@logout')->name('logout');

//添加测试用户
//Route::get('test','SessionController@test');
Route::get('user/info','SessionController@info');

//Route::get('login','SessionController@login')->name('login');
//Route::post('login','SessionController@login')->name('login');
//Route::match(['get','post'],'login','SessionController@login');
//Route::any('login','SessionController@login');
// user-login  login

/*Route::any('user-login',function (){
    return redirect('login');
});*/
//Route::redirect('/user-login','/login',302);
//Route::view('welcome','welcome');

//Route::get('article/view/{id}',function ($id=0){
//    return $id;
//});
//Route::namespace('Admin')->group(function (){
//Route::prefix('admin')->group(function (){
//    Route::get('add','AdminController@add');
//    Route::get('index','AdminController@index');
//});

//});

Route::get('route',function (){
    $route = Route::current();
    //dd($route);
    $name = Route::currentRouteName();
    //dd($name);
    $action = Route::currentRouteAction();
    dd($action);
})->name('route_name');

//发送邮件
Route::get('email',function (){
    /*$r = \Illuminate\Support\Facades\Mail::to('llko08@163.com')//发给谁
        ->from([
            'address'=>'llko08@163.com',
        'name'=>'llko08'
    ])
        //->cc($moreUsers)
        //->bcc($evenMoreUsers)
        ->send('尊敬的 182****7735：
 
您的服务器47.104.191.15（iZm5e6o5gidy...）存在异常登录行为：详情可登录云盾-态势感知控制台进行查看和处理，如果确认是您自己在登录，可忽略该短信。');*/
    /*$r = \Illuminate\Support\Facades\Mail::raw('您的服务器存在<span style="color: red">异常</span>登录行为',function ($message){
        $message->subject('登录正常提醒2');
        $message->to('llko08@163.com');
        $message->from('llko08@163.com', 'llko08');
        //$message->sender($address, $name = null);
        //$message->to($address, $name = null);
        //$message->cc($address, $name = null);
        //$message->bcc($address, $name = null);
        //$message->replyTo($address, $name = null);
        //$message->subject($subject);
       // $message->priority($level);
        //$message->attach($pathToFile, array $options = []);
    });*/
    $r =\Illuminate\Support\Facades\Mail::send('welcome', ['user'=>'zhangsan'], function ($message) {
        $message->from('llko08@163.com', 'llko08');
        $message->to(['llko08@163.com'])->subject('公司未婚妹子数量报表统计');
    });
    dd($r);
});

//redis
Route::get('redis',function (){
   // \Illuminate\Support\Facades\Redis::set('name','赵云');
    dd(\Illuminate\Support\Facades\Redis::get('name'));
});
