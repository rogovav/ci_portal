@extends('layout.index')
@section('content')
    <div class="modal fade" id="ModalCreateUser" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Создание нового пользователя</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="javascript:void(0);" onsubmit="register()">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">ФИО</label>
                            <input type="text" class="form-control" name="fio" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Должность</label>
                            <select class="custom-select" id="inputGroupSelect01" name="position">
                                <option selected>Выберите должность</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Логин</label>
                            <input type="text" class="form-control" name="login" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">VK ID</label>
                            <input type="text" class="form-control" name="vk" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">E-mail</label>
                            <input type="email" class="form-control" name="email" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Номер телефона</label>
                            <input type="tel" class="form-control" name="phone" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">День рождения</label>
                            <input type="date" class="form-control" name="birthday" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Пароль</label>
                            <input type="password" class="form-control" name="password" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Повторите пароль</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder=""
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
    <div class="row">
        <div class="col">
            <button class="btn btn-primary create-user-button" data-toggle="modal" data-target="#ModalCreateUser">
                Создать пользователя
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="card account-profile-main">
                <div class="row">
                    <div class="col account-main-info-col">
                        <img src="https://api.adorable.io/avatars/150/2" class="account-profile-avatar"
                             alt="">
                    </div>
                    <div class="col">
                        <ul class="account-profile-main_information">
                            <li><b>Кулягина Таисия Ивановна</b></li>
                            <li><b>Программист</b></li>
                            <li>Ответсвенный</li>
                        </ul>
                        <ul class="account-profile-contact_information">
                            <li>День рождения: <b>01.02.1997</b></li>
                        </ul>

                        <hr>
                        <ul class="profile-card-user-social">
                            <li><span><a href="https://vk.com/eug_art" target="_blank"><i
                                            class="fab fa-vk fa-2x"></i></a></span></li>
                            <li><span><a href="mailto:artashkinep@mrsu.ru"><i
                                            class="far fa-envelope fa-2x"></i></a></span></li>
                            <li><span><a href="tel:7987543210"><i class="fas fa-phone fa-2x"></i></a></span></li>
                            <li><span><a href="tel:7987543210"><i class="far fa-comment fa-2x"></i></a></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="card account-profile-main">
                <div class="row">
                    <div class="col account-main-info-col">
                        <img src="https://api.adorable.io/avatars/150/2" class="account-profile-avatar"
                             alt="">
                    </div>
                    <div class="col">
                        <ul class="account-profile-main_information">
                            <li><b>Кулягина Таисия Ивановна</b></li>
                            <li><b>Программист</b></li>
                            <li>Ответсвенный</li>
                        </ul>
                        <ul class="account-profile-contact_information">
                            <li>День рождения: <b>01.02.1997</b></li>
                        </ul>

                        <hr>
                        <ul class="profile-card-user-social">
                            <li><span><a href="https://vk.com/eug_art" target="_blank"><i
                                            class="fab fa-vk fa-2x"></i></a></span></li>
                            <li><span><a href="mailto:artashkinep@mrsu.ru"><i
                                            class="far fa-envelope fa-2x"></i></a></span></li>
                            <li><span><a href="tel:7987543210"><i class="fas fa-phone fa-2x"></i></a></span></li>
                            <li><span><a href="tel:7987543210"><i class="far fa-comment fa-2x"></i></a></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="card account-profile-main">
                <div class="row">
                    <div class="col account-main-info-col">
                        <img src="https://api.adorable.io/avatars/150/2" class="account-profile-avatar"
                             alt="">
                    </div>
                    <div class="col">
                        <ul class="account-profile-main_information">
                            <li><b>Кулягина Таисия Ивановна</b></li>
                            <li><b>Программист</b></li>
                            <li>Ответсвенный</li>
                        </ul>
                        <ul class="account-profile-contact_information">
                            <li>День рождения: <b>01.02.1997</b></li>
                        </ul>

                        <hr>
                        <ul class="profile-card-user-social">
                            <li><span><a href="https://vk.com/eug_art" target="_blank"><i
                                            class="fab fa-vk fa-2x"></i></a></span></li>
                            <li><span><a href="mailto:artashkinep@mrsu.ru"><i
                                            class="far fa-envelope fa-2x"></i></a></span></li>
                            <li><span><a href="tel:7987543210"><i class="fas fa-phone fa-2x"></i></a></span></li>
                            <li><span><a href="tel:7987543210"><i class="far fa-comment fa-2x"></i></a></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="card account-profile-main">
                <div class="row">
                    <div class="col account-main-info-col">
                        <img src="https://api.adorable.io/avatars/150/2" class="account-profile-avatar"
                             alt="">
                    </div>
                    <div class="col">
                        <ul class="account-profile-main_information">
                            <li><b>Кулягина Таисия Ивановна</b></li>
                            <li><b>Программист</b></li>
                            <li>Ответсвенный</li>
                        </ul>
                        <ul class="account-profile-contact_information">
                            <li>День рождения: <b>01.02.1997</b></li>
                        </ul>

                        <hr>
                        <ul class="profile-card-user-social">
                            <li><span><a href="https://vk.com/eug_art" target="_blank"><i
                                            class="fab fa-vk fa-2x"></i></a></span></li>
                            <li><span><a href="mailto:artashkinep@mrsu.ru"><i
                                            class="far fa-envelope fa-2x"></i></a></span></li>
                            <li><span><a href="tel:7987543210"><i class="fas fa-phone fa-2x"></i></a></span></li>
                            <li><span><a href="tel:7987543210"><i class="far fa-comment fa-2x"></i></a></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
