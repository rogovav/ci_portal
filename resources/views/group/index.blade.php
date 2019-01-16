@extends('layout.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/paraia_multi_select.css') }}">
@endsection
@section('content')
    <div class="modal fade" id="ModalCreateUser" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Создание группы</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ url('groups') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input id="" name="name" class="form-control" placeholder="Название группы">
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
                            <input type="text" name="users" class="form-control" data-paraia-multi-select="true"
                                   placeholder="Добавить пользователей" id="value-array">
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
                            <a href="/group/{{ $group->hash_id }}"><img src="{{ asset("images/avatars/groups/$group->avatar") }}" class="account-profile-avatar" alt=""></a>
                        </div>
                        <div class="col">
                            <ul class="account-profile-main_information">
                                <li><b>{{ $group->name }}</b></li>
                            </ul>
                            <ul class="account-profile-contact_information">
                                <li><span>Кол-во участников: </span><span><b>{{ $group->users->count() }}</b></span></li>
                            </ul>
                            <hr>
                            <div>
                                @foreach($group->users as $user)
                                    <a href=""><img class="group-user-avatar"
                                                    src="{{ asset("images/avatars/users/$user->avatar") }}" alt=""
                                                    data-container="body" data-toggle="popover" data-placement="top"
                                                    data-content="{{ $user->fio }}" data-html="true"
                                                    data-trigger="hover"></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/paraia_multi_select.js')  }}"></script>
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
    <script>

        let select = $('[data-paraia-multi-select="true"]').paraia_multi_select({
            items: JSON.parse($.ajax({
                url: "/users/api",
                type: "GET",
                async: false,
            }).responseText),
            // enable multi select
            multi_select: true,
            // selected items on init
            defaults: [],
            // filter text
            filter_text: 'Filter',
            // is Right To Left?
            rtl: false,
            // is case sensitive?
            case_sensitive: false

        });
        $(".item").click(function () {
            $("#value-array").val(select.paraia_multi_select("get_items"));
        });

    </script>
@endsection
