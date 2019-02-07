@extends('layout.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-4">
                    <div class="row">
                        <div class="col-lg-6 col-xl-12">
                            <div class="card">
                                <div class="card-body card-info">
                                    <div class="col account-main-info-col">
                                        <div class="card">
                                            <div class="card-header ">
                                                <h5 class="card-subtitle text-center">{{ $user->fio }}
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <img
                                                        src="{{ asset('images/avatars/users/' . $user->avatar) }}"
                                                        class="account-profile-avatar"
                                                        alt="">
                                                <p class="text-center mb-0"><span
                                                        class="badge badge-pill">{{ $user->position }}</span></p>
                                            </div>
                                        </div>
                                        <div class="card" id="card-user">
                                            <div class="card-body">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <td><b>День рождения:</b></td>
                                                        <td>{{ $user->birthday }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Номер телефона</b></td>
                                                        <td><span id="user-phone">{{ $user->phone }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Внутренний номер</b></td>
                                                        <td><span id="user-iphone">{{ $user->iphone }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Почта</b></td>
                                                        <td><span id="user-email">{{ $user->email }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Логин VK</b></td>
                                                        <td><span id="user-vk">{{ $user->vk }}</span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class=" col-lg-12 col-xl-8">
                    <div class="card">
                        <div class="card-body card-info">
                            <div class="card">
                                <div class="card-header">
                                    Список заявок
                                </div>
                                <div class="card-body ">
                                    <nav>
                                        <div class="nav nav-tabs mb-3" id="nav-tab1" role="tablist">
                                            <a class="nav-item nav-link {{ $my? 'active' : Null }}" id="nav-my-tab" data-toggle="tab"
                                               href="#nav-my" role="tab" aria-controls="nav-home"
                                               aria-selected="true">Заявки от пользователя</a>
                                            <a class="nav-item nav-link {{ $my? Null : 'active' }}" id="nav-me-tab" data-toggle="tab"
                                               href="#nav-me" role="tab" aria-controls="nav-profile"
                                               aria-selected="false">Заявки для пользователя</a>
                                            <a class="nav-item nav-link" id="nav-help-tab" data-toggle="tab"
                                               href="#nav-help" role="tab" aria-controls="nav-contact"
                                               aria-selected="false">Заявки в помощь</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade {{ $my? 'show active' : Null }}" id="nav-my" role="tabpanel"
                                             aria-labelledby="nav-my-tab">
                                            <div class="row">
                                                @foreach($mission_owner->sortByDesc('id')->take(3) as $mission)
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card">
                                                            <div
                                                                class="card-body task-card card-priority-{{ $mission->priority == 1? 'low' : ($mission->priority == 2? 'mid' : 'high') }} pb-0">
                                                                <div class="progress">
                                                                    @php
                                                                        if (strtotime("now") > strtotime($mission->date_to))
                                                                        {
                                                                            $per = 100;
                                                                        } else {
                                                                            $per = (($mission->date_close ? strtotime($mission->date_close) : strtotime("now")) - strtotime($mission->created_at))/(strtotime($mission->date_to) - strtotime($mission->created_at)) * 100;
                                                                        }
                                                                    @endphp
                                                                    <div
                                                                        class="progress-bar {{ $per < 50? 'bg-success' : ($per < 75? 'bg-warning' : 'bg-danger') }}"
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
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr>
                                                                                <td width="15%"><a
                                                                                        href="{{ route('mission.show', $mission->id) }}">#{{ $mission->id }}</a>
                                                                                </td>
                                                                                <td width="30%">{{ $from[$mission->from] }}</td>
                                                                                <td>{{ $mission->subject->name }}</td>

                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <div class="row">
                                                                    <div class="col-6"><a href="#"
                                                                                          class="badge badge-light">{{ $mission->worker->fio }}</a>
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
                                        </div>
                                        <div class="tab-pane fade {{ $my? Null : 'show active' }}" id="nav-me" role="tabpanel"
                                             aria-labelledby="nav-me-tab">
                                            <div class="row">
                                                @foreach($mission_worker->sortByDesc('id')->take(3) as $mission)
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card">
                                                            <div
                                                                class="card-body task-card card-priority-{{ $mission->priority == 1? 'low' : ($mission->priority == 2? 'mid' : 'high') }} pb-0">
                                                                <div class="progress">
                                                                    @php
                                                                        if (strtotime("now") > strtotime($mission->date_to))
                                                                        {
                                                                            $per = 100;
                                                                        } else {
                                                                            $per = (($mission->date_close ? strtotime($mission->date_close) : strtotime("now")) - strtotime($mission->created_at))/(strtotime($mission->date_to) - strtotime($mission->created_at)) * 100;
                                                                        }
                                                                    @endphp
                                                                    <div
                                                                        class="progress-bar {{ $per < 50? 'bg-success' : ($per < 75? 'bg-warning' : 'bg-danger') }}"
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
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr>
                                                                                <td width="15%"><a
                                                                                        href="{{ route('mission.show', $mission->id) }}">#{{ $mission->id }}</a>
                                                                                </td>
                                                                                <td width="30%">{{ $from[$mission->from] }}</td>
                                                                                <td>{{ $mission->subject->name }}</td>

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
                                        </div>
                                        <div class="tab-pane fade" id="nav-help" role="tabpanel"
                                             aria-labelledby="nav-help-tab">
                                            <div class="row">
                                                @foreach($user->mission_helper->where('status', '<>', 3)->sortByDesc('id')->take(3) as $mission)
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card">
                                                            <div
                                                                class="card-body task-card card-priority-{{ $mission->priority == 1? 'low' : ($mission->priority == 2? 'mid' : 'high') }} pb-0">
                                                                <div class="progress">
                                                                    @php
                                                                        if (strtotime("now") > strtotime($mission->date_to))
                                                                        {
                                                                            $per = 100;
                                                                        } else {
                                                                            $per = (($mission->date_close ? strtotime($mission->date_close) : strtotime("now")) - strtotime($mission->created_at))/(strtotime($mission->date_to) - strtotime($mission->created_at)) * 100;
                                                                        }
                                                                    @endphp
                                                                    <div
                                                                        class="progress-bar {{ $per < 50? 'bg-success' : ($per < 75? 'bg-warning' : 'bg-danger') }}"
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
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr>
                                                                                <td width="15%"><a
                                                                                        href="{{ route('mission.show', $mission->id) }}">#{{ $mission->id }}</a>
                                                                                </td>
                                                                                <td width="30%">{{ $from[$mission->from] }}</td>
                                                                                <td>{{ $mission->subject->name }}</td>

                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <div class="row">
                                                                    <div class="col-6"><a href="#"
                                                                                          class="badge badge-light">{{ $mission->worker->fio }}</a>
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
@endsection
