@extends('Public.head')
@section('content')
    <form action="{{route('user.update',$user)}}" method="post">
        @csrf
        @method('PUT')
        <duv class="card">
            <div class="card-header">修改资料</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">昵称</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="">密码</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="">确认密码</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">修改</button>
            </div>
        </duv>
    </form>
@endsection
