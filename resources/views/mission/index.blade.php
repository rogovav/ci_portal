@extends('layout.index')
@section('css')
    <link rel="stylesheet" href="{{ asset("css/dataTables.bootstrap4.min.css") }}">
@endsection
@section('content')
    <div class="modal fade" id="ModalCreateUser" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Создание заявки</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="javascript:void(0);" onsubmit="register()">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <select class="custom-select" name="from">
                                <option selected>Выберите источник</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="client">
                                <option selected>Выберите от кого</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        {{--TODO: make users info popup--}}
                        <div class="user-info-popup">
                            <div class="form-group">
                                <input name="" id="" class="form-control" placeholder="Номер договора"></input>
                            </div>
                            <div class="form-group">
                                <input name="" id="" class="form-control" placeholder="Номер телефона"></input>
                            </div>
                            <div class="form-group">
                                <input name="" id="" class="form-control" placeholder="Информация о клиенте"></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="place">
                                <option selected>Выберите место</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="topic">
                                <option selected>Выберите тему</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="worker">
                                <option selected>Выберите кого</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="help">
                                <option selected>Выберите помощь</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="looking">
                                <option selected>Выберите смотрящего</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="priority">
                                <option selected>Выберите приоритет</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input placeholder="Дата начала" class="form-control" type="text"
                                   onfocus="(this.type='date')" name="date_begin" required>
                        </div>
                        <div class="form-group">
                            <input placeholder="Крайний срок" class="form-control" type="text"
                                   onfocus="(this.type='date')" name="date_end" required>
                        </div>
                        <div class="form-group">
                            <textarea name="comment" id="comment-user-mission" cols="30" rows="10" class="form-control"
                                      placeholder="Комментарий"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" name="file_group" id="" class="form-control" multiple></input>
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
                <table id="table_id" class="table table-tasks table-rendered table-bordered" >
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
                </table>
            </div>
        </div>
    </div>
@endsection
