
@extends('ForegroundPublic')
<link rel="stylesheet" href="http://localhost:8000/css/bootstrap.min.css" />
@section('title')
     博文详情
@stop

@section('rightcontent')  
        {{-- 博文详情 --}}   
         <div class="panel panel-default">
            <div class="panel-heading" style="font-weight:900;"><a href="/blogdetail/{{$bloglist->id}}">{{$bloglist->btitle}}</a></div>
            <div id="o+{{$bloglist->id}}" class="panel-body" style="word-break:break-all;min-height:400px;">
              {{$bloglist->bcontent}} 
            </div>
            <div class="panel-footer" style="text-align:right;">
            <span>{{$bloglist->author}}</span>&nbsp;
            <span>{{$bloglist->updated_at}}</span>&nbsp;
            <span>阅读(0)</span>&nbsp;
            
            </div>
         </div>  
         <textarea style="display:none;" id="{{$bloglist->id}}" style="height:100px;width:100px;background:yellow;"></textarea> 
 {{-- 该脚本是为了显示出博客样式 --}}
        <script type="text/javascript">
            $(document).ready( function() {
                 var bcontent=document.getElementById('{{$bloglist->id}}');
                 var o=document.getElementById('o+{{$bloglist->id}}');
                 var content='{{$bloglist->bcontent}}';
                 bcontent.innerHTML=content;
                 o.innerHTML=bcontent.value;
            });
        </script>
 {{-- 评论区域 --}}
<div>
		<form action="/blogdetail/{{$bloglist->id}}" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}" />
		   {{--  隐藏评论人字段 --}}
			<input type="text" name="author" value="{{Auth::user()->name}}" style="display:none;"/>
			{{--  隐藏被评论帖子id --}}
			<input type="text" name="bid" value="{{$bloglist->id}}" style="display:none;" />
			
			<div class="row">
		          <div class="col-sm-5">
		              <textarea name="ccontent" id="" cols="50%" rows="10"></textarea> 
		              <p style="text-align:right;">
		              <br />
				  <input type="submit" class="btn " value="提交评论" />
			      </p> 
		          </div>
		         
		          
		    </div>
		</form>
	</div>
{{-- 表单验证输出错误信息 --}}
	<div class="row">
		<div class="col-md-12">
		     @if($errors -> any()) 
		        <ul class="list-group">
		        	@foreach($errors->all() as $error)
		                <li class="list-group-item list-group-item-danger">{{$error}}</li>
		        	@endforeach
		        </ul>
		       @endif
		<div>       
	</div>    
 {{-- 评论展示 --}}
          <div class="panel panel-default">
            <div class="panel-heading" ><a href="/viewcomment/{{$bloglist->id}}">查看评论</a></div>
         </div>
@stop
