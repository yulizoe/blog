@extends('comment')

@section('content')
	<div>
		<form action="/add" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}" />
			<p>
				ID：<input type="text" name="id" />
			</p>
			<p>
				作者：<input type="text" name="CUser" />
			</p>
			<p>
				内容：<textarea name="CContent" id="" cols="30" rows="10"></textarea>
			</p>
			<p>
				<input type="submit" value="提交" />
			</p>
		</form>
	</div>
@stop