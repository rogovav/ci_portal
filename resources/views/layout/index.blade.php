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

<div id="wrapper" class="animate">
    <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark justify-content-between">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/hd.png') }}" height="40"
                 class="d-inline-block align-top mt-0 mb-0" alt="">
        </a>
        <button class="navbar-toggler navbar-toggler ml-auto hidden-sm-up float-xs-right" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">

            <ul class="navbar-nav ml-md-auto d-md-flex justify-content-between w-50 float-right text-right">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mission.index') }}" title="Cart">
                        Заявки </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}" title="Люди">
                        Люди
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('wiki.index') }}" title="WIKI"> WIKI </a>
                </li>
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="{{ route('rest.index') }}" title="Календарь отпусков"> Отпуска </a>--}}
                {{--</li>--}}
                <li class="nav-item dropdown d-flex show align-self-end" style="cursor: pointer">
                    <a class="nav-link dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false"><img
                            src="{{ asset('images/avatars/users/' . Auth::user()->avatar) }}" alt=""
                            class="group-user-avatar-layout"> {{ Auth::user()->fio }}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('user.show', Auth::id()) }}">Профиль</a>
                        @if(Auth::user()->super)<a class="dropdown-item"
                                                   href="{{ url("admin") }}">Администрирование</a>@endif
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Выйти</a>
                    </div>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </nav>
    <div class="container-fluid pt-2">
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
