@extends('layout.index')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/css/bootstrap-select.min.css">
    <style>
        .modal-lg {
            max-width: 1000px;
        }
    </style>
@endsection
@section('content')
    <div class="modal fade bd-example-modal-lg" id="ModalCreateUser" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Создание заявки</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('mission.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">Информация о заявке</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <span class="badge badge-danger">Обязательное поле</span>
                                    <select class="custom-select form-control" id="from_input" name="from"
                                            title='Источник' required>
                                        <option value="1">Задача</option>
                                        <option value="2">Общежитие</option>
                                        <option value="3">Университет</option>
                                    </select>
                                </div>
                                <div class="form-group" id="choose-topic">
                                    <span class="badge badge-danger">Обязательное поле</span>
                                    <select class="custom-select form-control" name="subject"
                                            title="Тема" id="choose_select_inner" required>

                                        <option value="-1">Другое</option>
                                    </select>
                                </div>
                                <div class="form-group hidden-topic-input">
                                    <span class="badge badge-danger">Обязательное поле</span>
                                    <input placeholder="Тема" type="text" class="form-control"
                                           name="newSubject" id="hidden-topic" required>
                                </div>
                                <div class="form-group">
                                    <select id="client-select" class="client-select form-control"
                                            data-live-search="true" name="client"
                                            title="Клиент">
                                        <option value="-1">Создать нового клиента</option>
                                        @foreach($clients as $client)
                                            <option class="client-fio"
                                                    value="{{ $client->id }}"
                                                    data-fio="{{ $client }}">{{ $client->fio }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="user-info-popup">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <input name="clientFio" id="clientFio" class="form-control"
                                                       placeholder="ФИО клиента">
                                            </div>
                                            <div class="form-group">
                                                <input name="clientCid" id="clientCid" class="form-control"
                                                       placeholder="Номер договора">
                                            </div>
                                            <div class="form-group">
                                                <input type="tel" id="telephone" class="form-control" name="clientTel"
                                                       placeholder="Номер телефона">
                                            </div>
                                            <div class="form-group">
                                                <input type="tel" id="itelephone" class="form-control" name="clientITel"
                                                       placeholder="Внутренний номер">
                                            </div>
                                            <div class="form-group">
                                                <input id="clientEmail" class="form-control" name="clientEmail"
                                                       placeholder="Электронная почта">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <span class="badge badge-light">Приоритет:</span>
                                            <select class="custom-select form-control" name="priority" id="priority"
                                                    title="Приоритет">
                                                <option value="1">Высокий</option>
                                                <option value="2" selected>Средний</option>
                                                <option value="3">Низкий</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <span class="badge badge-light">Выполнить до:</span>
                                            <input placeholder="Крайний срок" class="form-control" type="datetime-local"
                                                   id="date_end"
                                                   name="date_to"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">Выбор сотрудников</div>
                            <div class="card-body">
                                <div class="form-group ">
                                    <span class="badge badge-danger">Обязательное поле</span>
                                    <select id="worker-select" class="user-select form-control" name="worker"
                                            title="Исполнитель"
                                            data-live-search="true" required>
                                        @foreach($users->where('id', '<>', Auth::id()) as $user)
                                            <option value="{{ $user->id }}">{{ $user->fio }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <select id="help-select" class="help-select form-control" name="helper[]"
                                            multiple title="Помощники" data-live-search="true">
                                        @foreach($users->where('id', '<>', Auth::id()) as $user)
                                            <option value="{{ $user->id }}">{{ $user->fio }}</option>
                                        @endforeach
                                    </select>
                                    <span id="select-error" class="badge badge-danger">Исполнитель не может быть помощником</span>
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                Местоположение
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <select class="custom-select form-control" data-size="5" name="building"
                                            title="Здание"
                                            data-live-search="true">
                                        @foreach($buildings as $building)
                                            <option value="{{ $building->id }}">{{ $building->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input name="address" id="" class="form-control"
                                           placeholder="Этаж, аудитория и тд.">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">Дополнительная информация</div>
                            <div class="card-body">
                                <div class="form-group">
                            <textarea name="info" id="comment-user-mission" cols="30" rows="10" class="form-control"
                                      placeholder="Комментарий"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="files[]" id="" class="form-control" multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-form" type="submit" class="btn btn-primary">Создать</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button class="btn btn-primary create-user-button btn-sm" data-toggle="modal"
                    data-target="#ModalCreateUser">
                Создать заявку
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card card-table-rendered padding-0">
                <div class="row">
                    <div class="col-12">
                        <table id="example" class="table table-bordered dt-responsive nowrap" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Источник</th>
                                <th>Тема</th>
                                <th>Исполнитель</th>
                                <th>Создатель</th>
                                <th>Статус</th>

                            </tr>
                            {{--                            <tr class="search-tr">--}}
                            {{--                                <th>#</th>--}}
                            {{--                                <th>Источник</th>--}}
                            {{--                                <th>Тема</th>--}}
                            {{--                                <th>Исполнитель</th>--}}
                            {{--                                <th>Создатель</th>--}}
                            {{--                                <th>Статус</th>--}}
                            {{--                            </tr>--}}
                            </thead>
                            <tbody>
                            @foreach($missions as $mission)
                                <tr data-link="{{ route('mission.show', $mission->id) }}"
                                    class="tr-hoverable card-priority-{{ $mission->priority == 1? 'low' : ($mission->priority == 2? 'mid' : 'high') }}">
                                    <td class="align-middle">

                                        <span>{{ $mission->id }}</span>

                                    </td>
                                    <td class="align-middle">{{ $from[$mission->from] }}</td>
                                    <td class="align-middle">{{$mission->subject->name}}</td>
                                    <td class="align-middle">{{$mission->worker->fio}}</td>
                                    <td class="align-middle">{{$mission->owner->fio}}</td>
                                    <td class="align-middle"><span
                                            class="badge {{ $mission->status == 1? 'badge-info' : 'badge-warning' }} font-weight-normal">{{ $mission->status == 1? 'В работе' : 'Ожидает решения' }}</span>
                                    </td>
                                </tr>
                                {{--                                <tr>--}}
                                {{--                                    <td colspan="6">--}}
                                {{--                                        <div class="progress" style="height: 3px !important;">--}}
                                {{--                                            @php--}}
                                {{--                                                if (strtotime("now") > strtotime($mission->date_to))--}}
                                {{--                                                {--}}
                                {{--                                                    $per = 100;--}}
                                {{--                                                } else {--}}
                                {{--                                                    $per = (($mission->date_close ? strtotime($mission->date_close) : strtotime("now")) - strtotime($mission->created_at))/(strtotime($mission->date_to) - strtotime($mission->created_at)) * 100;--}}
                                {{--                                                }--}}
                                {{--                                            @endphp--}}
                                {{--                                            <div--}}
                                {{--                                                class="progress-bar {{ $per < 50? 'bg-success' : ($per < 75? 'bg-warning' : 'bg-danger') }}"--}}
                                {{--                                                role="progressbar"--}}
                                {{--                                                style="width: {{ $per }}%"--}}
                                {{--                                                aria-valuemin="0"--}}
                                {{--                                                aria-valuemax="100"></div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </td>--}}
                                {{--                                </tr>--}}
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{--    <div class="row">--}}
    {{--        <div class="col">--}}
    {{--            <div class="card card-table-rendered padding-0">--}}
    {{--                <div class="row">--}}
    {{--                    @foreach($missions as $mission)--}}
    {{--                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">--}}
    {{--                            <div class="card">--}}
    {{--                                <div--}}
    {{--                                    class="card-body task-card card-priority-{{ $mission->priority == 1? 'low' : ($mission->priority == 2? 'mid' : 'high') }} pb-0 padding-0">--}}
    {{--                                    <div class="progress">--}}
    {{--                                        @php--}}
    {{--                                            if (strtotime("now") > strtotime($mission->date_to))--}}
    {{--                                            {--}}
    {{--                                                $per = 100;--}}
    {{--                                            } else {--}}
    {{--                                                $per = (($mission->date_close ? strtotime($mission->date_close) : strtotime("now")) - strtotime($mission->created_at))/(strtotime($mission->date_to) - strtotime($mission->created_at)) * 100;--}}
    {{--                                            }--}}
    {{--                                        @endphp--}}
    {{--                                        <div--}}
    {{--                                            class="progress-bar {{ $per < 50? 'bg-success' : ($per < 75? 'bg-warning' : 'bg-danger') }}"--}}
    {{--                                            role="progressbar"--}}
    {{--                                            style="width: {{ $per }}%"--}}
    {{--                                            aria-valuemin="0"--}}
    {{--                                            aria-valuemax="100"></div>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="row">--}}
    {{--                                        <div class="col-12">--}}

    {{--                                            <table class="table mb-0">--}}
    {{--                                                <thead>--}}
    {{--                                                <th>#</th>--}}
    {{--                                                <th>Источник</th>--}}
    {{--                                                <th>Тема</th>--}}
    {{--                                                <th>Исполнитель</th>--}}
    {{--                                                </thead>--}}
    {{--                                                <tbody>--}}
    {{--                                                <tr>--}}
    {{--                                                    <td width="15%"><a--}}
    {{--                                                            href="{{ route('mission.show', $mission->id) }}">#{{ $mission->id }}</a>--}}
    {{--                                                    </td>--}}
    {{--                                                    <td width="20%">{{ $from[$mission->from] }}</td>--}}
    {{--                                                    <td width="25%">{{ $mission->subject->name }}</td>--}}
    {{--                                                    <td>{{ $mission->worker->fio }}</td>--}}
    {{--                                                </tr>--}}
    {{--                                                </tbody>--}}
    {{--                                            </table>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="card-footer">--}}
    {{--                                    <div class="row">--}}
    {{--                                        <div class="col-6">--}}
    {{--                                            <span class="badge badge-light">{{ $mission->owner->fio }}</span>--}}

    {{--                                        </div>--}}
    {{--                                        <div class="col-6">--}}
    {{--                                            <span--}}
    {{--                                                class="badge {{ $mission->status == 1? 'badge-info' : 'badge-warning' }} float-right font-weight-normal">{{ $mission->status == 1? 'В работе' : 'Ожидает решения' }}</span>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    @endforeach--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
@section('js')
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/i18n/defaults-ru_RU.min.js"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.tr-hoverable').click(function () {
                window.location = $(this).data("link");
            })

            $('#example').DataTable({
                fixedHeader: true,
                responsive: true,
                lengthMenu: [[25, 50, 100, -1], [25, 50, 100, "Все"]],
                order: [[0, 'desc']],
                language: {
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
                }
            });
            // Setup - add a text input to each footer cell
            $('#example .search-tr th').each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control" />');
            });

            // DataTable
            var table = $('#example').DataTable();

            // Apply the search
            table.columns().every(function () {
                var that = this;

                $('input', this.header()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>

    <script>
        tinymce.init({
            selector: '#comment-user-mission',
            plugins: "table, codesample, textcolor image, media"
        });
    </script>

    <script>
        $('#from_input').change(function () {
            url = ''
            if ($(this).val() == 2) {
                url = 'Общежитие'
            } else if ($(this).val() == 3) {
                url = 'Университет'
            }
            if ($(this).val() != 1) {
                $.get({
                    url: '/api/subjects/' + url,
                    success: function (result) {
                        $('#choose_select_inner').find('option').remove().end();

                        $.each(result, function (value, key) {
                            $('#choose_select_inner').append('<option value="' + key.id + '">' + key.name + '</option>')
                        });
                        $('#choose_select_inner').selectpicker('refresh');
                    }
                })
                $('#choose-topic').show()
                $('.hidden-topic-input').hide().children('input').prop('disabled', 'disabled');
            } else {
                $('.hidden-topic-input').show().children('input').prop('disabled', '')
                //$('#choose-topic').hide()
                $('#choose_select_inner').selectpicker('val', '-1')
                $('#hidden-topic').focus()
                $('#choose-topic').hide();
            }
        })
    </script>

    <script>
        $(document).ready(function () {
            $('.hidden-topic-input').hide();
            $('#select-error').hide()
            $('select').selectpicker()
            $('.client-select').selectpicker();
            $('.help-select').selectpicker();
            $('.user-select').selectpicker();
        });
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

    <script src="{{ asset('js/jquery.maskedinput.js') }}"></script>

    <script>
        $("#telephone").mask("+7 (999) 999-99-99");
    </script>

    <script>
        $('#client-select').change(function () {
            if ($(this).val() == '-1') {
                $('.user-info-popup').show();
                $('#clientCid').prop('disabled', '');
                $('#clientFio').prop('disabled', '');
                $('#clientEmail').prop('disabled', '');
                $('#telephone').prop('disabled', '');
                $('#itelephone').prop('disabled', '');
                $('#clientCid').val('')
                $('#clientFio').val('')
                $('#clientEmail').val('')
                $('#telephone').val('')
                $('#itelephone').val('')
            } else if ($(this).val() != '') {
                $('.user-info-popup').show();
                let data = $(this).find(":selected").data('fio');
                $('#clientCid').prop('disabled', '');
                $('#clientFio').prop('disabled', '');
                $('#clientEmail').prop('disabled', '');
                $('#telephone').prop('disabled', '');
                $('#itelephone').prop('disabled', '');
                $('#clientCid').val(data.cid)
                $('#clientFio').val(data.fio)
                $('#clientEmail').val(data.mail)
                $('#telephone').val(data.phone)
                $('#itelephone').val(data.iphone)

            } else {
                $('.user-info-popup').hide();
                $('#clientCid').prop('disabled', 'disabled');
                $('#clientFio').prop('disabled', 'disabled');
                $('#clientEmail').prop('disabled', 'disabled');
                $('#telephone').prop('disabled', 'disabled');
                $('#itelephone').prop('disabled', 'disabled');
            }
        })
    </script>

    <script>
        $(document).ready(function () {
            let d = new Date();
            d = new Date(d.getTime() - d.getTimezoneOffset() * 60000).toJSON().slice(0, 19)
            $('#date_begin').val(d.replace('T', ' '))
            d = new Date();
            if (d.getDay() == 4 || d.getDay() == 5) {
                d.setDate(d.getDate() + 4)
                d.setUTCHours(17, 0, 0, 0)

            } else if (d.getDay() == 6) {
                d.setDate(d.getDate() + 3)
                d.setUTCHours(17, 0, 0, 0)

            } else {
                d.setDate(d.getDate() + 2)
                d.setUTCHours(17, 0, 0, 0)
            }

            $('#date_end').val(d.toJSON().slice(0, 19))
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
                        d.setDate(d.getDate() + 1)
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
        })

        // $('#date_end').focus(function () {
        //     let d = $(this).val()
        //     // d.setDate(d.getDate() + 1)
        //     // d.setUTCHours(17, 0, 0, 0)
        //     //d = d.toJSON().slice(0, 19)
        //     console.log(d)
        //     $(this).val(d)
        // })
        //
        // $('#date_end').click(function () {
        //     let d = $(this).val()
        //     // d.setDate(d.getDate() + 1)
        //     // d.setUTCHours(17, 0, 0, 0)
        //     //d = d.toJSON().slice(0, 19)
        //     console.log(d)
        //     $(this).val(d)
        // })
        //
        // $('#date_end').blur(function () {
        //     $(this).val($(this).val().replace('T', ' '))
        // })
    </script>
@endsection
