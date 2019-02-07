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
                <form action="">
                    <div class="modal-body">
                        <div class="form-group ">
                            <select id="worker-select" class="user-select form-control" name="worker"
                                    title="Сотрудник"
                                    data-live-search="true">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <span class="badge">1 неделя - начало</span>
                                <input id="week1">
                            </div>
                            <div class="col">
                                <span class="badge">1 неделя - конец</span>
                                <input id="week1_end" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <span class="badge">2 неделя - начало</span>
                                <input id="week2">
                            </div>
                            <div class="col">
                                <span class="badge">2 неделя - конец</span>
                                <input id="week2_end" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <span class="badge">3 неделя - начало</span>
                                <input id="week3">
                            </div>
                            <div class="col">
                                <span class="badge">3 неделя - конец</span>
                                <input id="week3_end" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <span class="badge">4 неделя - начало</span>
                                <input id="week4">
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
                <div class="col-6 col-form-label">Отпуска сотрудников на 2019 год</div>
                <div class="col-6">
                    <button class="btn btn-sm float-right" data-toggle="modal" data-target="#exampleModal">Добавить
                        отпуск
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-header">Кулягина Таисия Ивановна</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                    <img class="group-user-avatar-card mb-2"
                                         src="http://localhost:8000/images/avatars/users/kisa.jpg" alt="">
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                                    <table class="table table-sm small">
                                        <tr>
                                            <td><b>№ недели</b></td>
                                            <td><b>Дата</b></td>
                                        </tr>
                                        <tr>
                                            <td>1 неделя</td>
                                            <td>15.02.2019 - 21.02.2019</td>
                                        </tr>
                                        <tr>
                                            <td>2 неделя</td>
                                            <td>15.02.2019 - 21.02.2019</td>
                                        </tr>
                                        <tr>
                                            <td>3 неделя</td>
                                            <td>15.02.2019 - 21.02.2019</td>
                                        </tr>
                                        <tr>
                                            <td>4 неделя</td>
                                            <td>15.02.2019 - 21.02.2019</td>
                                        </tr>
                                    </table>
                                    <button class="btn btn-block btn-sm">Редактировать отпуск</button>
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
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <script src="{{asset('js/date.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('select').selectpicker()
            $('#week1').datepicker({
                uiLibrary: 'bootstrap4',
                value: Date.today().toString('yyyy.MM.dd'),
                format: 'yyyy.mm.dd'
            });
            $('#week1_end').datepicker({
                uiLibrary: 'bootstrap4',
                value: Date.today().addDays(6).toString('yyyy.MM.dd'),
            });

            $('#week2').datepicker({
                uiLibrary: 'bootstrap4',
                value: Date.today().addDays(7).toString('yyyy.MM.dd'),
                format: 'yyyy.mm.dd'
            })

            $('#week2_end').datepicker({
                uiLibrary: 'bootstrap4',
                value: Date.today().addDays(13).toString('yyyy.MM.dd'),
                format: 'yyyy.mm.dd'
            })

            $('#week3').datepicker({
                uiLibrary: 'bootstrap4',
                value: Date.today().addDays(14).toString('yyyy.MM.dd'),
                format: 'yyyy.mm.dd'
            })

            $('#week3_end').datepicker({
                uiLibrary: 'bootstrap4',
                value: Date.today().addDays(20).toString('yyyy.MM.dd'),
                format: 'yyyy.mm.dd'
            })

            $('#week4').datepicker({
                uiLibrary: 'bootstrap4',
                value: Date.today().addDays(21).toString('yyyy.MM.dd'),
                format: 'yyyy.mm.dd'
            })

            $('#week4_end').datepicker({
                uiLibrary: 'bootstrap4',
                value: Date.today().addDays(27).toString('yyyy.MM.dd'),
                format: 'yyyy.mm.dd'
            })
        })
    </script>

    <script>
        $('#week1').change(function () {
            let date = Date.parse($(this).val())
            $(this).val(date.toString('yyyy.MM.dd'))
            $('#week1_end').val(date.addDays(6).toString('yyyy.MM.dd'))
            $('#week2').val(date.addDays(1).toString('yyyy.MM.dd'))
            $('#week2_end').val(date.addDays(6).toString('yyyy.MM.dd'))
            $('#week3').val(date.addDays(1).toString('yyyy.MM.dd'))
            $('#week3_end').val(date.addDays(6).toString('yyyy.MM.dd'))
            $('#week4').val(date.addDays(1).toString('yyyy.MM.dd'))
            $('#week4_end').val(date.addDays(6).toString('yyyy.MM.dd'))
        })
        $('#week2').change(function () {
            let date = Date.parse($(this).val())
            $(this).val(date.toString('yyyy.MM.dd'))
            $('#week2_end').val(date.addDays(6).toString('yyyy.MM.dd'))
            $('#week3').val(date.addDays(1).toString('yyyy.MM.dd'))
            $('#week3_end').val(date.addDays(6).toString('yyyy.MM.dd'))
            $('#week4').val(date.addDays(1).toString('yyyy.MM.dd'))
            $('#week4_end').val(date.addDays(6).toString('yyyy.MM.dd'))
        })
        $('#week3').change(function () {
            let date = Date.parse($(this).val())
            $(this).val(date.toString('yyyy.MM.dd'))
            $('#week3_end').val(date.addDays(6).toString('yyyy.MM.dd'))
            $('#week4').val(date.addDays(1).toString('yyyy.MM.dd'))
            $('#week4_end').val(date.addDays(6).toString('yyyy.MM.dd'))
        })
        $('#week4').change(function () {
            let date = Date.parse($(this).val())
            $(this).val(date.toString('yyyy.MM.dd'))
            $('#week4_end').val(date.addDays(6).toString('yyyy.MM.dd'))
        })
    </script>
@endsection
