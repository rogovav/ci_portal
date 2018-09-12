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
        <div class="col">
            <div class="card-container">
                <div class="card profile-card-user">
                    <div class="front">
                        <img src="https://api.adorable.io/avatars/150/1" alt="">
                        <h3>Арташкин Евгений</h3>
                        <h5>Программист</h5>
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
        <div class="col">
            <div class="card-container">
                <div class="card profile-card-user">
                    <div class="front">
                        <img src="https://api.adorable.io/avatars/150/2" alt="">
                        <h3>Арташкин Евгений</h3>
                        <h5>Программист</h5>
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
        <div class="col">
            <div class="card-container">
                <div class="card profile-card-user">
                    <div class="front">
                        <img src="https://api.adorable.io/avatars/150/3" alt="">
                        <h3>Арташкин Евгений</h3>
                        <h5>Программист</h5>
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
        <div class="col">
            <div class="card-container">
                <div class="card profile-card-user">
                    <div class="front">
                        <img src="https://api.adorable.io/avatars/150/4" alt="">
                        <h3>Арташкин Евгений</h3>
                        <h5>Программист</h5>
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
        <div class="col">
            <div class="card-container">
                <div class="card profile-card-user">
                    <div class="front">
                        <img src="https://api.adorable.io/avatars/150/5" alt="">
                        <h3>Арташкин Евгений</h3>
                        <h5>Программист</h5>
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
        <div class="col">
            <div class="card-container">
                <div class="card profile-card-user">
                    <div class="front">
                        <img src="https://api.adorable.io/avatars/150/6" alt="">
                        <h3>Арташкин Евгений</h3>
                        <h5>Программист</h5>
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
        <div class="col">
            <div class="card-container">
                <div class="card profile-card-user">
                    <div class="front">
                        <img src="https://api.adorable.io/avatars/150/7" alt="">
                        <h3>Арташкин Евгений</h3>
                        <h5>Программист</h5>
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
    <div class="row">
        <div class="col">
            <div class="card-container">
                <div class="card profile-card-user">
                    <div class="front">
                        <img src="https://api.adorable.io/avatars/150/8" alt="">
                        <h3>Арташкин Евгений</h3>
                        <h5>Программист</h5>
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
        <div class="col">
            <div class="card-container">
                <div class="card profile-card-user">
                    <div class="front">
                        <img src="https://api.adorable.io/avatars/150/9" alt="">
                        <h3>Арташкин Евгений</h3>
                        <h5>Программист</h5>
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
        <div class="col">
            <div class="card-container">
                <div class="card profile-card-user">
                    <div class="front">
                        <img src="https://api.adorable.io/avatars/150/10" alt="">
                        <h3>Арташкин Евгений</h3>
                        <h5>Программист</h5>
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
        <div class="col">
            <div class="card-container">
                <div class="card profile-card-user">
                    <div class="front">
                        <img src="https://api.adorable.io/avatars/150/11" alt="">
                        <h3>Арташкин Евгений</h3>
                        <h5>Программист</h5>
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
        <div class="col">
            <div class="card-container">
                <div class="card profile-card-user">
                    <div class="front">
                        <img src="https://api.adorable.io/avatars/150/12" alt="">
                        <h3>Арташкин Евгений</h3>
                        <h5>Программист</h5>
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
        <div class="col">
            <div class="card-container">
                <div class="card profile-card-user">
                    <div class="front">
                        <img src="https://api.adorable.io/avatars/150/13" alt="">
                        <h3>Арташкин Евгений</h3>
                        <h5>Программист</h5>
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
        <div class="col">
            <div class="card-container">
                <div class="card profile-card-user">
                    <div class="front">
                        <img src="https://api.adorable.io/avatars/150/14" alt="">
                        <h3>Арташкин Евгений</h3>
                        <h5>Программист</h5>
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
