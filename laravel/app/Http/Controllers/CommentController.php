<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Comment;
use Request;
use Response;
use Input;

class CommentController extends Controller
{

    // public function index(){
    //     //获取留言内容
    //     $comments=Comment::all();
    //     //var_dump($comments);
    //     //显示视图(附加留言内容)
    //     return view('index')->with('comments',$comments);
    // }

    public function view($id){
        //获取当前id所指明的留言信息
        //显示视图
        //return view('view')->withComment(Comment::find($bid));
        $comments=Comment::where('bid','=',$id)->latest()->get();
        return view('view')->with('comments',$comments);
    }

    public function add(Requests\StoreCommentPostRequest $request){
        //添加留言到数据库中
        //
        //1.获取表单数据
        $comment=new Comment();
        $comment->author=Request::input('author');
        $comment->ccontent=Request::input('ccontent');
        $comment->bid=Request::input('bid');
        //2.数据插入到留言数据库中
        
        $comment->save();
        //3.页面重定向到首页
         return redirect('/allblog');
        

    }

    public function delete($id){
        //1.在数据库中删除指定id的数据
        Comment::destroy($id);
        
        //2.重定向到首页
        return redirect('/');
    }


    public function edit($id){
        //获取当前主键id的留言记录，显示成默认值的形式，交给edit视图模型
        return view('edit')->withComment(Comment::find($id));
    }


    public function postEdit($id){
          //1.获取表单数据
        $comment=Comment::find($id);
        $comment->id=Request::input('id');
        $comment->CUser=Request::input('CUser');
        $comment->CContent=Request::input('CContent');
        //2.数据插入到留言数据库中
        
        $comment->save();
        //3.页面重定向到首页
        return redirect('/');
    }




//后台
  public function index()
  {
    return Response::json(Comment::get());
  }


public function store()
  {
    Comment::create(array(
      'author' => Input::get('author'),
      'bid' => Input::get('bid'),
      'ccontent' => Input::get('ccontent')
    ));
  
    return Response::json(array('success' => true));
  }
  
  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return Response
   */
  public function destroy($id)
  {
    Comment::destroy($id);
  
    return Response::json(array('success' => true));
  }
  
  public function show($id)
    { 
         return Response::json(array(Comment::find($id)));
    }

  // public function getCommentDetail($id)
  //   {
  //        return Response::json(Comment::get());
  //   }


    // public function index(){

    //     //return view('index')->with('name','laravel5框架');
    //     return view('index')->withName('laravel5框架');
    // }

    // public function getIndex(){

    //     return 'comment/index';
    // }

    // public function getView($id=1){
    //     return 'comment/view/'.$id;

    // }

    // public function getViewComment(){
    //     return 'msg/view-comment';
    // }

    // public function postAdd(){

    // }
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     return "CommentController/index"; 
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     return 'CommentContrller/create';
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id=1)
    // {
    //     return 'CommentController/show/'.$id;
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     return 'MsgController/edit/'.$id;
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
