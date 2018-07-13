<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //文章列表
    public function index()
    {
        $articles = Article::paginate(5);
        return view('article/index',compact('articles'));
    }
    //添加文章
    public function create()
    {
        return view('article/create');
    }

    public function store(Request $request)
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
        //var_dump($request->input());
        $model = Article::create([
            'title'=>$request->title,
            'content'=>$request->input('content')
        ]);
        //var_dump($model);
        //设置提示信息
        session()->flash('success','添加成功');
        return redirect()->route('articles.index');
    }
    //查看用户信息
    public function show(Article $article,Request $request)//依赖注入
    {
        return view('article/show',compact('article'));
    }
    //修改文章
    public function edit(Article $article)
    {
        return view('article/edit',compact('article'));
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
            'content'=>$request->content
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
