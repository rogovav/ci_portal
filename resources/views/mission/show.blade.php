@extends('layout.index')
@section('css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/css/bootstrap-select.min.css">
@endsection
@section('content')
    <div class="card">
        <div class="card-header card-priority-{{ $mission->priority == 1? 'low' : ($mission->priority == 2? 'mid' : 'high') }}-header">
            <div class="row align-items-center">
                <div class="col-12 col-md-4 col-lg-2 col-xl-2 col-form-label">
                    <h6 class="mb-0">Заявка <b>#{{ $mission->id }}</b> ({{ $from[$mission->from] }})</h6>
                </div>
                <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                    <div class="row mb-1">
                        <div class="col-5 col-md-5 col-lg-4 col-xl-4 text-left">
                            <span
                                    class="badge badge-info font-weight-normal">{{ $mission->created_at }}</span> {{-- Вт, 22-го янв., 13:22:44 --}}
                        </div>
                        <div class="col-2 col-md-2 col-lg-4 col-xl-4 text-center ">
                            <span class="badge badge-success font-weight-normal"><i
                                        class="far fa-calendar{{ $per == 100? '-times' : ($mission->status == 1? Null : ($mission->status == 2? '-minus' : '-check')) }}"></i> {{ $status[$mission->status] }} </span>
                        </div>
                        <div class="col-5 col-md-5 col-lg-4 col-xl-4 text-right ">
                            <span class="badge badge-info font-weight-normal">{{ $mission->date_to }}</span>
                        </div>
                    </div>
                    <div class="progress">
                        <div
                                class="progress-bar progress-bar-striped progress-bar-animated {{ $per < 50? 'bg-success' : ($per < 75? 'bg-warning' : 'bg-danger') }}"
                                role="progressbar"
                                style="width: {{ $per }}%" aria-valuenow="10" aria-valuemin="0"
                                aria-valuemax="100">
                            {{--после 50%--}}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-2 col-xl-2 col-form-label">
                    @switch($mission->status)
                        @case(1)
                            @if($mission->worker->id == Auth::id())
                            <form action="{{ route('mission.update', $mission->id) }}" method="post">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-secondary btn-sm float-right" value="2" name="status">
                                    Выполнить
                                </button>
                            </form>
                            @else
                                <span class="badge badge-secondary float-right font-weight-normal">В работе</span>
                            @endif
                            @break
                        @case(2)
                            <span class="badge badge-warning float-right font-weight-normal">На проверке</span>
                            @break
                        @case(3)
                            <span class="badge badge-success float-right font-weight-normal">Выполнена {{ $mission->date_close }}</span>
                            @break
                    @endswitch
                </div>
            </div>
        </div>
        <div class="card-body padding-0 card-priority-{{ $mission->priority == 1? 'low' : ($mission->priority == 2? 'mid' : 'high') }}">
            <div class="row">
                <div class=" col-lg-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            Информация о заявке
                        </div>
                        <div class="card-body padding-0">
                            @if($mission->client)
                                <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header card-client-header">
                                            <b>Клиент:</b> {{ $mission->client->fio }}</div>
                                        <div class="card-body card-client">
                                            <table class="table table-sm mb-0 ">
                                                <tr>
                                                    <th>Телефон</th>
                                                    <td>{{ $mission->client->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Внутренний номер</th>
                                                    <td>{{ $mission->client->iphone }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{ $mission->client->mail }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Договор</th>
                                                    <td>{{ $mission->client->cid }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Адрес</th>
                                                    <td>{{ @$mission->building->name }}{{ $mission->address? (', ' . $mission->address) : null }}
                                                        ({{ @$mission->building->address }})</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="card">
                                <div class="card-header card-info-header">
                                    <span><b>Тема: </b>{{ $mission->subject->name }}</span>
                                </div>
                                <div class="card-body card-info ">
                                    {!! nl2br($mission->info) !!}
                                </div>
                                <div class="card-footer card-info-header">
                                    <div class="row">
                                        @foreach($mission->files as $file)
                                            <div class="col-1">
                                                <a href="{{ asset('storage/missions/' . $file->name) }}"
                                                   class="black-file" download="{{ $file->original }}"
                                                   data-container="body" data-trigger="hover"
                                                   data-toggle="popover"
                                                   data-placement="bottom"
                                                   data-content="{{ $file->original }}">
                                                    <i class="far fa-2x fa-file"></i>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($mission->status != 3 && $mission->owner->id == Auth::id())
                            <div class="card-footer">
                            <div class="row">
                                <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                    <button type="button" class="btn btn-info btn-sm col-12 mb-1" id="rewrite_button">
                                        Переадресовать заявку
                                    </button>
                                </div>
                                @if($mission->status == 1)
                                    <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                        <button type="button" class="btn btn-danger btn-sm col-12 mb-1" id="ok_button">
                                            Закрыть заявку
                                        </button>
                                    </div>
                                @endif
                                @if($mission->status == 2)
                                    <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                        <button type="button" class="btn btn-primary btn-sm col-12 mb-1" id="ok_button">
                                            Подтвердить/Отклонить
                                        </button>
                                    </div>
                                @endif
                                <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                    <button type="button" class="btn btn-warning btn-sm col-12 mb-1" id="deadline_button">
                                        Изменить Deadline
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @if($mission->status != 3 and $mission->owner->id == Auth::id())
                        <div class="card" id="rewrite_mission">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-9">
                                        Переадресация заявки
                                    </div>
                                    <div class="col-3">
                                        <button id="rewrite_close" class="float-right close-button">
                                            <i
                                                    class="material-icons">
                                                clear
                                            </i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('mission.update', $mission->id) }}" method="post">
                            <div class="card-body">

                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <select id="worker-select" class="user-select form-control" name="worker"
                                                title="Исполнитель"
                                                data-live-search="true">
                                            @foreach($users as $user)
                                                <option
                                                    {{ $user->id == $mission->worker->id ? 'selected' : Null }} value="{{ $user->id }}">{{ $user->fio }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select data-content="{{ $helpers }}" id="help-select"
                                                class="help-select form-control" name="helper[]"
                                                multiple title="Помощники" data-live-search="true">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->fio }}</option>
                                            @endforeach
                                        </select>
                                        <span id="select-error" class="badge badge-danger">Исполнитель не может быть помощником</span>
                                    </div>

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary col-12">Переадресовать</button>
                                    </div>

                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="card" id="rewrite_deadline">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-9">
                                        Изменение deadline
                                    </div>
                                    <div class="col-3">
                                        <button id="deadline_close" class="float-right close-button">
                                            <i
                                                    class="material-icons">
                                                clear
                                            </i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('mission.update', $mission->id) }}" method="post">
                            <div class="card-body">

                                    {{ csrf_field() }}
                                    <input type="datetime-local" class="form-control"
                                           value="{{ date('Y-m-d\TH:i:s', strtotime($mission->date_to)) }}" name="date_to">

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary col-12">Изменить</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="card" id="ok-form">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-9">
                                        {{ $mission->status == 1? 'Закрытие заявки' : 'Подтверждение/отклонение закрытия' }}
                                    </div>
                                    <div class="col-3">
                                        <button id="ok_close" class="float-right close-button">
                                            <i class="material-icons">clear</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('mission.update', $mission->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                               placeholder="Комментарий/причина отклонения" name="status_info">
                                    </div>
                                    <div class="form-row">
                                        @if($mission->status == 1)
                                            <div class="col">
                                                <button class="col-12 btn btn-success" value="3" name="status">Закрыть заявку</button>
                                            </div>
                                        @else
                                            <div class="col">
                                                <button class="col-12 btn btn-success" value="3" name="status">Подтвердить</button>
                                            </div>
                                            <div class="col">
                                                <button class="col-12 btn btn-danger" value="1" name="status">Отклонить</button>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-12 col-xl-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    Исполнительная группа
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 col-md-3 col-lg-3 col-xl-3 ">
                                            <div class="card">
                                                <div class="card-header text-center card-priority-high-header small">
                                                    <b>Автор</b>
                                                </div>
                                                <div class="card-body card-priority-high">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <a href="{{ route('user.show', $mission->owner->id) }}">
                                                            <img class="users-helpers-img m-auto"
                                                                 style="display: block"
                                                                 data-container="body" data-trigger="hover"
                                                                 data-toggle="popover"
                                                                 data-placement="bottom"
                                                                 data-content="{{ $mission->owner->fio }}"
                                                                 src="{{ asset('images/avatars/users/' . $mission->owner->avatar ) }}"
                                                                 alt="">
                                                            </a>
                                                            <div class="text-center mt-2">
                                                                @if($mission->owner->isOnline())
                                                                    <span class="badge badge-success font-weight-normal">Online</span>
                                                                @else
                                                                    <span class="badge badge-secondary font-weight-normal">Offline</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-3 col-xl-3 small">
                                            <div class="card">
                                                <div class="card-header text-center card-priority-mid-header">
                                                    <b>Исполнитель</b>
                                                </div>
                                                <div class="card-body card-priority-mid">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <a href="{{ route('user.show', $mission->worker->id) }}">
                                                            <img class="users-helpers-img m-auto"
                                                                 style="display: block"
                                                                 data-container="body" data-trigger="hover"
                                                                 data-toggle="popover"
                                                                 data-placement="bottom"
                                                                 data-content="{{ $mission->worker->fio }}"
                                                                 src="{{ asset('images/avatars/users/' . $mission->worker->avatar ) }}"
                                                                 alt="">
                                                            </a>
                                                            <div class="text-center mt-2">
                                                                @if($mission->worker->isOnline())
                                                                    <span class="badge badge-success font-weight-normal">Online</span>
                                                                @else
                                                                    <span class="badge badge-secondary font-weight-normal">Offline</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if($mission->helpers->count() > 0)
                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="card">
                                                <div class="card-header text-center card-priority-low-header small">
                                                    <b>Помощники</b>
                                                </div>
                                                <div class="card-body card-priority-low">
                                                    <div class="row">
                                                        @foreach($mission->helpers as $helper)
                                                            <div class="col-3">
                                                                <a href="{{ route('user.show', $helper->id) }}">
                                                                <img class="users-helpers-img m-auto"
                                                                     style="display: block"
                                                                     data-container="body" data-trigger="hover"
                                                                     data-toggle="popover"
                                                                     data-placement="bottom"
                                                                     data-content="{{ $helper->fio }}"
                                                                     src="{{ asset('images/avatars/users/' . $helper->avatar ) }}"
                                                                     alt="">
                                                                </a>
                                                                <div class="text-center mt-2">
                                                                    @if($helper->isOnline())
                                                                        <span class="badge badge-success font-weight-normal">Online</span>
                                                                    @else
                                                                        <span class="badge badge-secondary font-weight-normal">Offline</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="jumbotron m-0 p-0 bg-transparent">
                                <div class="row m-0 p-0 position-relative">
                                    <div class="col-12 p-0 m-0" style="right: 0px;">
                                        <div class="card"
                                             style="overflow: hidden;">
                                            <div class="card-header">
                                                Комментарии к заявке
                                            </div>
                                            <div class="card-body pb-0 pt-0">
                                                <div id="sohbet" style="overflow-y: scroll; max-height: 300px;"
                                                     class="card shadow-none border-0 m-0 p-0 position-relative bg-transparent ">
                                                    @foreach($mission->comments->sortBy('id') as $comment)
                                                        @if($comment->user->id == Auth::id())
                                                            <div class="balon1 p-2 m-0 position-relative"
                                                                 data-is="Вы - {{ $comment->created_at->format('H:i') }}">
                                                                <a class="float-right mb-1"> {!! nl2br($comment->info) !!} </a>
                                                                @foreach($comment->files as $file)
                                                                    <div
                                                                            class="float-right col-12 mt-1 media-attachment-right-doc ma-right">
                                                                        <div
                                                                                class="avatar bg-primary float-right col-2">
                                                                            <i class="material-icons">insert_drive_file</i>
                                                                        </div>
                                                                        <div
                                                                                class=" media-body float-right col-10 pt-1 pr-2">
                                                                            <a href="{{ asset('storage/comments/' . $file->name) }}"
                                                                               data-filter-by="text"
                                                                               class="A-filter-by-text float-right text-right"
                                                                               download="{{ $file->original }}">{{ $file->original }}</a>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @else
                                                            <div class="balon2 p-2 m-0 position-relative"
                                                                 data-is="{{ $comment->user->fio }} - {{ $comment->created_at->format('H:i') }}">
                                                                <a class="float-left mb-1"> {!! nl2br($comment->info) !!} </a>
                                                            </div>
                                                            @foreach($comment->files as $file)
                                                                <div
                                                                        class="float-right col-12 mt-1 media-attachment-left-doc ma-right">
                                                                    <div class="avatar bg-primary float-left col-2">
                                                                        <i class="material-icons">insert_drive_file</i>
                                                                    </div>
                                                                    <div
                                                                            class="media-body float-left col-10 pt-1 pr-2 ml-1">
                                                                        <a href="{{ asset('storage/comments/' . $file->name) }}"
                                                                           data-filter-by="text"
                                                                           class="A-filter-by-text"
                                                                           download="{{ $file->original }}">{{ $file->original }}</a>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div
                                                    class="w-100 card-footer mt-2">
                                                <form class="m-0 p-0"
                                                      action="{{ route('mission.storeComment', $mission->id) }}"
                                                      method="POST" autocomplete="off"
                                                      enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="row m-0 p-0">
                                                        <div class="input-group">
                                                            <textarea id="text"
                                                                   class="mw-100 border rounded form-control"
                                                                   type="text" name="info"
                                                                   title="Ваше сообщение..." placeholder="Ваше сообщение..." rows="1" required></textarea>
                                                            <div class="input-group-append ml-1">
                                                                <button type="submit"
                                                                        class="btn btn-outline-secondary rounded border mr-1"
                                                                        title="Отправить"
                                                                        style="padding-right: 16px;">
                                                                    <i
                                                                            class="far fa-paper-plane"
                                                                            aria-hidden="true"></i></button>
                                                                <div class="custom-file float-right">
                                                                    <input type="file"
                                                                           class="custom-file-input d-none"
                                                                           id="customFile" name="commentFiles[]"
                                                                           multiple>
                                                                    <label
                                                                            class="btn btn-outline-secondary rounded border"
                                                                            for="customFile">
                                                                        <i class="fas fa-paperclip"></i>
                                                                        <span id="fileNumber"
                                                                              class="badge badge-light"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="row">
                                                    <div class="col-12" id="fileNames">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>
    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/i18n/defaults-ru_RU.min.js"></script>

    <script>
        $('input[type=file]').change(function () {
            files = $(this).get(0).files
            $('#fileNames').html('')
            for (let i = 0; i < $(this).get(0).files.length; ++i) {
                let newSpan = document.createElement('span')
                newSpan.className = 'badge badge-light col-12 text-left'
                newSpan.innerHTML = $(this).get(0).files[i].name
                $('#fileNames').append(newSpan)
                console.log($(this).get(0).files[i].name)
            }

            $('#fileNumber').text('+' + $(this).get(0).files.length)
        })
    </script>

    <script>
        $(document).ready(function () {
            $('#help-select').selectpicker('val', $('#help-select').data('content'))
        })
    </script>

    <script>
        $('#worker-select').change(function () {
            if ($.inArray($(this).val(), $('#help-select').val()) != -1) {
                $('#select-error').show()
                $('#help-select').addClass('red-select')
                $('#help-select').closest('div').addClass('red-select')
                $('#btn-form').prop('disabled', 'disabled')
            } else {
                $('#select-error').hide()
                $('#btn-form').prop('disabled', '')
                $('#help-select').closest('div').removeClass('red-select')
            }
        })
        $('#help-select').change(function () {
            if ($.inArray($('#worker-select').val(), $(this).val()) != -1) {
                $('#select-error').show()
                $('#help-select').closest('div').addClass('red-select')
                $('#btn-form').prop('disabled', 'disabled')
            } else {
                $('#select-error').hide()
                $('#help-select').closest('div').removeClass('red-select')
                $('#btn-form').prop('disabled', '')
            }
        })
    </script>

    <script>
        $('#sohbet').scrollTop($('#sohbet').prop("scrollHeight"));

        $(document).ready(function () {
            $('#select-error').hide()
            $('#rewrite_mission').hide()
            $('#rewrite_deadline').hide()
            $('#ok-form').hide()
        })
        $('#rewrite_close').click(function () {
            $('#rewrite_mission').hide()
        })

        $('#deadline_close').click(function () {
            $('#rewrite_deadline').hide()
        })

        $('#ok_close').click(function () {
            $('#ok-form').hide()
        })

        $('#rewrite_button').click(function () {
            $('#rewrite_mission').is(':visible') ? $('#rewrite_mission').hide() : $('#rewrite_mission').show()
        })

        $('#deadline_button').click(function () {
            $('#rewrite_deadline').is(':visible') ? $('#rewrite_deadline').hide() : $('#rewrite_deadline').show()
        })

        $('#ok_button').click(function () {
            $('#ok-form').is(':visible') ? $('#ok-form').hide() : $('#ok-form').show()
        })
    </script>

    <script>
        $('.user-select').selectpicker()
        $('#help-select').selectpicker()
    </script>

    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
@endsection
