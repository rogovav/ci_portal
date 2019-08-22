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
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="super" value="1">
                            <label class="form-check-label" for="exampleCheck1">Администратор</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="fio" placeholder="ФИО" required>
                        </div>
                        <div class="form-group">
                            <input type="file" id="upload" class="form-control" accept="image/*" name="ava">
                        </div>
                        <div id="main-cropper"></div>
                        <div class="form-group" id="img-button">
                            <button id="getImage" type="button" class="btn btn-info">Сохранить выделенную область
                            </button>
                        </div>
                        <input type="text" name="avatar" id="avatar" class="hidden-print">

                        <div class="form-group">
                            <select class="custom-select" id="inputGroupSelect01" name="position">
                                <option selected>Выберите должность</option>
                                @foreach($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                                @endforeach
                            </select>
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
                            <input type="text" class="form-control" name="iphone"
                                   placeholder="Внутренний номер телефона" required>
                        </div>
                        <div class="form-group">
                            <input type="text" value="1999-01-01"
                                   onfocus="(this.type='date')" onblur="(this.type='text')"
                                   class="form-control hidden-print"
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
                        <button type="submit" class="btn btn-primary">Создать</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(Auth::user()->super)
        <div class="row">
            <div class="col">
                <button class="btn btn-primary create-user-button" data-toggle="modal" data-target="#ModalCreateUser">
                    Создать сотрудника
                </button>
            </div>
        </div>
    @endif
    <div class="row">
        @foreach($users as $user)
            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                <div class="card">
                    {{--{{ $user->isOnline()? "avatar-index-border-online" : Null }} {{ $user->super? "avatar-index-border-admin" : Null}}--}}
                    <div class="card-header ">
                        @if($user->super)
                            <span class="small d-block mb-2 font-weight-normal text-center col-12 admin-badge">Администратор</span>
                        @else
                            <span class="small d-block mb-2 font-weight-normal text-center col-12 admin-badge">Пользователь</span>
                        @endif
                        <h6 class="card-subtitle text-center">
                            {{ preg_replace('/(\w+) (\w)\w+ (\w)\w+/iu', '$1 $2.$3.', $user->fio) }}
                        </h6>
                        <p class="text-center mb-0 small">({{ $user->position->name }})</p>
                        <div class="text-center">
                            @if($user->blocked)
                                <span class="badge badge-danger font-weight-normal">Blocked</span>
                            @endif
                            {{--@if($user->super)--}}
                            {{--<span class="badge badge-info font-weight-normal">Администратор</span>--}}
                            {{--@endif--}}
                            @if($user->isOnline())
                                <span
                                        class="badge badge-success font-weight-normal">Online</span>
                            @else
                                <span
                                        class="badge font-weight-normal">Был в сети {{ date('d.m.y H:i' ,strtotime($user->last_activity)) }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <a href="{{ route('user.show', $user->id) }}">
                            <img src="{{ asset('images/avatars/users/' . $user->avatar) }}"
                                 class="account-profile-avatar-index"
                                 alt="">
                        </a>
                    </div>
                    <div class="card-footer">
                        <ul class="profile-card-user-social">
                            <li><span><a href="{{ route('user.show', $user->id) }}"><i
                                                class="fas fa-user-circle fa-2x"></i></a></span></li>
                            <li><span><a href="mailto:{{ $user->email }}"><i
                                                class="far fa-envelope fa-2x"></i></a></span></li>
                            <li><span><a href="tel:{{ $user->phone }}"><i
                                                class="fas fa-phone fa-2x"></i></a></span>
                            </li>
                        </ul>
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
