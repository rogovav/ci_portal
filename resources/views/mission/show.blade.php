@extends('layout.index')
@section('content')
    <div class="card">
        <div class="card-header card-priority-mid-header">
            <div class="row align-items-center">
                <div class="col-2 col-form-label">
                    <h6 class="">Заявка <b>#1111</b> (Задача)</h6>
                </div>
                <div class="col-8">
                    <div class="row mb-1">
                        <div class="col-4 text-left">
                            <span class="badge badge-info">Вт, 22-го янв., 13:22:44</span>
                        </div>
                        <div class="col-4 text-center ">
                            <span class="badge badge-success"><i class="far fa-calendar-check"></i> Выполнено</span>
                        </div>
                        <div class="col-4 text-right ">
                            <span class="badge badge-info">Ср, 23-го янв., 17:00:00</span>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                             role="progressbar"
                             style="width: 50%" aria-valuenow="10" aria-valuemin="0"
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
                                        <div class="card-header card-client-header"><b>Клиент:</b> Ломшин М. И.</div>
                                        <div class="card-body card-client">
                                            <table class="table table-sm mb-0">
                                                <tr>
                                                    <th>Телефон</th>
                                                    <td>43-02-01</td>
                                                </tr>
                                                <tr>
                                                    <th>Адрес</th>
                                                    <td>Учебный корпус номер 1</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header card-info-header">
                                    <span><b>Тема: </b>HelpDesk</span>
                                </div>
                                <div class="card-body card-info">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, aspernatur
                                        blanditiis consequuntur cum cumque deleniti dolorem, illum ipsum labore modi
                                        nesciunt quidem reiciendis repellendus sed temporibus tenetur voluptate
                                        voluptatem. Corporis.</p>
                                </div>
                                <div class="card-footer card-info-header">
                                    <div class="row">
                                        <div class="col-1">
                                            <a href="#" class="black-file" download
                                               data-container="body" data-trigger="hover"
                                               data-toggle="popover"
                                               data-placement="bottom"
                                               data-content="Помощник 2">
                                                <i class="far fa-2x fa-file-pdf"></i>
                                            </a>
                                        </div>
                                        <div class="col-1">
                                            <a href="#" class="black-file" download
                                               data-container="body" data-trigger="hover"
                                               data-toggle="popover"
                                               data-placement="bottom"
                                               data-content="Помощник 2">
                                                <i class="far fa-2x fa-file"></i>
                                            </a>
                                        </div>
                                        <div class="col-1">
                                            <a href="#" class="black-file" download
                                               data-container="body" data-trigger="hover"
                                               data-toggle="popover"
                                               data-placement="bottom"
                                               data-content="lorem">
                                                <i class="far fa-2x fa-file-image"></i>

                                            </a>
                                        </div>
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
                                                         src="{{ asset('images/avatars/users/' . Auth::user()->avatar ) }}"
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
                                                         src="{{ asset('images/avatars/users/' . Auth::user()->avatar ) }}"
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
                                                <div class="col-1">
                                                    <img class="users-helpers-img"
                                                         data-container="body" data-trigger="hover"
                                                         data-toggle="popover"
                                                         data-placement="bottom"
                                                         data-content="Помощник 1"
                                                         src="{{ asset('images/avatars/users/' . Auth::user()->avatar ) }}"
                                                         alt="">
                                                </div>
                                                <div class="col-1">
                                                    <img class="users-helpers-img"
                                                         data-container="body" data-trigger="hover"
                                                         data-toggle="popover"
                                                         data-placement="bottom"
                                                         data-content="Помощник 2"
                                                         src="{{ asset('images/avatars/users/' . Auth::user()->avatar ) }}"
                                                         alt="">
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
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
@endsection
