@extends('layout.index')
@section('css')
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/css/bootstrap-select.min.css">
@endsection
@section('content')
    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Отпуск сотрудника</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('rest.store') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden">
                    <div class="modal-body">
                        <div class="form-group ">
                            <select id="user-select" class="user-select form-control" name="user"
                                    title="Сотрудник"
                                    data-live-search="true" required>
                                <option value="">Сотрудник</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->fio }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <span class="badge">1 неделя - начало</span>
                                <input id="week1" name="week1">
                            </div>
                            <div class="col">
                                <span class="badge">1 неделя - конец</span>
                                <input id="week1_end" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <span class="badge">2 неделя - начало</span>
                                <input id="week2" name="week2">
                            </div>
                            <div class="col">
                                <span class="badge">2 неделя - конец</span>
                                <input id="week2_end" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <span class="badge">3 неделя - начало</span>
                                <input id="week3" name="week3">
                            </div>
                            <div class="col">
                                <span class="badge">3 неделя - конец</span>
                                <input id="week3_end" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <span class="badge">4 неделя - начало</span>
                                <input id="week4" name="week4">
                            </div>
                            <div class="col">
                                <span class="badge">4 неделя - конец</span>
                                <input id="week4_end" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-9 col-xl-10 col-form-label">Отпуска сотрудников на 2019 год</div>
                <div class="col-12 col-md-4 col-lg-3 col-xl-2">
                    <button class="btn btn-sm float-right btn-block" {{-- data-toggle="modal" data-target="#exampleModal" --}} onclick="clearModal()">Добавить
                        отпуск
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($rests as $rest)
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="card">
                            <div class="card-header">{{ $rest->user->fio }}</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                        <img class="group-user-avatar-card mb-2"
                                             src="{{ asset('images/avatars/users/' . $rest->user->avatar) }}" alt="">
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
                                        <table class="table table-sm small">
                                            <tr>
                                                <td><b>№ недели</b></td>
                                                <td><b>Дата</b></td>
                                            </tr>
                                            <tr>
                                                <td>1 неделя</td>
                                                <td>{{ date('d.m.Y', strtotime($rest->week1)) }} - {{ date('d.m.Y', strtotime($rest->week1 . ' + 6 days')) }}</td>
                                            </tr>
                                            <tr>
                                                <td>2 неделя</td>
                                                <td>{{ date('d.m.Y', strtotime($rest->week2)) }} - {{ date('d.m.Y', strtotime($rest->week2 . ' + 6 days')) }}</td>
                                            </tr>
                                            <tr>
                                                <td>3 неделя</td>
                                                <td>{{ date('d.m.Y', strtotime($rest->week3)) }} - {{ date('d.m.Y', strtotime($rest->week3 . ' + 6 days')) }}</td>
                                            </tr>
                                            <tr>
                                                <td>4 неделя</td>
                                                <td>{{ date('d.m.Y', strtotime($rest->week4)) }} - {{ date('d.m.Y', strtotime($rest->week4 . ' + 6 days')) }}</td>
                                            </tr>
                                        </table>
                                        <button class="btn btn-block btn-sm" onclick="changeRest({{ $rest }})">Редактировать отпуск</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>
    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/i18n/defaults-ru_RU.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <script src="{{asset('js/date.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('select').selectpicker()
            $('#week1').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'dd.mm.yyyy'
            });
            $('#week1_end').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'dd.mm.yyyy'
            });

            $('#week2').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'dd.mm.yyyy'
            })

            $('#week2_end').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'dd.mm.yyyy'
            })

            $('#week3').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'dd.mm.yyyy'
            })

            $('#week3_end').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'dd.mm.yyyy'
            })

            $('#week4').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'dd.mm.yyyy'
            })

            $('#week4_end').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'dd.mm.yyyy'
            })
        })
    </script>

    <script>
        {{-- Мешает при редактировании отпуска --}}

        $('#week1').change(function () {
            let date = Date.parse($(this).val())
            $(this).val(date.toString('dd.MM.yyyy'))
            $('#week1_end').val(date.addDays(6).toString('dd.MM.yyyy'))
            // $('#week2').val(date.addDays(1).toString('dd.MM.yyyy'))
            // $('#week2_end').val(date.addDays(6).toString('dd.MM.yyyy'))
            // $('#week3').val(date.addDays(1).toString('dd.MM.yyyy'))
            // $('#week3_end').val(date.addDays(6).toString('dd.MM.yyyy'))
            // $('#week4').val(date.addDays(1).toString('dd.MM.yyyy'))
            // $('#week4_end').val(date.addDays(6).toString('dd.MM.yyyy'))
        })
        $('#week2').change(function () {
            let date = Date.parse($(this).val())
            $(this).val(date.toString('dd.MM.yyyy'))
            $('#week2_end').val(date.addDays(6).toString('dd.MM.yyyy'))
            // $('#week3').val(date.addDays(1).toString('dd.MM.yyyy'))
            // $('#week3_end').val(date.addDays(6).toString('dd.MM.yyyy'))
            // $('#week4').val(date.addDays(1).toString('dd.MM.yyyy'))
            // $('#week4_end').val(date.addDays(6).toString('dd.MM.yyyy'))
        })
        $('#week3').change(function () {
            let date = Date.parse($(this).val())
            $(this).val(date.toString('dd.MM.yyyy'))
            $('#week3_end').val(date.addDays(6).toString('dd.MM.yyyy'))
            // $('#week4').val(date.addDays(1).toString('dd.MM.yyyy'))
            // $('#week4_end').val(date.addDays(6).toString('dd.MM.yyyy'))
        })
        $('#week4').change(function () {
            let date = Date.parse($(this).val())
            $(this).val(date.toString('dd.MM.yyyy'))
            $('#week4_end').val(date.addDays(6).toString('dd.MM.yyyy'))
        })

        function clearModal() {
            $('#week1').val(Date.today().toString('dd.MM.yyyy'))
            $('#week1_end').val(Date.today().addDays(6).toString('dd.MM.yyyy'))
            $('#week2').val(Date.today().addDays(7).toString('dd.MM.yyyy'))
            $('#week2_end').val(Date.today().addDays(13).toString('dd.MM.yyyy'))
            $('#week3').val(Date.today().addDays(14).toString('dd.MM.yyyy'))
            $('#week3_end').val(Date.today().addDays(20).toString('dd.MM.yyyy'))
            $('#week4').val(Date.today().addDays(21).toString('dd.MM.yyyy'))
            $('#week4_end').val(Date.today().addDays(27).toString('dd.MM.yyyy'))
            $("#user-select").val("").change()
            $('#exampleModal form').attr('action', '/rest')
            $('#exampleModal').modal('show')
        }

        function changeRest(data) {
            $('#week1').val(Date.parse(data.week1).toString('dd.MM.yyyy'))
            $('#week1_end').val(Date.parse(data.week1).addDays(6).toString('dd.MM.yyyy'))
            $('#week2').val(Date.parse(data.week2).toString('dd.MM.yyyy'))
            $('#week2_end').val(Date.parse(data.week2).addDays(6).toString('dd.MM.yyyy'))
            $('#week3').val(Date.parse(data.week3).toString('dd.MM.yyyy'))
            $('#week3_end').val(Date.parse(data.week3).addDays(6).toString('dd.MM.yyyy'))
            $('#week4').val(Date.parse(data.week4).toString('dd.MM.yyyy'))
            $('#week4_end').val(Date.parse(data.week4).addDays(6).toString('dd.MM.yyyy'))
            $("#user-select").val(data.user_id).change()
            $('#exampleModal form').attr('action', '/rest/' + data.id)
            $('#exampleModal').modal('show')
        }
    </script>
@endsection
