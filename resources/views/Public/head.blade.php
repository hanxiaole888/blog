<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
<div class="container">
{{--    头部--}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{route('home')}}">首页</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">后盾人</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('user.index')}}">用户列表</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                @auth
                    <a href="{{route('user.edit',auth()->user())}}" class="btn btn-danger my-2 my-sm-0 mr-2" type="submit">修改个人资料</a>
                    <a href="{{route('logout')}}" class="btn btn-danger my-2 my-sm-0 mr-2" type="submit">退出登录</a>
                @else
                    <a href="{{route('user.create')}}" class="btn btn-danger my-2 my-sm-0 mr-2" type="submit">注册</a>
                    <a href="{{route('login')}}" class="btn btn-success my-2 my-sm-0" type="submit">登录</a>
                @endauth
            </form>
        </div>
    </nav>
{{--    内容--}}
    @include('Public._errors')
    @include('Public._message')
    <div>
        @yield('content')
    </div>
</div>
<script src="/js/app.js"></script>
</body>
</html>
