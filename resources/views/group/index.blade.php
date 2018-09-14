@extends('layout.index')
@section('content')
    <div class="modal fade" id="ModalCreateUser" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Создание группы</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ url('groups') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input id="" name="name" class="form-control" placeholder="Название группы">
                        </div>
                        <div id="photo" class="form-group">
                            <img src="http://via.placeholder.com/185x185"
                                 style="width:185px; height:185px; border:#41719C 2px solid;" id="photo_preview"
                                 class="img-thumbnail" alt="Фото группы">
                        </div>
                        <label class="custom-file hidden-print" style="">
                            <input type="file" name="avatar" id="btnImagemPaciente" style="width: 160px;"
                                   class="form-control form-control-sm">
                            <span class="custom-file-control"></span>
                        </label>
                        <div class="form-group">
                            <input type="text" name="users" class="form-control" data-paraia-multi-select="true"
                                   placeholder="Добавить пользователей" id="value-array">
                        </div>

                        <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                            <option value="AL">Alabama</option>
                            ...
                            <option value="WY">Wyoming</option>
                        </select>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Создать</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button class="btn btn-primary create-user-button" data-toggle="modal" data-target="#ModalCreateUser">
                Создать группу
            </button>
        </div>
    </div>
    <div class="row">

        @foreach($groups as $group)
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card account-profile-main">
                    <div class="row">
                        <div class="col account-main-info-col">
                            <img src="https://api.adorable.io/avatars/150/2" class="account-profile-avatar" alt="">
                        </div>
                        <div class="col">
                            <ul class="account-profile-main_information">
                                <li><b>{{ $group->name }}</b></li>
                            </ul>
                            <ul class="account-profile-contact_information">
                                <li><span><b>{{ $group->users->count }}</b></span><span> участников</span></li>
                            </ul>
                            <hr>
                            <div>
                                <a href="">
                                    <img class="group-user-avatar" src="https://api.adorable.io/avatars/150/1" alt=""
                                         data-container="body" data-toggle="popover" data-placement="top"
                                         data-content="Имя Пользователя" data-html="true" data-trigger="hover">
                                </a>
                                <a href="">
                                    <img class="group-user-avatar" src="https://api.adorable.io/avatars/150/2" alt=""
                                         data-container="body" data-toggle="popover" data-placement="top"
                                         data-content="Имя Пользователя" data-html="true"
                                         data-trigger="hover">
                                </a>
                                <a href="">
                                    <img class="group-user-avatar" src="https://api.adorable.io/avatars/150/3" alt=""
                                         data-container="body" data-toggle="popover" data-placement="top"
                                         data-content="Имя Пользователя" data-html="true"
                                         data-trigger="hover">
                                </a>
                                <a href="">
                                    <img class="group-user-avatar" src="https://api.adorable.io/avatars/150/4" alt=""
                                         data-container="body" data-toggle="popover" data-placement="top"
                                         data-content="Имя Пользователя" data-html="true"
                                         data-trigger="hover">
                                </a>
                                <a href="">
                                    <img class="group-user-avatar" src="https://api.adorable.io/avatars/150/5" alt=""
                                         data-container="body" data-toggle="popover" data-placement="top"
                                         data-content="Имя Пользователя" data-html="true"
                                         data-trigger="hover">
                                </a>
                                <a href="">
                                    <img class="group-user-avatar" src="https://api.adorable.io/avatars/150/6" alt=""
                                         data-container="body" data-toggle="popover" data-placement="top"
                                         data-content="Имя Пользователя" data-html="true"
                                         data-trigger="hover">
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

