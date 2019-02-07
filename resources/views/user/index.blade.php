@extends('layout.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
@endsection
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
                        <div class="form-group">
                            <input type="file" id="upload" class="form-control" accept="image/*" name="ava">
                        </div>
                        <div id="main-cropper"></div>
                        <div class="form-group" id="img-button">
                            <button id="getImage" type="button" class="btn btn-info">Сохранить выделенную область</button>
                        </div>
                        <input type="text" name="avatar" id="avatar" class="hidden-print">

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
                            <input type="tel" id="telephone" class="form-control" name="phone"
                                   placeholder="Номер телефона" required>
                        </div>
                        <div class="form-group">
                            <input type="text"
                                   onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control"
                                   name="birthday"
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
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="col account-main-info-col p-0">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset('images/avatars/users/' . $user->avatar) }}"
                                         class="account-profile-avatar"
                                         alt="">
                                    <div class="text-center mt-2">
                                        @if($user->isOnline())
                                            <span class="badge badge-success">Online</span>
                                        @else
                                            <span class="badge badge-light">Offline</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-subtitle text-center">{{ $user->fio }}
                                    </h5>
                                    <p class="text-center mb-0">{{ $user->position }}</p>
                                    <p class="text-center"><b>День рождения:</b> {{ $user->birthday }}</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <ul class="profile-card-user-social">
                                        <li><span><a href="{{ $user == Auth::user()? route('user.edit', $user->id) : route('user.show', $user->id) }}"><i class="fas fa-user-circle  fa-2x"></i></a></span></li>
                                        <li><span><a href="mailto:{{ $user->email }}"><i
                                                        class="far fa-envelope fa-2x"></i></a></span></li>
                                        <li><span><a href="tel:{{ $user->phone }}"><i
                                                        class="fas fa-phone fa-2x"></i></a></span>
                                        </li>
                                        <li><span><a href="#"><i
                                                        class="far fa-comment fa-2x"></i></a></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/croppie.js') }}"></script>
    <script>
        $(document).ready(function () {
            if ($('#upload').val() == '') {
                $('#main-cropper').hide();
                $('#getImage').hide()
            }
        })
        ///images/avatars/users/cool.jpg
        var basic = $('#main-cropper').croppie({
            viewport: {width: 300, height: 300, type: 'square'},
            boundary: {width: 300, height: 300},
            showZoomer: false,

        });

        $('#getImage').click(function () {
            basic.croppie('result', 'base64').then(function (base) {
                console.log()
                $('#avatar').val(base)
            })
        })

        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#main-cropper').croppie('bind', {
                        url: e.target.result
                    });
                    $('.actionDone').toggle();
                    $('.actionUpload').toggle();
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#getImage').click(function () {
            $(this).prop('disabled', true)
            $(this).text('Сохранено')
        })

        $('#upload').change(function () {
            $('#main-cropper').show()
            $('#getImage').show()
            $('#getImage').text('Сохранить выделенную область')
            $('#getImage').prop('disabled', false)
            readFile(this);
        })

    </script>
    <script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
    <script>
        $("#telephone").mask("+7 (999) 999-99-99");
    </script>
@endsection
