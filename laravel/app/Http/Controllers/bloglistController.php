<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Bloglist;
use Request;
use Response;
use Input;
class BloglistController extends Controller
{
	//博文全览
	public function view(){
		// dd(\Auth::user());
		$bloglists=Bloglist::latest()->paginate(3);
		return view('bloglist')->with('bloglists',$bloglists);
	}

 	//我的博文
	public function myblog($author){
		$bloglists=Bloglist::where('author','=',$author)->latest() ->paginate(3);
		return view('bloglist')->with('bloglists',$bloglists);
	}

    //博文类别
    public function blogclass($bclass){
    	$bloglists=Bloglist::where('bclass','=',$bclass)->latest()->paginate(3);
    	return view('bloglist')->with('bloglists',$bloglists);
    	
    }

	//博文详情
	public function detail($id){
		return view('blogdetail')->withBloglist(Bloglist::find($id));
	}

	//显示发表博文页面
	public function publish(){
		return view('publish');
	}

	//添加博文列表到数据库中
	public function add(Requests\StoreBlogPostRequest $request){       
        //1.获取表单数据
        $bloglist=new Bloglist();
        $bloglist->btitle=Request::input('btitle');
        $bloglist->bcontent=Request::input('bcontent');
        $bloglist->bclass=Request::input('bclass');
        $bloglist->author=Request::input('author');
        //2.数据插入到博客列表数据库中
        
        $bloglist->save();
        //3.页面重定向到自己的博客列表页面
        return redirect('/allblog');       
    }

  //显示搜索的博文
  public function search($keywords){
     $bloglists=Bloglist::where('btitle','like','%'.$keywords.'%')->latest()->paginate(3);
     return view('bloglist')->with('bloglists',$bloglists);
  }

  

//后台
  public function index()
  {
    return Response::json(Bloglist::get());
  }


  public function store()
  {
    Bloglist::create(array(
      'author' => Input::get('author'),
      'btitle' => Input::get('btitle'),
      'bclass' => Input::get('bclass'),
      'bcontent' => Input::get('bcontent')
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
    Bloglist::destroy($id);
  
    return Response::json(array('success' => true));
  }


  public function show($id)
    { 
         return Response::json(array(Bloglist::find($id)));
    }

}