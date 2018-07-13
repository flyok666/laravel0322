<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //学生列表
    public function index()
    {
        //查看学生的文章列表
        //$student = Student::find(3);
        //var_dump($student->articles);exit;


        $students = DB::table('students')->get();
        return view('students/index',compact('students'));
        //compact('students') ====   ['students'=>$students]
    }
    //添加学生
    public function add()
    {
        return view('students/add');
    }

    public function save(Request $request)
    {
        $name = $request->name;
        $age = $request->age;
        DB::table('students')->insert([
            'name'=>$name,
            'age'=>$age
        ]);
        return redirect('/students');
    }
}
