@extends('layout.index')
@section('content')
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
                            <li><b>Группа развития</b></li>
                        </ul>
                        <ul class="account-profile-contact_information">
                            <li><span><b>6</b></span><span> участников</span></li>
                        </ul>
                        <hr>
                        <div>
                            <a href=""><img class="group-user-avatar" src="https://api.adorable.io/avatars/150/1" alt=""
                                            data-container="body" data-toggle="popover" data-placement="top"
                                            data-content="Имя Пользователя" data-html="true" data-trigger="hover"></a>
                            <a href=""><img class="group-user-avatar" src="https://api.adorable.io/avatars/150/2" alt=""
                                            data-container="body" data-toggle="popover" data-placement="top"
                                            data-content="Имя Пользователя" data-html="true" data-trigger="hover"></a>
                            <a href=""><img class="group-user-avatar" src="https://api.adorable.io/avatars/150/3" alt=""
                                            data-container="body" data-toggle="popover" data-placement="top"
                                            data-content="Имя Пользователя" data-html="true" data-trigger="hover"></a>
                            <a href=""><img class="group-user-avatar" src="https://api.adorable.io/avatars/150/4" alt=""
                                            data-container="body" data-toggle="popover" data-placement="top"
                                            data-content="Имя Пользователя" data-html="true" data-trigger="hover"></a>
                            <a href=""><img class="group-user-avatar" src="https://api.adorable.io/avatars/150/5" alt=""
                                            data-container="body" data-toggle="popover" data-placement="top"
                                            data-content="Имя Пользователя" data-html="true" data-trigger="hover"></a>
                            <a href=""><img class="group-user-avatar" src="https://api.adorable.io/avatars/150/6" alt=""
                                            data-container="body" data-toggle="popover" data-placement="top"
                                            data-content="Имя Пользователя" data-html="true" data-trigger="hover"></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="card account-profile-main">
                <div class="row">
                    <div class="col account-main-info-col">
                        <img src="https://api.adorable.io/avatars/150/1" class="account-profile-avatar"
                             alt="">
                    </div>
                    <div class="col">
                        <ul class="account-profile-main_information">
                            <li><b>Группа пирожков</b></li>
                        </ul>
                        <ul class="account-profile-contact_information">
                            <li><span><b>6</b></span><span> участников</span></li>
                        </ul>
                        <hr>
                        <div>
                            <a href=""><img class="group-user-avatar" src="https://api.adorable.io/avatars/150/1" alt=""
                                            data-container="body" data-toggle="popover" data-placement="top"
                                            data-content="Имя Пользователя" data-html="true" data-trigger="hover"></a>
                            <a href=""><img class="group-user-avatar" src="https://api.adorable.io/avatars/150/2" alt=""
                                            data-container="body" data-toggle="popover" data-placement="top"
                                            data-content="Имя Пользователя" data-html="true" data-trigger="hover"></a>
                            <a href=""><img class="group-user-avatar" src="https://api.adorable.io/avatars/150/3" alt=""
                                            data-container="body" data-toggle="popover" data-placement="top"
                                            data-content="Имя Пользователя" data-html="true" data-trigger="hover"></a>
                            <a href=""><img class="group-user-avatar" src="https://api.adorable.io/avatars/150/4" alt=""
                                            data-container="body" data-toggle="popover" data-placement="top"
                                            data-content="Имя Пользователя" data-html="true" data-trigger="hover"></a>
                            <a href=""><img class="group-user-avatar" src="https://api.adorable.io/avatars/150/5" alt=""
                                            data-container="body" data-toggle="popover" data-placement="top"
                                            data-content="Имя Пользователя" data-html="true" data-trigger="hover"></a>
                            <a href=""><img class="group-user-avatar" src="https://api.adorable.io/avatars/150/6" alt=""
                                            data-container="body" data-toggle="popover" data-placement="top"
                                            data-content="Имя Пользователя" data-html="true" data-trigger="hover"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
