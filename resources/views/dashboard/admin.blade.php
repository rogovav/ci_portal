@extends('layout.index')
@section('content')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 admin-card">
            <div class="card admin-card-header">
                <h4>События</h4>
                <div class="card-body row">
                    <div id="accordion2" class="col-md-6">
                        <div class="building-header">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <button class="btn btn-link">
                                        Событие №1
                                    </button>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form action="" class="admin-form">
                            <div class="form-group"><input name="ev-name" type="text" class="form-control"
                                                           placeholder="Название события"></div>
                            <div class="form-group"><input type="submit" class="form-control"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 admin-card">
            <div class="card admin-card-header">
                <h4>Здания</h4>
                <div class="card-body row">
                    <div id="accordion1" class="col-md-6">
                        <div class="building-header">
                            <div class="card-header" id="heading2">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse1"
                                            aria-expanded="true" aria-controls="collapse1">
                                        Общежитие №1
                                    </button>
                                </h5>
                            </div>

                            <div id="collapse1" class="collapse show" aria-labelledby="heading1"
                                 data-parent="#accordion1">
                                <div class="card-body building-body">
                                    <ul>
                                        <li><span><b>Тип: </b></span>Общежитие</li>
                                        <li><span><b>Адрес: </b></span>Серадзская 7, 25</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form action="" class="admin-form">
                            <div class="form-group"><input name="obj-name" type="text" class="form-control"
                                                           placeholder="Название"></div>
                            <div class="form-group"><input name="obj-type" type="text" class="form-control"
                                                           placeholder="Тип"></div>
                            <div class="form-group"><input name="obj-address" type="text" class="form-control"
                                                           placeholder="Адрес"></div>
                            <div class="form-group"><input type="submit" class="form-control"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 admin-card">
            <div class="card admin-card-header">
                <h4>Темы</h4>
                <div class="card-body row">
                    <div id="accordion2" class="col-md-6">
                        <div class="building-header">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <button class="btn btn-link">
                                        Тема №1
                                    </button>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form action="" class="admin-form">
                            <div class="form-group"><input name="tp-name" type="text" class="form-control"
                                                           placeholder="Название темы"></div>
                            <div class="form-group"><input type="submit" class="form-control"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 admin-card">
            <div class="card admin-card-header">
                <h4>Клиенты</h4>
                <div class="card-body row">
                    <div id="accordion2" class="col-md-6">
                        <div class="building-header">
                            <div class="card-header" id="uheading1">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#ucollapse1"
                                            aria-expanded="true" aria-controls="ucollapse1">
                                        Пользователь №1
                                    </button>
                                </h5>
                            </div>

                            <div id="ucollapse1" class="collapse show" aria-labelledby="uheading1"
                                 data-parent="#accordion2">
                                <div class="card-body building-body">
                                    <ul>
                                        <li><span><b>Номер договора: </b></span>Общежитие</li>
                                        <li><span><b>Номер телефона: </b></span>Серадзская 7, 25</li>
                                        <li><span><b>Информация: </b></span>Серадзская 7, 25</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form action="" class="admin-form">
                            <div class="form-group"><input name="cl-name" type="text" class="form-control"
                                                           placeholder="ФИО"></div>
                            <div class="form-group"><input name="cl-cid" type="text" class="form-control"
                                                           placeholder="Номер договра"></div>
                            <div class="form-group"><input name="cl-phone" type="text" class="form-control"
                                                           placeholder="Номер телефона"></div>
                            <div class="form-group"><input name="cl-info" type="text" class="form-control"
                                                           placeholder="Информация"></div>
                            <div class="form-group"><input type="submit" class="form-control"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('.collapse').collapse('toggle');
    </script>
@endsection
