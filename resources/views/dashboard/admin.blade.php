@extends('layout.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-client-tab" data-toggle="tab" href="#nav-client"
                       role="tab"
                       aria-controls="nav-client" aria-selected="false">Клиенты</a>
                    <a class="nav-item nav-link" id="nav-build-tab" data-toggle="tab" href="#nav-build" role="tab"
                       aria-controls="nav-build" aria-selected="false">Здания</a>
                    <a class="nav-item nav-link" id="nav-topic-tab" data-toggle="tab" href="#nav-topic" role="tab"
                       aria-controls="nav-topic" aria-selected="false">Темы заявок</a>

                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nav-build" role="tabpanel" aria-labelledby="nav-build-tab">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 admin-card">
                        <div class="card admin-card-header">
                            <h4>Здания</h4>
                            <div class="card-body row">
                                <div class="col-8">
                                    <div class="row">
                                        @foreach($buildings as $building)
                                            <div class="col-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-subtitle mb-3">{{ $building->name }}</h5>
                                                        <h6 class="card-subtitle mb-2 text-muted">{{ $building->type == 3? 'Другое' : $building->type == 1? 'Общежитие' : 'Университет'}}</h6>
                                                        <p class="card-text">{{ $building->address }}</p>
                                                        <button onclick="editBuilding({{$building}})"
                                                                class="btn btn-dark">Изменить
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="{{ route('admin.building') }}" class="admin-form"
                                                  method="post" id="builing-form">
                                                {{ csrf_field() }}
                                                <input type="text" class="hidden-print" name="id" id="building-id">
                                                <div class="form-group">
                                                    <input name="name" type="text" class="form-control"
                                                           placeholder="Название" id="building-name">
                                                </div>
                                                <div class="form-group">
                                                    <select name="type" type="text"
                                                            class="form-control"
                                                            placeholder="Тип" id="building-type">
                                                        <option value="">Тип здания</option>
                                                        <option value="1">Общежитие</option>
                                                        <option value="2">Университет</option>
                                                        <option value="3">Другое</option>
                                                    </select>
                                                </div>
                                                <div class="form-group"><input name="address" type="text"
                                                                               class="form-control"
                                                                               placeholder="Адрес"
                                                                               id="building-address">
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="submit" class="form-control">
                                                    </div>
                                                    <div class="col">
                                                        <button type="button"
                                                                class="btn btn-warning clear-form form-control">Очистить
                                                            форму
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
                                                        <button onclick="editTopic({{$subject}})"
                                                                class="btn btn-dark">Изменить
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="{{ route('admin.subject') }}" class="admin-form"
                                                  method="post">
                                                {{ csrf_field() }}
                                                <input type="text" class="hidden-print" name="id" id="topic-id">
                                                <div class="form-group"><input name="name" type="text"
                                                                               class="form-control"
                                                                               placeholder="Название темы"
                                                                               id="topic-name"
                                                    >
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="submit" class="form-control">
                                                    </div>
                                                    <div class="col">
                                                        <button type="button"
                                                                class="btn btn-warning clear-form form-control">Очистить
                                                            форму
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
                                                            <th></th>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($clients as $client)
                                                                <tr>
                                                                    <td>{{ $client->fio }}</td>
                                                                    <td>{{ $client->cid }}</td>
                                                                    <td>{{ $client->phone }}</td>
                                                                    <td>{{ $client->mail }}</td>
                                                                    <td>
                                                                        <button onclick="editClient({{$client}})"
                                                                                class="btn btn-dark">Изменить
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="{{ route('admin.client') }}" class="admin-form" method="post">
                                                {{ csrf_field() }}
                                                <input type="text" name="id" id="client-id" class="hidden-print">
                                                <div class="form-group">
                                                    <input name="fio" type="text"
                                                           class="form-control"
                                                           placeholder="ФИО"
                                                           id="client-fio"
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <input name="cid" type="text"
                                                           class="form-control"
                                                           placeholder="Номер договра"
                                                           id="client-cid"
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <input name="phone" type="text"
                                                           class="form-control"
                                                           placeholder="Номер телефона"
                                                           id="client-phone"
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <input name="mail" type="text"
                                                           class="form-control"
                                                           placeholder="Email"
                                                           id="client-mail"

                                                    >
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="submit" class="form-control">
                                                    </div>
                                                    <div class="col">
                                                        <button type="button"
                                                                class="btn btn-warning clear-form form-control">Очистить
                                                            форму
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
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
    <script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
    <script>
        $("#client-phone").mask("+7 (999) 999-99-99");
    </script>
    <script>
        $('.collapse').collapse('toggle');
    </script>
    <script>
        function editBuilding(building) {
            $('#building-id').val(building.id)
            $('#building-name').val(building.name)
            $('#building-address').val(building.address)
            $('#building-type').val(building.type)
        }

        function editTopic(topic) {
            $('#topic-id').val(topic.id)
            $('#topic-name').val(topic.name)
        }

        function editClient(client) {
            $('#client-id').val(client.id)
            $('#client-fio').val(client.fio)
            $('#client-cid').val(client.cid)
            $('#client-mail').val(client.mail)
            $('#client-info').val(client.info)
            $('#client-phone').val(client.phone)

        }
    </script>
    <script>
        $(".clear-form").click(function () {
            $(this).closest('form').find("input[type=text], select").val("");
        })
    </script>
@endsection
