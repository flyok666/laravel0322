<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    //
    public function index()
    {
        return view('static/index',['message'=>'你好']);
    }

    public function about()
    {
        return view('static/about');
    }

    public function help()
    {
        //Article::create(['title'=>'biaoti','content'=>'neirong']);
        return view('static/help');
    }
}
