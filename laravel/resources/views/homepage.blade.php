<!doctype html>
<html>
	<head>
		<title>博客首页</title>
		<link rel="stylesheet" href="http://localhost:8000/backstage/framework/bootstrap-3.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://localhost:8000/css/homepage.css">
		<link rel="stylesheet" href="http://localhost:8000/css/scroll.css">
	</head>
	<body>
		


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
      <a class="navbar-brand" href="#">Blog首页</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/blogclass/1">读书 </a></li>
        <li><a href="/blogclass/2">旅游 </a></li>
        <li><a href="/blogclass/3">电影 </a></li>
        <li><a href="/blogclass/4">科技 </a></li>
        <li><a href="/blogclass/5">时尚 </a></li>
       {{--  <li><a href="#"><SPAN id="Clock"></SPAN></a></li> --}}
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
            <ul class="dropdown-menu" style="z-index:3000;">
              <li><a id="searchT" class="btn btn-default" >按标题搜索</a></li>
              <li><a id="searchA" class="btn btn-default" >按作者搜索</a></li>
              <li><a id="searchC" class="btn btn-default" >按内容搜索</a></li>
              <li><a id="searchD" class="btn btn-default" >按时间搜索</a></li>
            </ul>
          </div>
      </form>
      <script type="text/javascript">
       window.onload=function(){
        $('#searchT').click(function(){
          if($('#key').val()==''){
           alert('请输入标题关键字');
        }else{
           $('#searchT').attr('href', "/searchT/"+ $('#key').val()); 
        } 
       });

        $('#searchA').click(function(){
          if($('#key').val()==''){
           alert('请输入作者');
        }else{
           $('#searchA').attr('href', "/searchA/"+ $('#key').val()); 
        }
      });

        $('#searchC').click(function(){
          if($('#key').val()==''){
           alert('请输入作者');
        }else{
           $('#searchC').attr('href', "/searchC/"+ $('#key').val()); 
        }
      });

        $('#searchD').click(function(){
          if($('#key').val()==''){
           alert('请输入日期');
        }else{
           $('#searchD').attr('href', "/searchD/"+ $('#key').val()); 
        }
      });

       }
         
      </script>
        <li><a href="/auth/login">登录</a></li>
        <li><a href="/auth/register">注册</a></li>
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </div>
</nav>


<div class="container">
		    <div class="row">
		          <div class="col-sm-12">
		                <div class="scroll_box">
		                	   <!--DIV 盒子模型，高度，宽度，放内容-->
									  <div id="Con">
									  <div class="rollBox">
									     <div class="Cont" id="ISL_Cont">
									      <div class="ScrCont">
									      <a class="mark_left" id="mark_left" href="javascript:;" onmouseover="showmark_left()" onmouseout="hidemark_left()"></a>
		                                  <a class="mark_right" id="mark_right" href="javascript:;"
		                                  onmouseover="showmark_right()" onmouseout="hidemark_right()"></a>
									       <div id="List1">
										   
									    <!--滚动内容开始-->
												<div class="Scroll">
													<img src="images/1.jpg" />
													<div class="Txt"></div>
													<div class="Txt2">
														<p>这是一段描述</p>
														
													</div>
												</div>
										<!--滚动内容结束-->

									       <!--滚动内容开始-->
												<div class="Scroll">
													<img src="images/2.jpg" />
													<div class="Txt"></div>
													<div class="Txt2">
														<p>这是一段描述</p>
														
													</div>
												</div>
												
										<!--滚动内容结束-->
										
									      <!--滚动内容开始-->
												<div class="Scroll">
													<img src="images/3.jpg" />
													<div class="Txt"></div>
													<div class="Txt2">
														<p>这是一段描述</p>
														
													</div>
												</div>
										<!--滚动内容结束-->    
										
										<!--滚动内容开始-->
												<div class="Scroll">
													<img src="images/4.jpg" />
													<div class="Txt"></div>
													<div class="Txt2">
														<p>这是一段描述</p>
														
													</div>
												</div>
												
										<!--滚动内容结束-->
										
									      <!--滚动内容开始-->
												<div class="Scroll">
													<img src="images/5.jpg" />
													<div class="Txt"></div>
													<div class="Txt2">
														<p>这是一段描述</p>
														
													</div>
												</div>
										<!--滚动内容结束-->

									    </div>
									       <div id="List2"></div>
									      </div>
									     </div>
									    </div>
									   
									   <!--左右切换按钮结束-->
									   <a herf="#" class="dirl" id="dirl" onMouseDown="ISL_GoUp()" onMouseUp="ISL_StopUp()" onMouseOut="ISL_StopUp()" 
									   onmouseover="showmark_left()" onmouseout="hidemark_left()"></a>
									   <a herf="#" class="dirr" id="dirr" onMouseDown="ISL_GoDown()" onMouseUp="ISL_StopDown()" onMouseOut="ISL_StopDown()"
									   onmouseover="showmark_right()" onmouseout="hidemark_right()"></a>
									   <!--左右切换按钮结束-->
									   
									<!-- 滚动盒子结束 -->
									  </div>
		                </div>
		          </div>
		          
		    </div>
