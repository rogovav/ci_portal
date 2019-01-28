@extends('layout.index')
@section('css')
    <link rel="stylesheet" href="{{ asset("css/dataTables.bootstrap4.min.css") }}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/css/bootstrap-select.min.css">
@endsection
@section('content')
    <div class="modal fade bd-example-modal-lg" id="ModalCreateUser" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                       placeholder="ФИО клиента" required>
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
                                <div class="form-group">
                                    <select class="custom-select form-control" name="from" title='Источник'>
                                        <option value="1">Задача</option>
                                        <option value="2">Общежитие</option>
                                        <option value="3">Университет</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select form-control" name="priority" id="priority"
                                            title="Приоритет">
                                        <option value="1">Высокий</option>
                                        <option value="2">Средний</option>
                                        <option value="3">Низкий</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select form-control" name="subject" id="choose-topic"
                                            title="Тема">
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                        <option value="-1">Другое</option>
                                    </select>
                                </div>
                                <div class="form-group hidden-topic-input">
                                    <input placeholder="Новая тема" type="text" class="form-control"
                                           name="newSubject" id="hidden-topic">
                                </div>
                                <div class="form-group">
                                    <input placeholder="Крайний срок" class="form-control" type="text"
                                           id="date_end"
                                           onfocus="(this.type='datetime-local')"
                                           onblur="(this.type='text')"
                                           name="date_to"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">Выбор сотрудников</div>
                            <div class="card-body">
                                <div class="form-group ">
                                    <select class="user-select form-control" name="worker" title="Исполнитель"
                                            data-live-search="true">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->fio }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <select id="help-select" class="help-select form-control" name="helper[]"
                                            multiple title="Помощники" data-live-search="true">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->fio }}</option>
                                        @endforeach
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
                                    <select class="custom-select form-control" name="building" title="Здание"
                                            data-live-search="true">
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
                            <textarea name="info" id="comment-user-mission" cols="30" rows="10" class="form-control"
                                      placeholder="Комментарий"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="file_group" id="" class="form-control" multiple>
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
                <div class="row">
                    @foreach($missions->where('status', '<>', 3)->sortByDesc('id') as $mission)
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                        <div class="card">
                            <div class="card-body task-card card-priority-{{ $mission->priority == 1? 'low' : ($mission->priority == 2? 'mid' : 'high') }} pb-0">
                                <div class="progress">
                                    @php
                                        if (strtotime("now") > strtotime($mission->date_to))
                                        {
                                            $per = 100;
                                        } else {
                                            $per = (($mission->date_close ? strtotime($mission->date_close) : strtotime("now")) - strtotime($mission->created_at))/(strtotime($mission->date_to) - strtotime($mission->created_at)) * 100;
                                        }
                                    @endphp
                                    <div class="progress-bar {{ $per < 50? 'bg-success' : ($per < 75? 'bg-warning' : 'bg-danger') }}"
                                         role="progressbar"
                                         style="width: {{ $per }}%"
                                         aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table mb-0">
                                            <thead>
                                                <th>#</th>
                                                <th>Источник</th>
                                                <th>Тема</th>
                                                <th>Исполнитель</th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td width="15%"><a
                                                            href="{{ route('mission.show', $mission->id) }}">#{{ $mission->id }}</a>
                                                </td>
                                                <td width="20%">{{ $from[$mission->from] }}</td>
                                                <td width="25%">{{ $mission->subject->name }}</td>
                                                <td>{{ $mission->worker->fio }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-6"><a href="#"
                                                          class="badge badge-light">{{ $mission->owner->fio }}</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#"
                                           class="badge {{ $mission->status == 1? 'badge-info' : 'badge-warning' }} float-right">{{ $mission->status == 1? 'В работе' : 'Ожидает решения' }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
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
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/i18n/defaults-ru_RU.min.js"></script>

    <script>
        $(document).ready(function () {

            $('select').selectpicker()

            $('.client-select').selectpicker();

            $('.help-select').selectpicker();

            $('.user-select').selectpicker();

        });
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
                console.log(data)
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
            $('#example').DataTable();
            $('#choose-topic').val() == '-1' ? $('.hidden-topic-input').show() : $('.hidden-topic-input').hide();
            $('#choose-topic').change(function () {
                if ($(this).val() == '-1') {
                    $('.hidden-topic-input').show().children('input').prop('disabled', '')
                    $('#hidden-topic').focus()
                } else {
                    $('.hidden-topic-input').hide().children('input').prop('disabled', 'disabled');

                }
            })
        });
    </script>

    <script>
        $(document).ready(function () {
            let d = new Date();
            d = new Date(d.getTime() - d.getTimezoneOffset() * 60000).toJSON().slice(0, 19)
            $('#date_begin').val(d.replace('T', ' '))
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

        $('#date_end').click(function () {
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
