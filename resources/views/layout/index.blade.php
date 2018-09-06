<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
                    <a class="nav-link" href="{{ url("dashboard") }}" title="Cart"><i class="fas fa-tachometer-alt"></i> Панель <i
                            class="fas fa-tachometer-alt shortmenu animate"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-tasks"></i> Заявки <i class="fas fa-tasks shortmenu animate"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url("mission/new") }}">Новая</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url("mission/show") }}">Просмотр</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url("mission/plan") }}">Запланированная</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("group/index") }}" title="Группы"><i class="fas fa-users"></i> Группы <i
                            class="fas fa-users shortmenu animate"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("crew/index") }}" title="Люди"><i class="fas fa-user-tie"></i> Люди <i
                            class="fas fa-user-tie shortmenu animate"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("wiki/index") }}" title="WIKI"><i class="fas fa-graduation-cap"></i> WIKI <i
                            class="fas fa-graduation-cap shortmenu animate"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("calendar/index") }}" title="Календарь"><i class="fas fa-calendar-alt"></i> Календарь <i
                            class="fas fa-calendar-alt shortmenu animate"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("report/index") }}" title="Отчеты"><i class="fas fa-file-alt"></i> Отчеты <i
                            class="fas fa-file-alt shortmenu animate"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("chat/index") }}" title="Чат"><i class="fas fa-comments"></i> Чат <i
                            class="fas fa-comments shortmenu animate"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" title="Склад"><i class="fas fa-warehouse"></i> Склад <i
                            class="fas fa-warehouse shortmenu animate"></i></a>
                </li>

            </ul>
            <ul class="navbar-nav ml-md-auto d-md-flex">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-user"></i> Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-key"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
    @yield('content')
    </div>
</div>
<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="{{asset("js/app.js")}}"></script>
</body>
</html>