</div>
<p/>
<div class="container">
		    <div class="row">
		          <div class="col-sm-4">
		                <div class="layout_box">
		                <div class="panel-heading"><a href="/blogclass/1" class="head-color">读书</a></div>
		                	  @foreach ($bloglists1 as $bloglist1)      
                                 <div class="blog_header"><a href="/blogdetail/{{$bloglist1->id}}"> 
                                 <span class="blog_title">{{$bloglist1->btitle}}</span> 
                                 <span class="blog_author"> by {{$bloglist1->author}} </span></a>
                                 </div>          
                              @endforeach  
		                </div>
		          </div>
		          <div class="col-sm-4">
		                <div class="layout_box">
		                <div class="panel-heading"><a href="/blogclass/2" class="head-color">旅游</a></div>
		                	  @foreach ($bloglists2 as $bloglist2)      
                                 <div class="blog_header"><a href="/blogdetail/{{$bloglist2->id}}">
                                 <span class="blog_title">{{$bloglist2->btitle}}</span>
                                 <span class="blog_author"> by {{$bloglist2->author}} </span></a>
                                 </div>          
                              @endforeach  
		                </div>
		          </div>
		          <div class="col-sm-4">
		                <div class="layout_box">
		                <div class="panel-heading"><a href="/blogclass/3" class="head-color">电影</a></div>
		                	  @foreach ($bloglists3 as $bloglist3)      
                                 <div class="blog_header"><a href="/blogdetail/{{$bloglist3->id}}">
                                 <span class="blog_title">{{$bloglist3->btitle}}</span>
                                 <span class="blog_author"> by {{$bloglist3->author}} </span></a>
                                 </div>          
                              @endforeach  
		                </div>
		          </div> 
		    </div>
</div>
<p/>
<div class="container">
		    <div class="row">
		          <div class="col-sm-4">
		                <div class="layout_box">
		                <div class="panel-heading"><a href="/blogclass/4" class="head-color">科技</a></div>
		                	  @foreach ($bloglists4 as $bloglist4)      
                                 <div class="blog_header" ><a href="/blogdetail/{{$bloglist4->id}}">
                                 <span class="blog_title">{{$bloglist4->btitle}}</span>
                                 <span class="blog_author"> by {{$bloglist4->author}} </span></a>
                                 </div>          
                              @endforeach  
		                </div>
		          </div>
		          <div class="col-sm-4">
		                <div class="layout_box">
		                <div class="panel-heading"><a href="/blogclass/5" class="head-color">时尚</a></div>
		                	  @foreach ($bloglists5 as $bloglist5)      
                                 <div class="blog_header"><a href="/blogdetail/{{$bloglist5->id}}">
                                 <span class="blog_title">{{$bloglist5->btitle}}</span>
                                 <span class="blog_author"> by {{$bloglist5->author}} </span></a>
                                 </div>          
                              @endforeach  
		                </div>
		          </div>
		          <div class="col-sm-4">
		                <div class="layout_box">
		                <div class="panel-heading"><a href="/allblog" class="head-color">个人中心</a></div>
		                 <div class="panel-body">
		                       <p>亲爱的博友，登录后即可发表精彩博文哦！</p>
		                   
		                	   {!!Form::open(array('url'=>'/auth/login', 'class'=>'form-signin')) !!}
				                <fieldset>
				                    <div class="form-group">
				                     {!! Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'邮箱')) !!}
				                    </div>
				                    <div class="form-group">
				                     {!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'密码')) !!} 
				                    </div>
				                     {!! Form::submit('马上登录',array('class'=>'btn btn-large btn-success btn-block sbtn')) !!}

				                </fieldset>
				                {!!  Form::close() !!}
				                <hr/>
				                  没有账号？<a href="/auth/register">马上注册</a> 
				            </div>
		                </div>
		          </div> 
		    </div>
</div>

<script src="http://localhost:8000/js/jquery.min.js"></script>
<script type="text/javascript" src="http://localhost:8000/js/bootstrap.min.js"></script>
<script src="http://localhost:8000/js/scroll.js"></script>
	</body>
</html>