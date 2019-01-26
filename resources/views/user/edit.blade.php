@extends('layout.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
@endsection
@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Изменить фото профиля</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    <div class="modal-body">

                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="file" id="upload" class="form-control" accept="image/*">
                        </div>
                        <div id="main-cropper"></div>
                        <div class="form-group" id="img-button">
                            <button id="getImage" type="button" class="btn btn-info">Сохранить выделенную область
                            </button>
                        </div>
                        <input type="text" name="avatar" id="avatar" class="hidden-print">

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
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body card-info">
                            <div class="col account-main-info-col">
                                <div class="card">
                                    <div class="card-header ">
                                        <h5 class="card-subtitle text-center">{{ $user->fio }}
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <a href="" data-toggle="modal" data-target="#exampleModal"><img
                                                src="{{ asset('images/avatars/users/' . $user->avatar) }}"
                                                class="account-profile-avatar"
                                                alt=""></a>
                                        <p class="text-center mb-0"><span
                                                class="badge badge-pill">{{ $user->position }}</span></p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td><b>День рождения:</b></td>
                                                <td>{{ $user->birthday }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Номер телефона</b></td>
                                                <td><span id="user-phone">234323</span></td>
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
                                        <form action="{{ route('user.update', $user->id) }}" method="POST"
                                              id="changeInfo">
                                            @csrf
                                        </form>
                                        <span class="badge badge-light">Нажмите на поле, чтобы изменить его</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body card-info">
                            <div class="card">
                                <div class="card-header">
                                    Список заявок
                                </div>
                                <div class="card-body ">
                                    <nav>
                                        <div class="nav nav-tabs mb-3" id="nav-tab1" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-my-tab" data-toggle="tab"
                                               href="#nav-my" role="tab" aria-controls="nav-home"
                                               aria-selected="true">Мои заявки</a>
                                            <a class="nav-item nav-link" id="nav-me-tab" data-toggle="tab"
                                               href="#nav-me" role="tab" aria-controls="nav-profile"
                                               aria-selected="false">Заявки мне</a>
                                            <a class="nav-item nav-link" id="nav-help-tab" data-toggle="tab"
                                               href="#nav-help" role="tab" aria-controls="nav-contact"
                                               aria-selected="false">Заявки в помощь</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-my" role="tabpanel"
                                             aria-labelledby="nav-my-tab">
                                            <div class="row">
                                                @foreach($user->mission_owner->where('status', '<>', 3)->sortByDesc('id')->take(3) as $mission)
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card">
                                                            <div class="card-body task-card card-priority-mid">
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
                                                                        class="progress-bar {{ $per < 50? 'bg-primary' : ($per < 75? 'bg-warning' : 'bg-danger') }}"
                                                                        role="progressbar"
                                                                        style="width: {{ $per }}%"
                                                                        aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <table class="table table-sm mb-0">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td width="10%"><a
                                                                                        href="{{ route('mission.show', $mission->id) }}">#{{ $mission->id }}</a>
                                                                                </td>
                                                                                <td width="30%">{{ $mission->subject->name }}</td>
                                                                                <td>{!! str_limit($mission->info, 100) !!}
                                                                                </td>
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
                                        <div class="tab-pane fade" id="nav-me" role="tabpanel"
                                             aria-labelledby="nav-me-tab">
                                            <div class="row">
                                                @foreach($user->mission_worker->where('status', '<>', 3)->sortByDesc('id')->take(3) as $mission)
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card">
                                                            <div class="card-body task-card card-priority-mid">
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
                                                                        class="progress-bar {{ $per < 50? 'bg-primary' : ($per < 75? 'bg-warning' : 'bg-danger') }}"
                                                                        role="progressbar"
                                                                        style="width: {{ $per }}%"
                                                                        aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <table class="table table-sm mb-0">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td width="10%"><a
                                                                                        href="{{ route('mission.show', $mission->id) }}">#{{ $mission->id }}</a>
                                                                                </td>
                                                                                <td width="30%">{{ $mission->subject->name }}</td>
                                                                                <td>{!! str_limit($mission->info, 100) !!}
                                                                                </td>
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
                                                            <div class="card-body task-card card-priority-mid">
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
                                                                        class="progress-bar {{ $per < 50? 'bg-primary' : ($per < 75? 'bg-warning' : 'bg-danger') }}"
                                                                        role="progressbar"
                                                                        style="width: {{ $per }}%"
                                                                        aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <table class="table table-sm mb-0">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td width="10%"><a
                                                                                        href="{{ route('mission.show', $mission->id) }}">#{{ $mission->id }}</a>
                                                                                </td>
                                                                                <td width="30%">{{ $mission->subject->name }}</td>
                                                                                <td>{!! str_limit($mission->info, 100) !!}
                                                                                </td>
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
                <div class="col-3">
                    <div class="card">
                        <div class="card-body card-info">
                            <div class="collapse" id="collapseExample">
                                <div class="card">
                                    <div class="card-header">
                                        Новое задание
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('todo.store') }}" class="col-12" method="post">
                                            {{ csrf_field() }}

                                            <div class="form-group">
                                                <input class="form-control" type="text"
                                                       placeholder="Название задание"
                                                       name="name">
                                            </div>
                                            <div class="form-group">
                                                <input type="date" class="form-control" name="date">
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="priority">
                                                    <option value="1">Низкий приоритет</option>
                                                    <option value="2" selected>Средний приоритет</option>
                                                    <option value="3">Высокий приоритет</option>
                                                </select>
                                            </div>
                                            <div class="form-row  mb-3">
                                                <div class="col">
                                                <textarea placeholder="Текст TODO" class="form-control" name="info"
                                                          id="" cols="30"
                                                          rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <button type="submit" class="btn btn-dark float-right">Добавить
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    Список заданий <a class="badge badge-primary" data-toggle="collapse"
                                                      href="#collapseExample" role="button" aria-expanded="false"
                                                      aria-controls="collapseExample">
                                        Добавить
                                    </a>
                                </div>
                                <div class="card-body">
                                    <nav>
                                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                               href="#nav-home" role="tab" aria-controls="nav-home"
                                               aria-selected="true">Сегодня</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                               href="#nav-profile" role="tab" aria-controls="nav-profile"
                                               aria-selected="false">Завтра</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                               href="#nav-contact" role="tab" aria-controls="nav-contact"
                                               aria-selected="false">Неделя</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                             aria-labelledby="nav-home-tab"
                                             style="max-height: 550px; overflow-y: scroll; overflow-x: hidden">
                                            <div class="row">
                                                @foreach($user->todos->where('date', date('Y-m-d'))->where('success', false)->sortByDesc('priority') as $todo)
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card">
                                                            <div
                                                                class="card-header card-priority-{{ $todo->priority == 1? 'low' : ($todo->priority == 2? 'mid' : 'high') }}-header">
                                                                <div class="row">
                                                                    <div class="col-6">{{ $todo->name }}</div>
                                                                    <div class="col-6"><span
                                                                            class="badge badge-light float-right">Задание на {{ $todo->date }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="card-body card-priority-{{ $todo->priority == 1? 'low' : ($todo->priority == 2? 'mid' : 'high') }}">
                                                                <p>{{ $todo->info }}</p>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <a href="{{ route('todo.update', $todo->id) }}"
                                                                           class="badge badge-success text-center col-12">
                                                                            Завершить задание
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @foreach($user->todos->where('date', date('Y-m-d'))->where('success', true)->sortByDesc('priority') as $todo)
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card todo-done">
                                                            <div
                                                                class="card-header card-priority-{{ $todo->priority == 1? 'low' : ($todo->priority == 2? 'mid' : 'high') }}-header">
                                                                <div class="row">
                                                                    <div class="col-6"><s>{{ $todo->name }}</s></div>
                                                                    <div class="col-6"><span
                                                                            class="badge badge-light float-right">Задание на {{ $todo->date }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="card-body card-priority-{{ $todo->priority == 1? 'low' : ($todo->priority == 2? 'mid' : 'high') }}">
                                                                <p><s>{{ $todo->info }}</s></p>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <a href="{{ route('todo.update', $todo->id) }}"
                                                                           class="badge badge-dark text-center col-12">
                                                                            Восстановить задание
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                             aria-labelledby="nav-profile-tab"
                                             style="max-height: 550px; overflow-y: scroll; overflow-x: hidden">
                                            <div class="row">
                                                @foreach($user->todos->where('date', date('Y-m-d', strtotime(date('Y-m-d') . "+1 days")))->where('success', false)->sortByDesc('priority') as $todo)
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card">
                                                            <div
                                                                class="card-header card-priority-{{ $todo->priority == 1? 'low' : ($todo->priority == 2? 'mid' : 'high') }}-header">
                                                                <div class="row">
                                                                    <div class="col-6">{{ $todo->name }}</div>
                                                                    <div class="col-6"><span
                                                                            class="badge badge-light float-right">Задание на {{ $todo->date }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="card-body card-priority-{{ $todo->priority == 1? 'low' : ($todo->priority == 2? 'mid' : 'high') }}">
                                                                <p>{{ $todo->info }}</p>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <a href="{{ route('todo.update', $todo->id) }}"
                                                                           class="badge badge-success text-center col-12">
                                                                            Завершить задание
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @foreach($user->todos->where('date', date('Y-m-d', strtotime(date('Y-m-d') . "+1 days")))->where('success', false)->sortByDesc('priority') as $todo)
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card todo-done">
                                                            <div
                                                                class="card-header card-priority-{{ $todo->priority == 1? 'low' : ($todo->priority == 2? 'mid' : 'high') }}-header">
                                                                <div class="row">
                                                                    <div class="col-6"><s>{{ $todo->name }}</s></div>
                                                                    <div class="col-6"><span
                                                                            class="badge badge-light float-right">Задание на {{ $todo->date }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="card-body card-priority-{{ $todo->priority == 1? 'low' : ($todo->priority == 2? 'mid' : 'high') }}">
                                                                <p><s>{{ $todo->info }}</s></p>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <a href="{{ route('todo.update', $todo->id) }}"
                                                                           class="badge badge-dark text-center col-12">
                                                                            Восстановить задание
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                             aria-labelledby="nav-contact-tab"
                                             style="max-height: 550px; overflow-y: scroll; overflow-x: hidden">
                                            <div class="row">
                                                @foreach($user->todos->where('date', '>=', date('Y-m-d'))->where('date', '<=', date('Y-m-d', strtotime(date('Y-m-d') . "+7 days")))->where('success', false)->sortByDesc('priority') as $todo)
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card">
                                                            <div
                                                                class="card-header card-priority-{{ $todo->priority == 1? 'low' : ($todo->priority == 2? 'mid' : 'high') }}-header">
                                                                <div class="row">
                                                                    <div class="col-6">{{ $todo->name }}</div>
                                                                    <div class="col-6"><span
                                                                            class="badge badge-light float-right">Задание на {{ $todo->date }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="card-body card-priority-{{ $todo->priority == 1? 'low' : ($todo->priority == 2? 'mid' : 'high') }}">
                                                                <p>{{ $todo->info }}</p>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <a href="{{ route('todo.update', $todo->id) }}"
                                                                           class="badge badge-success text-center col-12">
                                                                            Завершить задание
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @foreach($user->todos->where('date', '>=', date('Y-m-d'))->where('date', '<=', date('Y-m-d', strtotime(date('Y-m-d') . "+7 days")))->where('success', true)->sortByDesc('priority') as $todo)
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card todo-done">
                                                            <div
                                                                class="card-header card-priority-{{ $todo->priority == 1? 'low' : ($todo->priority == 2? 'mid' : 'high') }}-header">
                                                                <div class="row">
                                                                    <div class="col-6"><s>{{ $todo->name }}</s></div>
                                                                    <div class="col-6"><span
                                                                            class="badge badge-light float-right">Задание на {{ $todo->date }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="card-body card-priority-{{ $todo->priority == 1? 'low' : ($todo->priority == 2? 'mid' : 'high') }}">
                                                                <p><s>{{ $todo->info }}</s></p>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <a href="{{ route('todo.update', $todo->id) }}"
                                                                           class="badge badge-dark text-center col-12">
                                                                            Восстановить задание
                                                                        </a>
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
    <script src="{{ asset('js/croppie.js') }}"></script>
    <script>
        $(document).ready(function () {
            if ($('#upload').val() == '') {
                $('#main-cropper').hide();
                $('#getImage').hide()
            }
        })
        ///images/avatars/users/cool.jpg
        var basic = $('#main-cropper').croppie({
            viewport: {width: 300, height: 300, type: 'square'},
            boundary: {width: 300, height: 300},
            showZoomer: false,

        });

        $('#getImage').click(function () {
            basic.croppie('result', 'base64').then(function (base) {
                console.log()
                $('#avatar').val(base)
            })
        })

        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#main-cropper').croppie('bind', {
                        url: e.target.result
                    });
                    $('.actionDone').toggle();
                    $('.actionUpload').toggle();
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#getImage').click(function () {
            $(this).prop('disabled', true)
            $(this).text('Сохранено')
        })

        $('#upload').change(function () {
            $('#main-cropper').show()
            $('#getImage').show()
            $('#getImage').text('Сохранить выделенную область')
            $('#getImage').prop('disabled', false)
            readFile(this);
        })

    </script>
    <script>
        let switchToInputP = function () {
            let $input = $("<input>", {
                val: $(this).text(),
                type: "tel",
                form: 'changeInfo',
                name: 'phone'
            });
            $input.addClass("form-control");
            $(this).replaceWith($input);
            $input.on("blur", switchToSpan);
            $input.select();
        };
        let switchToInputE = function () {
            let $input = $("<input>", {
                val: $(this).text(),
                type: "email",
                form: 'changeInfo',
                name: 'email'
            });
            $input.addClass("form-control");
            $(this).replaceWith($input);
            $input.on("blur", switchToSpan);
            $input.select();
        };
        let switchToInputV = function () {
            let $input = $("<input>", {
                val: $(this).text(),
                type: "text",
                form: 'changeInfo',
                name: 'vk'
            });
            $input.addClass("form-control");
            $(this).replaceWith($input);
            $input.on("blur", switchToSpan);
            $input.select();
        };
        let switchToSpan = function () {
            let $span = $("<span>", {
                text: $(this).val()
            });
            $('#changeInfo').submit();
        }
        $("#user-phone").on("click", switchToInputP);
        $("#user-email").on("click", switchToInputE);
        $("#user-vk").on("click", switchToInputV);
    </script>
@endsection
