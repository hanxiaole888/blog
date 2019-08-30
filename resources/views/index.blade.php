@extends('Public.head')
@section('content')
    @auth
    <form action="{{route('blog.store')}}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                发布博客
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">内容</label>
                    <textarea class="form-control" name="content" id="" rows="3"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">发布</button>
            </div>
        </div>
    </form>
    @endauth
    <div>
        <div class="card-header">
            博客列表
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
                @foreach($data as $val)
                    <tr>
                        <td>{{$val['content']}}</td>
                        <td>{{$val->user->name}}</td>

                        <td>
                            <a href="{{route('user.show',$val->user->id)}}" class="btn btn-secondary">查看</a>
                            @can('delete',$val)
                            <form action="{{route('blog.destroy',$val)}}" method="post">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger">删除</button>
                            </form>
                            @endcan
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
            {{$data->links()}}
        </div>
    </div>
@endsection
