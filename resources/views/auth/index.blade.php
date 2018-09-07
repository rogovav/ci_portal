<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <title>Авторизация</title>
</head>
<body>
<div class="auth-background"></div>
<div class="container auth-container">
    <div class="row main-auth-row">
        <form class="auth-form">
            <div class="row form-group">
                <div class="col">
                    <h2 class="auth-form-text">Авторизация пользователей</h2>
                    <span class="text-ci-auth">CI Portal</span>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="text-uppercase">Имя пользователя</label>
                <input type="text" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" class="text-uppercase">Пароль</label>
                <input type="password" class="form-control" placeholder="" required>
            </div>
            <button type="submit" class="">ВОЙТИ В СИСТЕМУ</button>
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
