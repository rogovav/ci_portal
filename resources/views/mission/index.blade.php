@extends('layout.index')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset("css/dataTables.bootstrap4.min.css") }}">
    <link rel="stylesheet" href="{{ asset('css/sel-boot4.css') }}">
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">--}}
@endsection
@section('content')
    <div class="modal fade bd-example-modal-lg" id="ModalCreateUser" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Создание заявки</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('mission.store') }}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">Информация о заявке</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <select id="client-select" name="client">
                                        <option value=""></option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->fio }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="user-info-popup">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="">
                                                <div class="form-group">
                                                    <input name="" id="" class="form-control"
                                                           placeholder="Номер договора">
                                                </div>
                                                <div class="form-group">
                                                    <input type="tel" id="telephone" class="form-control" name="phone"
                                                           placeholder="Номер телефона" required>
                                                </div>
                                                <div class="form-group">
                                                    <input name="" id="" class="form-control"
                                                           placeholder="Информация о клиенте">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select" name="client">
                                        <option selected disabled>Источник</option>
                                        <option value="1">Задача</option>
                                        <option value="2">Общежитие</option>
                                        <option value="3">Университет</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select" name="priority" id="priority">
                                        <option selected value="">Приоритет</option>
                                        <option value="1">Высокий</option>
                                        <option value="2">Средний</option>
                                        <option value="3">Низкий</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select" name="subject" id="choose-topic">
                                        <option selected value="">Тема</option>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input placeholder="Крайний срок" class="form-control" type="text"
                                           id="date_end"
                                           onfocus="(this.type='datetime-local')"
                                           onblur="(this.type='text')"
                                           name="date_end"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">Выбор сотрудников</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <select id="user-select" name="worker">
                                        <option value=""></option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->fio }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select id="looking-select" name="looking">
                                        <option value=""></option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select id="help-select" class="js-example-placeholder-multiple" name="helper[]"
                                            multiple="multiple">
                                        <option value="1">вавыа</option>
                                        <option value="2">ываыва</option>
                                        <option value="3">ваывпып</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                Местоположение
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <select class="custom-select" name="building">
                                        <option selected value="">Здание</option>
                                        @foreach($buildings as $building)
                                            <option value="{{ $building->id }}">{{ $building->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input name="address" id="" class="form-control" placeholder="Адрес">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">Дополнительная информация</div>
                            <div class="card-body">
                                <div class="form-group">
                            <textarea name="comment" id="comment-user-mission" cols="30" rows="10" class="form-control"
                                      placeholder="Комментарий"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="file_group" id="" class="form-control" multiple></input>
                                </div>
                            </div>
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
                Создать заявку
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card card-table-rendered">
                <table class="table">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Info</th>
                        <th>Тип</th>
                        <th>Автор</th>
                        <th>Исполнитель</th>
                        <th>Тема</th>
                        <th>Клиент</th>
                        <th>Дата начала</th>
                        <th>Deadline</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($missions as $mission)
                        <tr>
                            <td>{{ $mission->id }}</td>
                            <td>{{ $mission->info }}</td>
                            <td>{{ $mission->from }}</td>
                            <td>{{ $mission->owner->fio }}</td>
                            <td>{{ $mission->worker->fio }}</td>
                            <td>{{ $mission->subject->name }}</td>
                            <td>{{ $mission->client->fio }}</td>
                            <td>{{ $mission->date_from }}</td>
                            <td>{{ $mission->date_to }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{--<table id="table_id" class="table table-tasks table-rendered dt-responsive nowrap">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                {{--<th>№</th>--}}
                {{--<th>Info</th>--}}
                {{--<th>Тип</th>--}}
                {{--<th>Автор</th>--}}
                {{--<th>Исполнитель</th>--}}
                {{--<th>Тема</th>--}}
                {{--<th>Клиент</th>--}}
                {{--<th>Дата начала</th>--}}
                {{--<th>Deadline</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--</table>--}}
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset("js/jquery.dataTables.js") }}"></script>
    <script src="{{ asset("js/dataTables.bootstrap4.min.js") }}"></script>
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/i18n/ru.js"></script>

    <script>
        $(document).ready(function () {
            $('.js-example-placeholder-multiple').select2({
                    placeholder: 'Помощь',
                    width: '100%',
                    allowClear: true,
                    theme: 'bootstrap4'

                }
            );

            $('#looking-select').select2({
                    placeholder: 'Наблюдатель',
                    width: '100%',
                    allowClear: true,
                    theme: 'bootstrap4'
                }
            );

            $('#client-select').select2({
                    placeholder: 'Клиент',
                    width: '100%',
                    allowClear: true,
                    theme: 'bootstrap4'
                }
            );

            $('#user-select').select2({
                    placeholder: 'Исполнитель',
                    width: '100%',
                    allowClear: true,
                    theme: 'bootstrap4'
                }
            );

        });
    </script>

    <script src="{{ asset('js/jquery.maskedinput.js') }}"></script>

    <script>
        $("#telephone").mask("+7 (999) 999-99-99");
    </script>

    <script>
        tinymce.init({
            selector: '#comment-user-mission',
            plugins: 'table',
        });
    </script>

    <script>
        $('#client-select').change(function () {
            if ($(this).val() != '') {
                $('.user-info-popup').show();
            } else {
                $('.user-info-popup').hide();
            }
        })
    </script>

    <script>
        $('#table_id').DataTable({
            "order": [[0, "desc"]],
            "language": {
                "processing": "Подождите...",
                "search": "Поиск:",
                "lengthMenu": "Показать _MENU_ записей",
                "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                "infoEmpty": "Записи с 0 до 0 из 0 записей",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "infoPostFix": "",
                "loadingRecords": "Загрузка записей...",
                "zeroRecords": "Записи отсутствуют.",
                "emptyTable": "В таблице отсутствуют данные",
                "paginate": {
                    "first": "Первая",
                    "previous": "Предыдущая",
                    "next": "Следующая",
                    "last": "Последняя"
                },
                "aria": {
                    "sortAscending": ": активировать для сортировки столбца по возрастанию",
                    "sortDescending": ": активировать для сортировки столбца по убыванию"
                }
            },
            "ajax": {
                "url": "/test.json",
                "dataSrc": "data"
            },
            "createdRow": function (row, data, dataIndex) {
                if (data["priority"].includes("green")) {
                    $(row).addClass('deadline-middle');
                } else if (data["priority"].includes("brown")) {
                    $(row).addClass('deadline-expired');
                } else {
                    $(row).addClass('deadline-ok');
                }

                if (data["priority"].includes("clock")) {

                }
            },
            "columns": [
                {data: 'id'},
                {data: 'priority'},
                {data: 'type'},
                {data: 'author'},
                {data: 'worker'},
                {data: 'topic'},
                {data: 'client'},
                {data: 'datefrom'},
                {data: 'deadline'},
            ]
        });

        $(document).ready(function () {
            $('#example').DataTable();
            $('#choose-topic').val() == '-1' ? $('.hidden-topic-input').show() : $('.hidden-topic-input').hide();
            $('#choose-topic').change(function () {
                $(this).val() == '-1' ? $('.hidden-topic-input').show().children('input').removeProp('disabled') :
                    $('.hidden-topic-input').hide().children('input').prop('disabled', 'disabled');

            })
        });
    </script>

    <script>
        $(document).ready(function () {
            let d = new Date();
            d = new Date(d.getTime() - d.getTimezoneOffset() * 60000).toJSON().slice(0, 19)
            $('#date_begin').val(d.replace('T', ' '))
        })

        $('#date_begin').focus(function () {
            let d = new Date();
            d = new Date(d.getTime() - d.getTimezoneOffset() * 60000).toJSON().slice(0, 19)
            $(this).val(d)
        })
        $('#date_begin').blur(function () {
            $(this).val($(this).val().replace('T', ' '))
        })

        $('#priority').change(function () {
            d = new Date()
            switch ($(this).val()) {
                case '1':
                    if (d.getDay() == 5) {
                        d.setDate(d.getDate() + 3)
                        d.setUTCHours(17, 0, 0, 0)
                        break

                    } else if (d.getDay() == 6) {
                        d.setDate(d.getDate() + 2)
                        d.setUTCHours(17, 0, 0, 0)
                        break

                    } else {
                        d.setDate(d.getDay() + 1)
                        d.setUTCHours(17, 0, 0, 0)
                        break
                    }


                case '2':
                    if (d.getDay() == 4 || d.getDay() == 5) {
                        d.setDate(d.getDate() + 4)
                        d.setUTCHours(17, 0, 0, 0)
                        break

                    } else if (d.getDay() == 6) {
                        d.setDate(d.getDate() + 3)
                        d.setUTCHours(17, 0, 0, 0)
                        break

                    } else {
                        d.setDate(d.getDate() + 2)
                        d.setUTCHours(17, 0, 0, 0)
                        break
                    }
                case '3':
                    if (d.getDay() == 3 || d.getDay() == 4 || d.getDay() == 5) {
                        d.setDate(d.getDate() + 5)
                        d.setUTCHours(17, 0, 0, 0)
                        break

                    } else if (d.getDay() == 6) {
                        d.setDate(d.getDate() + 4)
                        d.setUTCHours(17, 0, 0, 0)
                        break

                    } else {
                        d.setDate(d.getDate() + 3)
                        d.setUTCHours(17, 0, 0, 0)
                        break
                    }
            }
            $('#date_end').val(d.toJSON().slice(0, 19))
            $('#date_end').val($('#date_end').val().replace('T', ' '))
        })

        $('#date_end').focus(function () {
            let d = new Date()
            d.setDate(d.getDate() + 1)
            d.setUTCHours(17, 0, 0, 0)
            d = d.toJSON().slice(0, 19)
            $(this).val(d)
        })

        $('#date_end').blur(function () {
            $(this).val($(this).val().replace('T', ' '))
        })
    </script>
@endsection
