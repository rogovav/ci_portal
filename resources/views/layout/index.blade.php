<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HelpDesk Center "Internet"</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
    @yield('css')
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
</head>
<body>

<div id="wrapper" class="animate open">
    <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark pb-1 pt-1">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/hd.png') }}" height="40"
                 class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav animate side-nav open">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}" title="Cart"><i class="fas fa-tachometer-alt"></i>
                        Панель</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mission.index') }}" title="Cart"><i class="fas fa-tasks"></i>
                        Заявки</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}" title="Люди"><i class="fas fa-user-tie"></i>
                        Люди </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('wiki.index') }}" title="WIKI"><i
                            class="fas fa-graduation-cap"></i> WIKI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('rest.index') }}" title="Календарь отпусков"><i
                            class="fas fa-umbrella-beach"></i> Отпуска</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("reports") }}" title="Отчеты"><i class="fas fa-file-alt"></i>
                        Отчеты </a>
                </li>
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="{{ url("chats") }}" title="Чат"><i class="fas fa-comments"></i> Чат--}}
                {{--<i--}}
                {{--class="fas fa-comments shortmenu animate"></i></a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="" title="Склад"><i class="fas fa-warehouse"></i> Склад <i--}}
                {{--class="fas fa-warehouse shortmenu animate"></i></a>--}}
                {{--</li>--}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("admin") }}" title="Администрирование"><i
                            class="fas fa-users-cog"></i> Service </a>
                </li>

            </ul>

            <ul class="navbar-nav ml-md-auto d-md-flex">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.show', Auth::id()) }}"><img
                            src="{{ asset('images/avatars/users/' . Auth::user()->avatar) }}" alt=""
                            class="group-user-avatar-layout"> {{ Auth::user()->fio }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-key"></i> Выйти</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        @yield('content')
    </div>
</div>
<script src="{{ asset("js/fontawesome.js") }}"></script>
<script src="{{ asset("js/jquery-3.3.1.js") }}"></script>
<script src="{{ asset("js/popper.min.js") }}"></script>
<script src="{{ asset("js/bootstrap.min.js")  }}"></script>
@yield('js')
<script src="{{asset("js/app.js")}}"></script>
</body>
</html>
