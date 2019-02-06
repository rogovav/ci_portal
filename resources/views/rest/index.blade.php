@extends('layout.index')
@section('css')
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
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
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
@endsection
