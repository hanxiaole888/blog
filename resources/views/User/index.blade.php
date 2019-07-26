@extends('Public.head')
@section('content')
<div>
    <div class="card-header">
        用户列表
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>编号</th>
                <th>昵称</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td scope="row">{{$user['id']}}</td>
                    <td>{{$user['name']}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-danger">删除</button>
                            <a href="{{route('user.show',$user)}}" class="btn btn-secondary">查看</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer text-muted">
        {{$users->links()}}
    </div>
</div>
@endsection
