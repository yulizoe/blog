@extends('comment')

@section('content')

	<div>
		<a href="/add">添加新留言</a>

	</div>
	<br />
	<div>
		<table border='1' cellspacing='0' cellpadding='20'>
			<tr>
				<th>Id</th>
				<th>发表者</th>
				<th>发表内容</th>
				<th>发表时间</th>	
				<th>操作</th>			
			</tr>
			@foreach ($comments as $comment)
				<tr>
					<td>{{$comment->id}}</td>
					<td>{{$comment->CUser}}</td>
					<td>{{$comment->CContent}}</td>
					<td>{{$comment->updated_at}}</td>
					<td>
						<a href="/view/{{$comment->id}}">查看</a>|
						<a href="/delete/{{$comment->id}}">删除</a>
						<a href="/edit/{{$comment->id}}">编辑</a>
					</td>
					
				</tr>
			@endforeach
		</table>
	</div>
@endsection


