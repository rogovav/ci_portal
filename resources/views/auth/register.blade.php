<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <title>Регистрация</title>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('register')  }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" name="fio" placeholder="ФИО" required>
                            </div>
                            <div id="photo" class="form-group">
                                <img src="http://via.placeholder.com/185x185"
                                     style="" id="photo_preview"
                                     class="img-thumbnail" alt="Фото группы">
                            </div>
                            <label class="custom-file hidden-print" style="">
                                <input type="file" name="avatar" id="btnImagemPaciente" style="width: 160px;"
                                       class="form-control form-control-sm">
                                <span class="custom-file-control"></span>
                            </label>
                            <div class="form-group">
                                <select class="custom-select" id="inputGroupSelect01" name="position">
                                    <option selected>Выберите должность</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="login" placeholder="Логин" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="vk" placeholder="VK ID" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" name="phone" placeholder="Номер телефона" required>
                            </div>
                            <div class="form-group">
                                <input type="text"
                                       onfocus="(this.type='date')" class="form-control" name="birthday"
                                       placeholder="День рождения" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Пароль" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password_confirmation"
                                       placeholder="Повторите пароль"
                                       required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Создать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

