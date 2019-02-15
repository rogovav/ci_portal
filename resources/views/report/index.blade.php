@extends('layout.index')
@section('css')
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/css/bootstrap-select.min.css">
@endsection
@section('content')
    {{--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
         {{--aria-hidden="true">--}}
        {{--<div class="modal-dialog" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<form action="">--}}
                    {{--<div class="modal-body">--}}
                        {{--<div class="container">--}}
                            {{--Начало периода: <input id="startDate" width="100%"/>--}}
                            {{--Конец периода: <input id="endDate" width="100%"/>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<input id="what_change" type="text" class="form-control d-none" readonly>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<button type="button" class="btn btn-sm btn-success">Найти</button>--}}
                        {{--<button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Закрыть</button>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<nav>--}}
        {{--<div class="nav nav-tabs" id="nav-tab" role="tablist">--}}
            {{--<a class="nav-item nav-link active" id="nav-topic-tab" data-toggle="tab" href="#nav-topic" role="tab"--}}
               {{--aria-controls="nav-topic" aria-selected="true">Отчет по темам</a>--}}
            {{--<a class="nav-item nav-link" id="nav-staff-tab" data-toggle="tab" href="#nav-staff" role="tab"--}}
               {{--aria-controls="nav-staff" aria-selected="false">Отчет по сотрудникам</a>--}}
        {{--</div>--}}
    {{--</nav>--}}
    {{--<div class="tab-content" id="nav-tabContent">--}}
        {{--<div class="tab-pane fade show active" id="nav-topic" role="tabpanel" aria-labelledby="nav-topic-tab">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">--}}
                    {{--<button class="btn btn-sm btn-info" onclick="$('#what_change').val('top')" data-toggle="modal"--}}
                            {{--data-target="#exampleModal">Выбрать период--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="card-body">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-xl-2 col-lg-3 col-md-4 col-12">--}}
                            {{--<div id="Sarah_chart_div" style="border: 1px solid #ccc"></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="tab-pane fade" id="nav-staff" role="tabpanel" aria-labelledby="nav-staff-tab">--}}
            {{--<div class="row">--}}
                {{--<div class="col-12 col-md-6 col-lg-4 col-xl-4">--}}
                    {{--<button class="btn btn-sm btn-info mt-2 mb-2" onclick="$('#what_change').val('st')"--}}
                    {{--data-toggle="modal"--}}
                    {{--data-target="#exampleModal">Выбрать период--}}
                    {{--</button>--}}
                    {{--<form action="">--}}
                        {{--<select id="user-select" class="form-control mb-3 mt-3" name="worker"--}}
                                {{--title="Выберите сотрудника"--}}
                                {{--data-live-search="true">--}}
                            {{--<option value=""></option>--}}
                        {{--</select>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<nav>--}}
                {{--<div class="nav nav-tabs" id="nav-tab" role="tablist">--}}
                    {{--<a class="nav-item nav-link active" id="nav-activenow-tab" data-toggle="tab" href="#nav-activenow"--}}
                       {{--role="tab"--}}
                       {{--aria-controls="nav-activenow" aria-selected="true">В работе <span--}}
                            {{--class="badge badge-primary">10</span></a>--}}
                    {{--<a class="nav-item nav-link" id="nav-intime-tab" data-toggle="tab" href="#nav-intime" role="tab"--}}
                       {{--aria-controls="nav-intime" aria-selected="false">Выполненные <span--}}
                            {{--class="badge badge-success">4</span></a>--}}
                    {{--<a class="nav-item nav-link" id="nav-expired-tab" data-toggle="tab" href="#nav-expired" role="tab"--}}
                       {{--aria-controls="nav-expired" aria-selected="false">Выполненные c просрочкой <span--}}
                            {{--class="badge badge-danger">3</span></a>--}}
                {{--</div>--}}
            {{--</nav>--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">--}}
                    {{--Рогов Александр Валерьевич--}}
                {{--</div>--}}
                {{--<div class="card-body">--}}
                    {{--<div class="tab-content" id="nav-tabContent">--}}
                        {{--<div class="tab-pane fade show active" id="nav-activenow" role="tabpanel"--}}
                             {{--aria-labelledby="nav-activenow-tab">--}}
                            {{--<table class="table-sm table">--}}
                                {{--<thead>--}}
                                {{--<tr class="sort" style="cursor: pointer; font-size: 12px;">--}}
                                    {{--<th>#</th>--}}
                                    {{--<th>Тип</th>--}}
                                    {{--<th>Приоритет</th>--}}
                                    {{--<th>Тема</th>--}}
                                    {{--<th>Автор</th>--}}
                                    {{--<th>Создана</th>--}}
                                    {{--<th>Прошло</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane fade" id="nav-intime" role="tabpanel" aria-labelledby="nav-intime-tab">--}}
                            {{--<table class="table-sm table">--}}
                                {{--<thead>--}}
                                {{--<tr class="sort" style="cursor: pointer; font-size: 12px;">--}}
                                    {{--<th>#</th>--}}
                                    {{--<th>Тип</th>--}}
                                    {{--<th>Приоритет</th>--}}
                                    {{--<th>Тема</th>--}}
                                    {{--<th>Автор</th>--}}
                                    {{--<th>Создана</th>--}}
                                    {{--<th>Прошло</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane fade" id="nav-expired" role="tabpanel" aria-labelledby="nav-expired-tab">--}}
                            {{--<table class="table-sm table">--}}
                                {{--<thead>--}}
                                {{--<tr class="sort" style="cursor: pointer; font-size: 12px;">--}}
                                    {{--<th>#</th>--}}
                                    {{--<th>Тип</th>--}}
                                    {{--<th>Приоритет</th>--}}
                                    {{--<th>Тема</th>--}}
                                    {{--<th>Автор</th>--}}
                                    {{--<th>Создана</th>--}}
                                    {{--<th>Прошло</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
@section('js')

@endsection
