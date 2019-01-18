@extends('layout.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('sel-boot4.css') }}">
@endsection
@section('content')
    <div class="bg"></div>
    <div class="modal fade" id="ModalCreateUser" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Создание поста</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ url('/group/new_post') }}" onsubmit="">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="group_id" value="{{ $group->id }}">
                        <div class="form-group">
                            <input name="subject" id="post_name" class="form-control"
                                   placeholder="Название поста">
                        </div>
                        <div class="form-group">
                            <textarea name="text" id="comment-user-mission" cols="30" rows="10" class="form-control"
                                      placeholder="Комментарий"></textarea>
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
                Что у вас нового?
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 group-posts-wrapper row">
            @foreach($group->posts as $post)

                <div class="posts-wrapper col col-md-12 col-lg-12 col-xl-12 row">
                    <div class="post-author col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <img src="{{ asset("images/avatars/users/{$post->user->avatar}") }}"
                             alt="">
                    </div>
                    <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <div class="post-body card">

                            <div class="card-header post-card-header">
                                <div class="post-main-info col-md-8 col-lg-8 col-xl-8">
                                    <p class="post-title">{{ $post->subject }}</p>
                                    <p class="post-time-info">Posted at {{ $post->created_at }}</p>
                                </div>
                                {{--<div class="post-main-info post-delete col-md-4 col-lg-4 col-xl-4"><p>--}}
                                {{--<a href="{{ url("/group/post") }}" >&#10006;</a></p></div>--}}
                            </div>
                            <div class="card-body">
                                <p class="card-text">{!! $post->text !!}</p>
                                <div class="post-footer"><span class="post-comment-icon"><i
                                                class="fas fa-comment-alt comment-watcher"></i><span
                                                class="comments-count">{{ $post->comments->count() }}</span></span><span
                                            class="post-comment-author">{{ $post->user->fio }} <span
                                                class="post-author-span">автор</span></span>
                                </div>
                            </div>
                        </div>
                        <!-- end main post -->
                        <div class="comments-rendered comments-rendered-hide">
                            @foreach($post->comments as $comment)
                                <div class="comment-rendered row col-md-12 col-lg-12 col-xl-12">
                                    <div class="post-author comment-img-left col col-md-2 col-lg-2 col-xl-2">
                                        <img src="{{ asset("images/avatars/users/{$comment->user->avatar}") }}"
                                             alt="">
                                    </div>
                                    <div
                                            class="post-body post-body-comment card col-md-10 col-lg-10 col-xl-10 comment-card-right">
                                        <div class="card-body">
                                            {{--<div class="post-main-info comment-delete col-md-12 col-lg-12 col-xl-12">--}}
                                            {{--<p>--}}
                                            {{--<a class="black-a" href="">&#10006;</a>--}}
                                            {{--</p>--}}
                                            {{--</div>--}}
                                            <p class="card-text">{{ $comment->text }}</p>
                                            <div class="post-footer"><p class="post-time-info">Posted
                                                    at {{ $comment->created_at }}</p><span
                                                        class="post-comment-author">{{ $comment->user->fio }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="new-comment col-md-12 col-lg-12 col-xl-12 row">
                                <div class="post-author comment-img-left col col-md-2 col-lg-2 col-xl-2">
                                    <img src="https://api.adorable.io/avatars/150/8"
                                         alt="">
                                </div>
                                <div
                                        class="post-body post-body-comment card col-md-10 col-lg-10 col-xl-10 comment-card-right">
                                    <div class="card-body">
                                        <form action="{{ url('group/new_comment') }}" method="POST">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <input type="text" name="text" class="form-control"
                                                       placeholder="Ваш комментарий..."
                                                       aria-label="Ваш комментарий" aria-describedby="button-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit"
                                                            id="button-addon2"><i
                                                                class="far fa-paper-plane fa-1x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 group-info-wrapper">
            <h6>Участники группы</h6>
            <div class="row group-users">
                @foreach($group->users as $user)
                    <div class="col-md-12 col-lg-12 col-xl-12 group-user delete-user">
                        <div class="user-online"><img src="{{ asset("/images/avatars/users/{$user->avatar}") }}" alt="">
                        </div>
                        <p>{{ $user->fio}}</p>
                    </div>
                @endforeach

                <div class="col-md-12 col-lg-12 col-xl-12 group-user adduser">
                    <i class="fas fa-plus fa-2x" id="addUserhref"></i>
                    <p id="addUsertext">Добавить</p>
                </div>
            </div>
        </div>
    </div>
    <div class="user-popup-select card">
        <form method="POST" action="{{ url('group/new_user') }}">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="hash_id" value="{{ $group->hash_id }}">
                    <input type="text" name="users" class="form-control" data-paraia-multi-select="true"
                           placeholder="Добавить пользователей" id="value-array">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Добавить</button>
                <button type="button" id="closeFormUser" class="btn btn-primary">Закрыть</button>
            </div>
        </form>
    </div>
    <a class="delete-a" href="">Удалить пользователя Имя</a>
@endsection
@section('js')
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script>
        tinymce.init({
            selector: '#comment-user-mission',
            plugins: 'table',
        });
    </script>
    <script src="{{ asset('js/paraia_multi_select.js')  }}"></script>
    <script>
        var items = [
            {
                value: 11,
                text: "<img src='https://api.adorable.io/avatars/150/2' class='user-selector'/> Apple"
            },
            {
                value: 12,
                text: "<img src='https://api.adorable.io/avatars/150/1' class='user-selector'/> Nokia"
            },
            {value: 13, text: 'Sony'},
            {value: 14, text: 'LG'},
            {value: 15, text: 'HTC'},
            {value: 16, text: 'Motorola'},
            {value: 17, text: 'Samsung'},
            {value: 18, text: 'ZTE'},
            {value: 19, text: 'Asus'},
            {value: 20, text: 'Alcatel'}
        ];
        let select = $('[data-paraia-multi-select="true"]').paraia_multi_select({
            items: JSON.parse($.ajax({
                url: "/users/api?users={{ implode(',', $group->users()->pluck('id')->all()) }}",
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
            let a = [];
            a.push(select.paraia_multi_select("get_items"));
            $("#value-array").val(a);
        });
    </script>
    <script>
        $(".delete-user").contextmenu(function (e) {
            e.preventDefault();
            $(".delete-a").css("left", e.pageX);
            $(".delete-a").css("top", e.pageY);
            $(".delete-a").show();
            console.log(e.pageX);

        });
        $(document).click(function (e) {
            if (!$(".delete-a").is(e.target)) {
                $(".delete-a").hide();
            }
        })
    </script>
    <script>
        $(".adduser").click(function (e) {
            $(".user-popup-select").css("left", e.pageX);
            $(".user-popup-select").css("top", e.pageY);
            $(".user-popup-select").show();
            console.log(e.pageX);
        });
    </script>
    <script>
        $("#closeFormUser").click(function (e) {
            $(".user-popup-select").hide();
        })
    </script>
@endsection
