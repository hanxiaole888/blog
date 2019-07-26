@extends('Public.head')
@section('content')
    <form action="{{route('login')}}" method="post">
        @csrf
        <duv class="card">
            <div class="card-header">用户登录</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">邮箱</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="">密码</label>
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">登录</button>
            </div>
        </duv>
    </form>
@endsection
