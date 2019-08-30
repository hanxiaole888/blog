@extends('Public.head')
@section('content')

    <div class="card">
        <div class="card-header">
            <h1 class="text-center">{{$user->name}}</h1>
            <div class="text-center">
                <a href="" class="btn btn-success">关注</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>内容</th>
                    <th width="100">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{$blog['content']}}</td>
                        @can('delete',$blog)
                            <td>
                                <form action="{{route('blog.destroy',$blog)}}" method="post">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger">删除</button>
                                </form>
                            </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
            {{$blogs->links()}}
        </div>
    </div>
@endsection
