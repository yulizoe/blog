@extends('comment')

@section('content')
	<div>
		<form action="/edit/{{$comment->id}}" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}" />
			<p>
				ID：<input type="text" name="id" value="{{$comment->id}}" />
			</p>
			<p>
				作者：<input type="text" name="CUser" value="{{$comment->CUser}}" />
			</p>
			<p>
				内容：<textarea name="CContent" id="" cols="30" rows="10">{{$comment->CContent}}</textarea>
			</p>
			<p>
				<input type="submit" value="提交" />
			</p>
		</form>
	</div>
@stop