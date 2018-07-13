<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //允许赋值和修改的字段
    protected $fillable = ['title','content'];


    //建立和学生的关系 一对多（反向）   一（多）对一   articles.author_id ---> students.id
    public function student()
    {
        return $this->belongsTo(Student::class,'author_id','id');
        //Student::class ==== 'App\Models\Student'
    }
}
