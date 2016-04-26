<link rel="stylesheet" href="http://localhost:8000/css/bootstrap.min.css" />
<link rel="stylesheet" href="http://localhost:8000/css/ForegroundPublic.css" />
@extends('layout')

@section('title')
     前台模板
@stop


@section('header')

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Blog</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">welcome! {{Auth::user()->name}}</a></li>
        <li><a href="#"><SPAN id="Clock"></SPAN></a></li>
      </ul>
    

      <ul class="nav navbar-nav navbar-right">
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" id="key" class="form-control" placeholder="输入关键字">
        </div>
          <div class="dropdown" style="display:inline-block;">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              搜索
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" >
              <li><a id="searchT" class="btn btn-default" >按标题搜索</a></li>
              <li><a id="searchA" class="btn btn-default" >按作者搜索</a></li>
              <li><a id="searchC" class="btn btn-default" >按内容搜索</a></li>
              <li><a id="searchD" class="btn btn-default" >按时间搜索</a></li>
            </ul>
          </div>
      </form>
        <li><a href="/auth/logout">退出</a></li>
        <li><a href="/homepage">返回首页</a></li>
        
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </div>
</nav>
@stop


@section('leftcontent')
      <div class="list-group" id="nav">
          <a href="/editUser/{{Auth::user()->id}}" class="list-group-item"  >个人中心</a>
          <a href="/allblog" class="list-group-item ">博文全览</a>
          <a href="/myblog/{{Auth::user()->name}}" class="list-group-item">我的博文列表</a>
          <a href="/publish" class="list-group-item">发表博文</a>               
      </div>
        <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            博文分类浏览
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="/blogclass/{{1}}">读书</a></li>
            <li><a href="/blogclass/{{2}}">旅游</a></li>
            <li><a href="/blogclass/{{3}}">电影</a></li>
            <li><a href="/blogclass/{{4}}">科技</a></li>
            <li><a href="/blogclass/{{5}}">时尚</a></li>
          </ul>
      </div>
@stop

@section('footer')
     {{--  <nav class="navbar navbar-inverse navbar-fixed-bottom">
          <div class="navbar-inner navbar-content-center" >
              <p class="text-muted credit " style="padding: 10px; text-align:center;">
                  版权所有 © 2016 Blog. 重庆翼路科技有限公司
              </p>
          </div>
      </nav> --}}
@stop

<script src="http://localhost:8000/js/jquery.min.js"></script>
<script type="text/javascript" src="http://localhost:8000/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://localhost:8000/js/ForegroundPublic.js"></script>



