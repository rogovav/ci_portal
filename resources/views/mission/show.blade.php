@extends('layout.index')
@section('content')
    <div class="card">
        <div class="card-header card-priority-mid-header">
            <div class="row align-items-center">
                <div class="col-2 col-form-label">
                    <h6 class="">Заявка <b>#{{ $mission->id }}</b> ({{ $from[$mission->from] }})</h6>
                </div>
                <div class="col-8">
                    <div class="row mb-1">
                        <div class="col-4 text-left">
                            <span class="badge badge-info">{{ $mission->created_at }}</span> {{-- Вт, 22-го янв., 13:22:44 --}}
                        </div>
                        <div class="col-4 text-center ">
                            <span class="badge badge-success"><i class="far fa-calendar{{ $mission->status == 1? Null : ($mission->status == 2? '-minus' : '-check') }}"></i> {{ $status[$mission->status] }} </span>
                        </div>
                        <div class="col-4 text-right ">
                            <span class="badge badge-info">{{ $mission->date_to }}</span>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated {{ $per < 50? 'bg-primary' : ($per < 75? 'bg-warning' : 'bg-danger') }}"
                             role="progressbar"
                             style="width: {{ $per }}%" aria-valuenow="10" aria-valuemin="0"
                             aria-valuemax="100">
                            {{--после 50%--}}
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-secondary btn-sm col-6 float-right">Выполнить
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body card-priority-mid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            Информация о заявке
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header card-client-header"><b>Клиент:</b> {{ $mission->client->fio }}</div>
                                        <div class="card-body card-client">
                                            <table class="table table-sm mb-0">
                                                <tr>
                                                    <th>Телефон</th>
                                                    <td>{{ $mission->client->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Договор</th>
                                                    <td>{{ $mission->client->cid }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Адрес</th>
                                                    <td>{{ $mission->building->name }}, {{ $mission->address }}, {{ $mission->building->address }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header card-info-header">
                                    <span><b>Тема: </b>{{ $mission->subject->name }}</span>
                                </div>
                                <div class="card-body card-info">
                                    {!! $mission->info !!}
                                </div>
                                <div class="card-footer card-info-header">
                                    <div class="row">
                                        @foreach($mission->files as $file)
                                        <div class="col-1">
                                            <a href="{{ asset('storage/missions/' . $file->name) }}" class="black-file" download
                                               data-container="body" data-trigger="hover"
                                               data-toggle="popover"
                                               data-placement="bottom"
                                               data-content="{{ $file->name }}">
                                                <i class="far fa-2x fa-file"></i>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-4">
                                    <button type="button" class="btn btn-info btn-sm col-12">Переадресовать заявку
                                    </button>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-primary btn-sm col-12">Подтвердить закрытие
                                    </button>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-warning btn-sm col-12">Изменить Deadline
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    Исполнительная группа
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="card">
                                                <div class="card-header text-center card-priority-high-header">
                                                    <b>Автор</b>
                                                </div>
                                                <div class="card-body card-priority-high">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <img class="users-helpers-img m-auto"
                                                                 style="display: block"
                                                                 data-container="body" data-trigger="hover"
                                                                 data-toggle="popover"
                                                                 data-placement="bottom"
                                                                 data-content="Автор"
                                                                 src="{{ asset('images/avatars/users/' . $mission->owner->avatar ) }}"
                                                                 alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="card">
                                                <div class="card-header text-center card-priority-mid-header">
                                                    <b>Исполнитель</b>
                                                </div>
                                                <div class="card-body card-priority-mid">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <img class="users-helpers-img m-auto"
                                                                 style="display: block"
                                                                 data-container="body" data-trigger="hover"
                                                                 data-toggle="popover"
                                                                 data-placement="bottom"
                                                                 data-content="Исполнитель"
                                                                 src="{{ asset('images/avatars/users/' . $mission->worker->avatar ) }}"
                                                                 alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-header text-center card-priority-low-header">
                                                    <b>Помощники</b>
                                                </div>
                                                <div class="card-body card-priority-low">
                                                    <div class="row">
                                                        @foreach($mission->helpers as $helper)
                                                        <div class="col-1">
                                                            <img class="users-helpers-img"
                                                                 data-container="body" data-trigger="hover"
                                                                 data-toggle="popover"
                                                                 data-placement="bottom"
                                                                 data-content="Помощник 1"
                                                                 src="{{ asset('images/avatars/users/' . $helper->avatar ) }}"
                                                                 alt="">
                                                        </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                            <div class="card-body">
                                                <div id="sohbet"
                                                     class="card border-0 m-0 p-0 position-relative bg-transparent"
                                                     style="overflow-y: scroll;">
                                                    <div class="balon1 p-2 m-0 position-relative"
                                                         data-is="You - 3:20 pm">
                                                        <a class="float-right mb-1"> Hey there! What's up? </a>
                                                        <div
                                                            class="float-right col-12 mt-1 media-attachment-right-doc ma-right">
                                                            <div class="avatar bg-primary float-right col-2">
                                                                <i class="material-icons">insert_drive_file</i>
                                                            </div>
                                                            <div class="media-body float-right col-10 pt-1 pr-2">
                                                                <a href="#" data-filter-by="text"
                                                                   class="A-filter-by-text float-right">Документ
                                                                    к заявке.doc</a>
                                                                <br>
                                                                <span data-filter-by="text"
                                                                      class="SPAN-filter-by-text float-right">24kb Document</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="float-right col-12 mt-1 media-attachment-right-doc">
                                                            <div
                                                                class="avatar bg-primary bg-primary float-right col-2">
                                                                <i class="material-icons">insert_drive_file</i>
                                                            </div>
                                                            <div class="media-body float-right col-10 pt-1 pr-2">
                                                                <a href="#" data-filter-by="text"
                                                                   class="A-filter-by-text float-right">документ.pdf</a>
                                                                <br>
                                                                <span data-filter-by="text"
                                                                      class="SPAN-filter-by-text float-right">24kb Document</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="balon2 p-2 m-0 position-relative"
                                                         data-is="Yusuf - 3:22 pm">
                                                        <a class="float-left sohbet2"> Checking out iOS7 you
                                                            know.. </a>
                                                        <div
                                                            class="float-left col-12 mt-1 media-attachment-left-doc">
                                                            <div class="avatar bg-primary float-left col-2">
                                                                <i class="material-icons">insert_drive_file</i>
                                                            </div>
                                                            <div class="media-body float-left col-10 pt-1 pl-2">
                                                                <a href="#" data-filter-by="text"
                                                                   class="A-filter-by-text">Документ к заявке.doc</a>
                                                                <span data-filter-by="text" class="SPAN-filter-by-text">24kb Document</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="float-left col-12 mt-1 media-attachment-left-doc">
                                                            <div
                                                                class="avatar bg-primary float-left col-2">
                                                                <i class="material-icons">insert_drive_file</i>
                                                            </div>
                                                            <div class="media-body float-left col-10 pt-1 pl-2">
                                                                <a href="#" data-filter-by="text"
                                                                   class="A-filter-by-text">картинка.img</a>
                                                                <span data-filter-by="text" class="SPAN-filter-by-text">24kb Document</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="w-100 card-footer mt-2">
                                                        <form class="m-0 p-0" action="" method="POST"
                                                              autocomplete="off">
                                                            <div class="row m-0 p-0">
                                                                <div class="input-group">
                                                                    <input id="text"
                                                                           class="mw-100 border rounded form-control"
                                                                           type="text" name="text"
                                                                           title="Ваше сообщение..."
                                                                           placeholder="Ваше сообщение..." required>
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
                                                                                   id="customFile" multiple>
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
        </div>
    </div>

@endsection
@section('js')
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
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
@endsection
