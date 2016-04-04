@extends('ForegroundPublic')

@section('title')
     博文列表
@stop

@section('rightcontent')      
          
        @foreach ($bloglists as $bloglist)
         <div class="panel panel-default">
            <div class="panel-heading" style="font-weight:900;" ><a href="/blogdetail/{{$bloglist->id}}">{{$bloglist->btitle}}</a></div>
            <div id="o+{{$bloglist->id}}" class="panel-body"  style="height:100px;overflow:hidden;word-break:break-all;">
              {{$bloglist->bcontent}} 
            </div>
            <div class="panel-footer" style="text-align:right;">
            <span>{{$bloglist->author}}</span>&nbsp;
            <span>{{$bloglist->updated_at}}</span>&nbsp;
            {{-- <span>阅读(0)</span>&nbsp; --}}
            <a href="/blogdetail/{{$bloglist->id}}">评论(0)</a>
            <a href="/delete/{{$bloglist->id}}">删除</a>
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

        @endforeach  
        <div style="text-align:center;">
             {!! $bloglists->render() !!}
        </div>
   
        
 


@stop

