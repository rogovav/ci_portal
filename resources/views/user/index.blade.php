@extends('layout.index')
@section('content')
    <div class="modal fade" id="ModalCreateUser" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Создание нового пользователя</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ url('users') }}" enctype="multipart/form-data">
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
                            <input type="tel" id="telephone" class="form-control" name="phone" placeholder="Номер телефона" required>
                        </div>
                        <div class="form-group">
                            <input type="text"
                                   onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" name="birthday"
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
    <div class="row">
        <div class="col">
            <button class="btn btn-primary create-user-button" data-toggle="modal" data-target="#ModalCreateUser">
                Создать пользователя
            </button>
        </div>
    </div>
    <div class="row">
        @foreach($users as $user)
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card account-profile-main">
                    <div class="row">
                        <div class="col account-main-info-col">
                            <img src="{{ asset("images/avatars/users/$user->avatar") }}" class="account-profile-avatar"
                                 alt="">
                        </div>
                        <div class="col">
                            <ul class="account-profile-main_information">
                                <li><b>{{ $user->fio }}</b></li>
                                <li><b>{{ $user->position }}</b></li>
                                <li>Ответсвенный</li>
                            </ul>
                            <ul class="account-profile-contact_information">
                                <li>День рождения: <b>{{ $user->birthday }}</b></li>
                            </ul>

                            <hr>
                            <ul class="profile-card-user-social">
                                <li><span><a href="https://vk.com/{{ $user->vk }}" target="_blank"><i
                                                class="fab fa-vk fa-2x"></i></a></span></li>
                                <li><span><a href="mailto:{{ $user->email }}"><i
                                                class="far fa-envelope fa-2x"></i></a></span></li>
                                <li><span><a href="tel:{{ $user->phone }}"><i class="fas fa-phone fa-2x"></i></a></span>
                                </li>
                                <li><span><a href="tel:7987543210"><i class="far fa-comment fa-2x"></i></a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('js')
    <script>
        $("#photo").click(function () {
            $("#btnImagemPaciente").trigger('click');
        });


        $('#btnImagemPaciente').change(function () {
            if (this.files && this.files[0]) {
                let img = document.getElementById('photo_preview');
                img.src = URL.createObjectURL(this.files[0]); // set src to file url
            }
        });
    </script>
    <script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
    <script>
        $("#telephone").mask("+7 (999) 999-99-99");
    </script>
@endsection
