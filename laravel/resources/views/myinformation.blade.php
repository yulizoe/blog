@extends('ForegroundPublic')

@section('title')
     个人中心
@stop


@section('rightcontent') 

   
    <div>
        <form action="/postEditUser/{{$user->id}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <p>
                用户名：<input type="text" name="name" value="{{$user->name}}" />
            </p>
            <p>
                邮箱：<input type="text" name="email" value="{{$user->email}}" />
            </p>
            {{-- <p>
                密码：<input type="password" name="password" id="" value="{{$user->password}}" />
            </p> --}}
            <p>
                <input type="submit" value="提交修改" />
            </p>
        </form>
    </div>

@stop



