<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DbController extends Controller
{
    //
    public function index(){
        //select
        //$rows = DB::select('select * from articles where id=? or id=?',[1,2]);
        //$rows = DB::select('select * from articles where id=:id1 or id=:id2',['id1'=>1,'id2'=>2]);
        //$r = DB::insert("insert into articles values (null,?,?,null,null)",['标题1','内容1']);
        //var_dump($r);

        //事务
        /*DB::transaction(function(){
            DB::update("update users set money=money-50 where name=?",['zhangsan']);
            DB::update("update users set money=money+50 where name=?",['lisi']);
        });*/
        /*DB::statement('start transaction');
        try{
            DB::update("update users set money=money-50 where name=?",['zhangsan']);
            DB::update("update users set money=money+50 where name=?",['lisi']);
            DB::statement('commit');
        }catch(\Exception $e){
            DB::statement('rollback');
        }*/

        //查询生成器
        //$rows = DB::table('articles')->get();//select * from articles
        //$row = DB::table('articles')->where('id','>',6)->first();//select * from articles where id>6
        $rows = DB::table('articles')->select('title')->get();//select title from articles
        $titles = DB::table('articles')->pluck('title','id');
        //var_dump($rows);
        var_dump($titles);
        //$users = DB::table('users')->count(); select count(*) from users

        DB::table('articles')->where('id',1)->where()->orwhere();
        DB::table('users')
            ->offset(10)
            ->limit(5)
            ->get(); // limit 10,5;

        $role = true;

        DB::table('users')
            ->when($role, function ($query) use ($role) {
                return $query->where('role_id', $role);
            })
            ->get();


        $query = DB::table('users');
        if($role){
            $query->where('role_id', $role);
        }
        $query->get();
    }
}
