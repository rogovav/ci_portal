<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal CI</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
    @yield('css')
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
</head>
<body>

<div id="wrapper" class="animate">
    <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
        <span class="navbar-toggler-icon leftmenutrigger"></span>
        <a class="navbar-brand" href="#">PORTAL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav animate side-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("") }}" title="Cart"><i class="fas fa-tachometer-alt"></i>
                        Панель <i
                            class="fas fa-tachometer-alt shortmenu animate"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("missions") }}" title="Cart"><i class="fas fa-tasks"></i>
                        Заявки <i
                            class="fas fas fa-tasks shortmenu animate"></i></a>
                </li>
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="{{ url("groups") }}" title="Группы"><i class="fas fa-users"></i>--}}
                {{--Группы <i--}}
                {{--class="fas fa-users shortmenu animate"></i></a>--}}
                {{--</li>--}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("users") }}" title="Люди"><i class="fas fa-user-tie"></i> Люди <i
                            class="fas fa-user-tie shortmenu animate"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("wiki") }}" title="WIKI"><i
                            class="fas fa-graduation-cap"></i> WIKI <i
                            class="fas fa-graduation-cap shortmenu animate"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("calendar") }}" title="Календарь"><i
                            class="fas fa-calendar-alt"></i> Календарь <i
                            class="fas fa-calendar-alt shortmenu animate"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('rest') }}" title="Календарь отпусков"><i class="fas fa-umbrella-beach"></i> Отпуска <i
                                class="fas fa-umbrella-beach shortmenu animate"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("reports") }}" title="Отчеты"><i class="fas fa-file-alt"></i>
                        Отчеты <i
                            class="fas fa-file-alt shortmenu animate"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("chats") }}" title="Чат"><i class="fas fa-comments"></i> Чат
                        <i
                            class="fas fa-comments shortmenu animate"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" title="Склад"><i class="fas fa-warehouse"></i> Склад <i
                            class="fas fa-warehouse shortmenu animate"></i></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url("admin") }}" title="Администрирование"><i class="fas fa-users-cog"></i> Service <i
                            class="fas fa-users-cog shortmenu animate"></i></a>
                </li>

            </ul>

            <ul class="navbar-nav ml-md-auto d-md-flex">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.edit', Auth::id()) }}"><img
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
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card">
                    <div class="card-body card-body-task no-padding">
                        <div class="card-body-label card-task"><a href="{{ route('user.edit', Auth::id()) }}"><i
                                    class="fas fa-tag fa-3x"></i></a></div>
                        <div class="card-body-text"><span>Заданий</span><br><span
                                class="real-time-counter">{{ Auth::user()->todos->where('date', '>=', date('Y-m-d'))->where('date', '<=', date('Y-m-d', strtotime(date('Y-m-d') . "+7 days")))->where('success', false)->count() }}</span>
                            <hr>
                            <span
                                class="real-time-counter-user">{{ Auth::user()->todos->where('date', date('Y-m-d'))->where('success', false)->count() }}</span>
                            <span> на сегодня</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card card-body-message">
                    <div class="card-body no-padding">
                        <div class="card-body-label card-message"><a href=""><i class="fas fa-envelope fa-3x"></i></a>
                        </div>
                        <div class="card-body-text"><span>СООБЩЕНИЙ</span><br><span class="real-time-counter">21</span>
                            <hr>
                            <span class="real-time-counter-user">10</span>
                            <span> Ваши</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card">
                    <div class="card-body card-body-wiki no-padding">
                        <div class="card-body-label card-wiki"><a href=""><i
                                    class="fas fa-graduation-cap fa-3x"></i></a></div>
                        <div class="card-body-text"><span>СТАТЕЙ</span><br><span class="real-time-counter">35</span>
                            <hr>
                            <span class="real-time-counter-user">4</span>
                            <span> написано Вами</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card">
                    <div class="card-body card-body-users no-padding">
                        <div class="card-body-label card-users"><a href=""><i class="fas fa-users fa-3x"></i></a></div>
                        <div class="card-body-text"><span>ПОЛЬЗОВАТЕЛЕЙ</span><br><span
                                class="real-time-counter">{{ $users_layout['all'] }}</span>
                            <hr>
                            <span class="real-time-counter-user">{{ $users_layout['online'] }}</span>
                            <span> on-line</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
