<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    //允许赋值和修改的字段
    protected $fillable = ['title','content','author_id','logo'];


    //建立和学生的关系 一对多（反向）   一（多）对一   articles.author_id ---> students.id
    public function student()
    {
        return $this->belongsTo(Student::class,'author_id','id');
        //Student::class ==== 'App\Models\Student'
    }

    //获取logo的真实地址
    public function logo(){
        return Storage::url($this->logo);
    }

    public function author_name()
    {
        return $this->student?$this->student->name:'佚名';
    }
}
