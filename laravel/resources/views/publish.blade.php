<link rel="stylesheet" type="text/css" href="css/font-awesome-4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/default.css">
<link href="css/editor.css" type="text/css" rel="stylesheet"/>
@extends('ForegroundPublic')

@section('title')
     发表博文
@stop

	
@section('rightcontent')

<form action="/publish" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}" />
<div class="input-group">
  <input type="text" class="form-control" placeholder="Blog Title" aria-describedby="basic-addon2" name="btitle">
  <span class="input-group-addon" id="basic-addon2">博文标题</span>
</div>



<div class="htmleaf-container">
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 nopadding">
				    	<textarea id="txtEditor" name="bcontent" ></textarea> 
				    </div>
				    <div class="col-lg-4 nopadding">
				    	
				    </div>
				</div>  
			</div>
		</div>
	</div>	
</div>

<input type="text" name="author" value='{{Auth::user()->name}}' style="display:none;" />
<br />
<div class="form-group" style="padding-bottom:50px;">
    <div class="col-md-10 control-label">
        <select name="bclass">
		  <option value ="1">读书</option>
		  <option value ="2">旅游</option>
		  <option value ="3">电影</option>
		  <option value ="4">科技</option>
		  <option value ="5">时尚</option>
		</select>
    </div>
    <div class="col-md-2">
        <button type="submit" id="submit" class="btn btn-default ">发表博文</button>         
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
</div>

<script src="js/editor.js"></script>
<script type="text/javascript">
$(document).ready( function() {
    
 $("#txtEditor").Editor();  

//以下代码是为了把编辑器里的值赋给隐藏的input的value,最后方便传递给数据库
 var btn=document.getElementById("txtEditor");
 var sub=document.getElementById("submit");
     sub.addEventListener('click', function () {
               btn.value=document.getElementById("Editor-editor").innerHTML;
            }, false);             
 
});
</script>
</form>
@stop