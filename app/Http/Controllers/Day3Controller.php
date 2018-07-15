<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Day3Controller extends Controller
{
    //
    public function index(Request $request)
    {
        //session
        //$session = $request->session();
        //$session = session();
        //$name = $session->get('name','zhangsan');
        //var_dump($session);
        //
        //session()->get('name'); session('name');

        //dd(session('name','zhangsan'));
        //session()->put('name','张三');session(['name'=>'张三']);
       //session()->push('room.students','1');
        //session()->push('students','王五');
        //$student = session()->pull('room.students');
        //dd($student);
        //session()->push('students.names','1');
        //session()->push('students.names','5');
        //session()->flush();
        //$name = session()->pull('students.names');
        //dump($name);
        //dump(session()->all());

        $name = $request->cookie('name');

        dump($name);
    }

    public function test()
    {
        return 'test';
    }
}
