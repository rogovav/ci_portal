@extends('layout.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-client-tab" data-toggle="tab" href="#nav-client"
                       role="tab"
                       aria-controls="nav-client" aria-selected="false">Клиенты</a>
                    {{--<a class="nav-item nav-link" id="nav-event-tab" data-toggle="tab" href="#nav-event"--}}
                    {{--role="tab"--}}
                    {{--aria-controls="nav-event" aria-selected="true">События</a>--}}
                    <a class="nav-item nav-link" id="nav-build-tab" data-toggle="tab" href="#nav-build" role="tab"
                       aria-controls="nav-build" aria-selected="false">Здания</a>
                    <a class="nav-item nav-link" id="nav-topic-tab" data-toggle="tab" href="#nav-topic" role="tab"
                       aria-controls="nav-topic" aria-selected="false">Темы заявок</a>

                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                {{--<div class="tab-pane fade" id="nav-event" role="tabpanel" aria-labelledby="nav-event-tab">--}}
                {{--<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 admin-card">--}}
                {{--<div class="card admin-card-header">--}}
                {{--<h4>События</h4>--}}
                {{--<div class="card-body row">--}}
                {{--<div class="card" style="width: 18rem;">--}}
                {{--<div class="card-body">--}}
                {{--<h5 class="card-title">Card title</h5>--}}
                {{--<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>--}}
                {{--<p class="card-text">Some quick example text to build on the card title and make--}}
                {{--up the bulk of the card's content.</p>--}}
                {{--<a href="#" class="card-link">Card link</a>--}}
                {{--<a href="#" class="card-link">Another link</a>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4">--}}
                {{--<form action="" class="admin-form">--}}
                {{--<div class="form-group"><input name="ev-name" type="text" class="form-control"--}}
                {{--placeholder="Название события"></div>--}}
                {{--<div class="form-group"><input type="submit" class="form-control"></div>--}}
                {{--</form>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                <div class="tab-pane fade" id="nav-build" role="tabpanel" aria-labelledby="nav-build-tab">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 admin-card">
                        <div class="card admin-card-header">
                            <h4>Здания</h4>
                            <div class="card-body row">
                                <div class="col-8">
                                    <div class="row">
                                    @foreach($buildings as $building)
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-subtitle mb-3">{{ $building->name }}</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">{{ $building->type == 3? 'Другое' : $building->type == 1? 'Общежитие' : 'Университет'}}</h6>
                                                <p class="card-text">{{ $building->address }}</p>
                                                <a href="#" class="card-link">Изменить</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <form action="{{ route('admin.building') }}" class="admin-form" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input name="name" type="text" class="form-control"
                                                                       placeholder="Название">
                                        </div>
                                        <div class="form-group">
                                            <select name="type" type="text"
                                                    class="form-control"
                                                    placeholder="Тип">
                                                <option value="">Тип здания</option>
                                                <option value="1">Общежитие</option>
                                                <option value="2">Университет</option>
                                                <option value="3">Другое</option>
                                            </select>
                                        </div>
                                        <div class="form-group"><input name="address" type="text"
                                                                       class="form-control"
                                                                       placeholder="Адрес"></div>
                                        <div class="form-group"><input type="submit" class="form-control"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-topic" role="tabpanel" aria-labelledby="nav-topic-tab">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 admin-card">
                        <div class="card admin-card-header">
                            <h4>Темы</h4>
                            <div class="card-body row">
                                <div id="accordion2" class="col-8">
                                    <div class="row">
                                    @foreach($subjects as $subject)
                                        <div class="col-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="card-text">{{ $subject->name }}</p>
                                                    <a href="#" class="card-link">Изменить</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <form action="{{ route('admin.subject') }}" class="admin-form" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group"><input name="name" type="text" class="form-control"
                                                                       placeholder="Название темы"></div>
                                        <div class="form-group"><input type="submit" class="form-control"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-client-tab">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 admin-card">
                        <div class="card admin-card-header">
                            <h4>Клиенты</h4>
                            <div class="card-body row">
                                <div id="accordion2" class="col-8">
                                    <div class="row">
                                    @foreach($clients as $client)
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="col-12">
                                                        <table class="table">
                                                            <thead>
                                                            <th>ФИО</th>
                                                            <th>Номер договора</th>
                                                            <th>Номер телефона</th>
                                                            <th>Email</th>
                                                            <th>Информация</th>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>{{ $client->fio }}</td>
                                                                <td>{{ $client->cid }}</td>
                                                                <td>{{ $client->phone }}</td>
                                                                <td>{{ $client->mail }}</td>
                                                                <td>{{ $client->info }}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <form action="{{ route('admin.client') }}" class="admin-form" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group"><input name="fio" type="text" class="form-control"
                                                                       placeholder="ФИО"></div>
                                        <div class="form-group"><input name="cid" type="text" class="form-control"
                                                                       placeholder="Номер договра"></div>
                                        <div class="form-group"><input name="phone" type="text" class="form-control"
                                                                       placeholder="Номер телефона"></div>
                                        <div class="form-group"><input name="mail" type="text" class="form-control"
                                                                       placeholder="Email"></div>
                                        <div class="form-group"><input name="info" type="text" class="form-control"
                                                                       placeholder="Информация"></div>
                                        <div class="form-group"><input type="submit" class="form-control"></div>
                                    </form>
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
        $('.collapse').collapse('toggle');
    </script>
@endsection
