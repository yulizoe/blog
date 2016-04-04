@extends('ForegroundPublic')

@section('title')
     评论列表
@stop

@section('rightcontent') 
	@foreach ($comments as $comment)
         <div class="panel panel-default">
            <div class="panel-heading">评论者：{{$comment-> author }} </div>
            <div class="panel-body" style="height:100px;word-break:break-all;">

              {{$comment-> ccontent}}
            </div>
            <div class="panel-footer" style="text-align:right;"><span>{{$comment->updated_at}}</span>&nbsp;<span>阅读(0)</span>&nbsp;<a href="#">删除</a></div>
         </div>
    @endforeach 
@stop



