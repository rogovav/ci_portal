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
                    <a class="nav-link" href="#" title="Cart"><i class="fas fa-tachometer-alt"></i> Панель <i
                            class="fas fa-tachometer-alt shortmenu animate"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-tasks"></i> Заявки <i class="fas fa-tasks shortmenu animate"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Новая</a>
                        <a class="dropdown-item" href="#">Просмотр</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Запланированная</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" title="Группы"><i class="fas fa-users"></i> Группы <i
                            class="fas fa-users shortmenu animate"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" title="Люди"><i class="fas fa-user-tie"></i> Люди <i
                            class="fas fa-user-tie shortmenu animate"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" title="WIKI"><i class="fas fa-graduation-cap"></i> WIKI <i
                            class="fas fa-graduation-cap shortmenu animate"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" title="Календарь"><i class="fas fa-calendar-alt"></i> Календарь <i
                            class="fas fa-calendar-alt shortmenu animate"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" title="Отчеты"><i class="fas fa-file-alt"></i> Отчеты <i
                            class="fas fa-file-alt shortmenu animate"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" title="Чат"><i class="fas fa-comments"></i> Чат <i
                            class="fas fa-comments shortmenu animate"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" title="Склад"><i class="fas fa-warehouse"></i> Склад <i
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
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body card-body-task no-padding">
                        <div class="card-body-label card-task"><i class="fas fa-tag fa-3x"></i></div>
                        <div class="card-body-text"><span>ЗАЯВОК</span><br><span class="real-time-counter">20</span>
                            <hr>
                            <span class="real-time-counter-user">15</span>
                            <span> выполнено</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-body-message">
                    <div class="card-body no-padding">
                        <div class="card-body-label card-message"><i class="fas fa-envelope fa-3x"></i></div>
                        <div class="card-body-text"><span>СООБЩЕНИЙ</span><br><span class="real-time-counter">21</span>
                            <hr>
                            <span class="real-time-counter-user">10</span>
                            <span> Ваши</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body card-body-wiki no-padding">
                        <div class="card-body-label card-wiki"><i class="fas fa-graduation-cap fa-3x"></i></div>
                        <div class="card-body-text"><span>СТАТЕЙ</span><br><span class="real-time-counter">35</span>
                            <hr>
                            <span class="real-time-counter-user">4</span>
                            <span> написано Вами</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body card-body-users no-padding">
                        <div class="card-body-label card-users"><i class="fas fa-users fa-3x"></i></div>
                        <div class="card-body-text"><span>ПОЛЬЗОВАТЕЛЕЙ</span><br><span
                                class="real-time-counter">143</span>
                            <hr>
                            <span class="real-time-counter-user">3</span>
                            <span> on-line</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-tasks"></i> Последние изменения заявок</h5>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td><img src="{{asset("images/profile-photo.jpg")}}" class="profile-image"
                                         alt="Имя пользователя"></td>
                                <td><span><a href="">001</a></span><br><span class="text-post">Тема заявки</span>
                                </td>
                                <td class="time-post">24 матра 2016, 14:14</td>
                            </tr>
                            <tr>
                                <td><img src="{{asset("images/profile-photo.jpg")}}" class="profile-image"
                                         alt="Имя пользователя"></td>
                                <td><span><a href="">002</a></span><br><span class="text-post">Тема заявки</span>
                                </td>
                                <td class="time-post">24 матра 2016, 14:14</td>
                            </tr>
                            <tr>
                                <td><img src="{{asset("images/profile-photo.jpg")}}" class="profile-image"
                                         alt="Имя пользователя"></td>
                                <td><span><a href="">003</a></span><br><span class="text-post">Тема заявки</span>
                                </td>
                                <td class="time-post">24 матра 2016, 14:14</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-graduation-cap"></i> Последнее из Базы Знаний</h5>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td><img src="{{asset("images/profile-photo.jpg")}}" class="profile-image"
                                         alt="Имя пользователя"></td>
                                <td><span><a href="">Тема поста</a></span><br><span class="text-post">Краткое описание поста</span>
                                </td>
                                <td class="time-post">24 матра 2016, 14:14</td>
                            </tr>
                            <tr>
                                <td><img src="{{asset("images/profile-photo.jpg")}}" class="profile-image"
                                         alt="Имя пользователя"></td>
                                <td><span><a href="">Тема поста</a></span><br><span class="text-post">Краткое описание поста</span>
                                </td>
                                <td class="time-post">24 матра 2016, 14:14</td>
                            </tr>
                            <tr>
                                <td><img src="{{asset("images/profile-photo.jpg")}}" class="profile-image"
                                         alt="Имя пользователя"></td>
                                <td><span><a href="">Тема поста</a></span><br><span class="text-post">Краткое описание поста</span>
                                </td>
                                <td class="time-post">24 матра 2016, 14:14</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-tasks"></i> Список заявок</h5>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                   role="tab" aria-controls="nav-home" aria-selected="true">Мои</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                   role="tab" aria-controls="nav-profile" aria-selected="false">Мне</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                 aria-labelledby="nav-home-tab">
                                <table class="table table-tasks">
                                    <thead>
                                    <tr>
                                        <th scope="col">№</th>
                                        <th scope="col">Инфо</th>
                                        <th scope="col">Тема</th>
                                        <th scope="col">Автор</th>
                                        <th scope="col">Deadline</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="deadline deadline-ok">
                                        <th scope="row">1</th>
                                        <td><i class="far fa-check-circle" title="Выполнена"></i> <i
                                                class="fas fa-arrow-circle-down" title="Низкий приоритет"></i></td>
                                        <td>Тема 1</td>
                                        <td>Otto</td>
                                        <td>24 матра 2016, 14:14</td>
                                    </tr>
                                    <tr class="deadline deadline-middle">
                                        <th scope="row">2</th>
                                        <td><i class="far fa-dot-circle" title="В работе"></i> <i
                                                class="fas fa-arrow-circle-up" title="Высокий приортиет"></i></td>
                                        <td>Тема 2</td>
                                        <td>Thornton</td>
                                        <td>24 матра 2016, 14:14</td>
                                    </tr>
                                    <tr class="deadline deadline-expired">
                                        <th scope="row">3</th>
                                        <td><i class="far fa-clock" title="Ожидает действий"></i> <i
                                                class="fas fa-minus-circle" title="Высокий приортиет"></i></td>
                                        <td>Тема 3</td>
                                        <td>Thornton</td>
                                        <td>24 матра 2016, 14:14</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                 aria-labelledby="nav-profile-tab">
                                <table class="table table-tasks">
                                    <thead>
                                    <tr>
                                        <th scope="col">№</th>
                                        <th scope="col">Инфо</th>
                                        <th scope="col">Тема</th>
                                        <th scope="col">Автор</th>
                                        <th scope="col">Deadline</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="deadline deadline-ok">
                                        <th scope="row">8</th>
                                        <td><i class="far fa-check-circle" title="Выполнена"></i> <i
                                                class="fas fa-arrow-circle-down" title="Низкий приоритет"></i></td>
                                        <td>Тема 1</td>
                                        <td>Otto</td>
                                        <td>24 матра 2016, 14:14</td>
                                    </tr>
                                    <tr class="deadline deadline-middle">
                                        <th scope="row">9</th>
                                        <td><i class="far fa-dot-circle" title="В работе"></i> <i
                                                class="fas fa-arrow-circle-up" title="Высокий приортиет"></i></td>
                                        <td>Тема 2</td>
                                        <td>Thornton</td>
                                        <td>24 матра 2016, 14:14</td>
                                    </tr>
                                    <tr class="deadline deadline-expired">
                                        <th scope="row">10</th>
                                        <td><i class="far fa-clock" title="Ожидает действий"></i> <i
                                                class="fas fa-minus-circle" title="Высокий приортиет"></i></td>
                                        <td>Тема 3</td>
                                        <td>Thornton</td>
                                        <td>24 матра 2016, 14:14</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                 aria-labelledby="nav-contact-tab">...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
