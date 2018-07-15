<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ArticleController extends Controller
{
    //文章列表
    public function index()
    {
        //dd(storage_path());
        //dd(url()->current());
        //dd(action('DbController@index'));
        $articles = Article::where('title','like','%西游%')->paginate(1);
        return view('article/index',compact('articles'));
    }
    //添加文章
    public function create()
    {
        $students = Student::all();
        return view('article/create',compact('students'));
    }

    public function store(Request $request)
    {
        //return back()->withInput();
        //数据验证
        $this->validate($request,[
            'title'=>'required|max:10',
            'content'=>'required',
            //验证码
            'captcha'=>'required|captcha'

        ],[
            'title.required'=>'标题不能为空',
            'title.max'=>'标题不能超过10个字',
            'content.required'=>'内容不能为空',
            'captcha.required'=>'验证码未填写',
            'captcha.captcha'=>'验证码不正确',
        ]);
        //var_dump($request->input());
        //处理上传文件
        $file = $request->logo;
        $fileName = $file->store('public/logo');

        $model = Article::create([
            'title'=>$request->title,
            'author_id'=>$request->author_id,
            'content'=>$request->input('content'),
            'logo'=>$fileName
        ]);
        //var_dump($model);
        //设置提示信息
        //session()->flash('success','添加成功');
        return redirect()->route('articles.index')->with('success','添加成功');
    }
    //查看用户信息
    public function show(Article $article,Request $request)//依赖注入
    {
        return view('article/show',compact('article'));
    }
    //修改文章
    public function edit(Article $article)
    {
        $students = Student::all();
        return view('article/edit',compact('article','students'));
    }

    public function update(Article $article,Request $request)
    {
        //数据验证
        $this->validate($request,[
            'title'=>'required|max:10',
            'content'=>'required'
        ],[
            'title.required'=>'标题不能为空',
            'title.max'=>'标题不能超过10个字',
            'content.required'=>'内容不能为空',
        ]);
        $article->update([
            'title'=>$request->title,
            'content'=>$request->input('content')
        ]);
        //var_dump($model);
        //设置提示信息
        session()->flash('success','更新成功');
        return redirect()->route('articles.show',[$article]);
    }
    //删除
    public function destroy(Article $article)
    {
        $article->delete();
        session()->flash('success','删除成功');
        return redirect()->route('articles.index');
    }
}
