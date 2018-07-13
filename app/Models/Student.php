<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    //学生和文章的关系 一对多
    public function articles()
    {
        return $this->hasMany(Article::class,'author_id','id');
    }
}
