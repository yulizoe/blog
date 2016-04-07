<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\User;
use Request;
use Response;
use Input;

class UserController extends Controller
{
	//修改个人信息
  
  public function editUser($id){
        //获取当前主键id的留言记录，显示成默认值的形式，交给edit视图模型
        return view('myinformation')->withUser(User::find($id));
    }


  public function postEditUser($id){
          //1.获取表单数据
        $user=User::find($id);
        $user->name=Request::input('name');
        $user->email=Request::input('email');
       // $user->password=Request::input('password');
        //2.数据插入到留言数据库中
        
        $user->save();
        //3.页面重定向到首页
        return redirect('/allblog');
    }



}