@extends('layout.index')
@section('css')
    <link rel="stylesheet" href="{{ asset("css/dataTables.bootstrap4.min.css") }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
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
                        <div class="form-group">
                            <select class="custom-select" name="from">
                                <option selected disabled>Источник</option>
                                <option value="1">Задача</option>
                                <option value="2">Общежитие</option>
                                <option value="3">Университет</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="client">
                                <option selected disabled>Клиент</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->fio }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="user-info-popup">
                            <div class="form-group">
                                <input name="" id="" class="form-control" placeholder="Номер договора">
                            </div>
                            <div class="form-group">
                                <input name="" id="" class="form-control" placeholder="Номер телефона">
                            </div>
                            <div class="form-group">
                                <input name="" id="" class="form-control" placeholder="Информация о клиенте">
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="building">
                                <option selected>Здание</option>
                                @foreach($buildings as $building)
                                    <option value="{{ $building->id }}">{{ $building->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input name="address" id="" class="form-control" placeholder="Адрес">
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="subject" id="choose-topic">
                                <option selected disabled>Тема</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group hidden-topic-input">
                            <input class="form-control" type="text" name="new_subject" placeholder="Введите название новой темы">
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="worker">
                                <option selected disabled>Исполнитель</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->fio }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="helper">
                                <option selected>Помощники</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="watcher">
                                <option selected>Наблюдатели</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="priority">
                                <option selected disabled>Приоритет</option>
                                <option value="1">Высокий</option>
                                <option value="2">Средний</option>
                                <option value="3">Низкий</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input placeholder="Дата начала" class="form-control" type="text"
                                   onfocus="(this.type='date')" name="date_from" required>
                        </div>
                        <div class="form-group">
                            <input placeholder="Крайний срок" class="form-control" type="text"
                                   onfocus="(this.type='date')" name="date_to" required>
                        </div>
                        <div class="form-group">
                            <textarea name="info" id="comment-user-mission" cols="30" rows="10" class="form-control"
                                      placeholder="Комментарий"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" name="file_group" id="" class="form-control" multiple>
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

    <script>
        $(document).ready(function () {
            dropDown = $(".dropdown-search");
            selectId = 0;
            let items = [
                {value: 1, text: 'Sony'},
                {value: 2, text: 'LG'},
                {value: 3, text: 'Apple'},
                {value: 4, text: 'One Plus'},
                {value: 5, text: 'Android'},
                {value: 6, text: 'Iphone'}

            ];
            items.forEach(function (item) {
                selectId++;
                (dropDown).append(
                    '<div class="item">' +
                    '   <div class="live-checkbox">' +
                    '       <span class="live-label form-control" onclick="GetValue(id)" ' + 'id=live-' + selectId + '>' + item['text'] + '</span>' +
                    '   </div>' +
                    '</div>'
                );
            });
        });

        function GetValue(id) {
            $("#live-search").val($("#" + id).text());
            if ($("#live-search").val() != "") {
                $(".user-info-popup").show();
            }
        }

        $("select[name=source]").change(function () {
            switch ($(this).val()) {
                case "1":
                    $(".live-form-group, .user-info-popup").hide();
                    break;
                case "2":
                    $(".live-form-group").show();
                    break;
            }
        });

        $('input[name=live-search]').on('keyup focus', function () {
            let filter = $(this);
            let text = filter.val();
            console.log(text);
            dropDown = $(".dropdown-search");
            dropDown.find('.item').each(function () {
                var item = $(this);
                console.log(item.html().includes(text));
                if (item.html().includes(text)) {
                    item.show();
                } else {
                    item.hide();
                }
            });
        });

    </script>
    <script>
        tinymce.init({
            selector: '#comment-user-mission',
            plugins: 'table',
        });
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
@endsection
