@extends('layout.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
@endsection
@section('content')
    <div class="card">
        <div class="card-body padding-0">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-4">
                    <div class="row">
                        <div class="col-lg-6 col-xl-12">
                            <div class="card">
                                <div class="card-body card-info padding-0">
                                    <div class="col account-main-info-col padding-0">
                                        <div class="card">
                                            <div class="card-header ">
                                                <h5 class="card-subtitle text-center">{{ $user->fio }}
                                                </h5>
                                                <p class="text-center mb-0 small">({{ $user->position->name }})</p>
                                                <div class="text-center">
                                                    @if($user->blocked)
                                                        <span class="badge badge-danger font-weight-normal">Blocked</span>
                                                    @endif
                                                    @if($user->super)
                                                        <span class="badge badge-info font-weight-normal">Администратор</span>
                                                    @endif
                                                    @if($user->isOnline())
                                                        <span
                                                            class="badge badge-success font-weight-normal">Online</span>
                                                    @else
                                                        <span
                                                            class="badge badge-secondary font-weight-normal">Offline</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card-body text-center">
                                                <img
                                                    src="{{ asset('images/avatars/users/' . $user->avatar) }}"
                                                    class="account-profile-avatar"
                                                    alt="">
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
                                                @if(Auth::user()->super)
                                                    <button type="button" data-toggle="modal"
                                                            data-target="#change-pass"
                                                            class="btn btn-link small badge change-pass font-weight-normal">
                                                        Изменить
                                                        пароль или должность
                                                    </button>

                                                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button type="submit" name="blocked" value="{{ $user->blocked? 0 : 1 }}"
                                                                class="btn btn-link small badge change-pass font-weight-normal">
                                                            {{ $user->blocked? 'Разблокировать пользователя' : 'Заблокировать пользователя' }}
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button type="submit" name="super" value="{{ $user->super? 0 : 1 }}"
                                                                class="btn btn-link small badge change-pass font-weight-normal">
                                                            {{ $user->super? 'Снять права администратора' : 'Назначить права администратора' }}
                                                        </button>
                                                    </form>
                                                    <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}"
                                                          method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                    <button type="submit" class="btn btn-link small badge change-pass text-danger font-weight-normal" onclick="
                                                        if(confirm('Вы действительно хотите удалить пользователя?'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $user->id }}').submit()
                                                        }
                                                        else
                                                        {
                                                        event.preventDefault();
                                                        }">Удалить</button>
                                                @endif
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
                        <div class="card-body card-info padding-0">
                            <div class="card">
                                <div class="card-header">
                                    Список заявок
                                </div>
                                <div class="card-body padding-0">
                                    <nav>
                                        <div class="nav nav-tabs mb-3" id="nav-tab1" role="tablist">
                                            <a class="nav-item nav-link {{ $my? 'active' : Null }}" id="nav-my-tab"
                                               data-toggle="tab"
                                               href="#nav-my" role="tab" aria-controls="nav-home"
                                               aria-selected="true">Заявки от пользователя</a>
                                            <a class="nav-item nav-link {{ $my? Null : 'active' }}" id="nav-me-tab"
                                               data-toggle="tab"
                                               href="#nav-me" role="tab" aria-controls="nav-profile"
                                               aria-selected="false">Заявки для пользователя</a>
                                            <a class="nav-item nav-link" id="nav-help-tab" data-toggle="tab"
                                               href="#nav-help" role="tab" aria-controls="nav-contact"
                                               aria-selected="false">Заявки в помощь</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade {{ $my? 'show active' : Null }}" id="nav-my"
                                             role="tabpanel"
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
                                                                    <div class="col-6"><span
                                                                            class="badge badge-light">{{ $mission->worker->fio }}</span>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <span
                                                                            class="badge {{ $mission->status == 1? 'badge-info' : 'badge-warning' }} float-right font-weight-normal">{{ $mission->status == 1? 'В работе' : 'Ожидает решения' }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade {{ $my? Null : 'show active' }}" id="nav-me"
                                             role="tabpanel"
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
                                                                    <div class="col-6"><span
                                                                            class="badge badge-light">{{ $mission->owner->fio }}</span>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <span
                                                                            class="badge {{ $mission->status == 1? 'badge-info' : 'badge-warning' }} float-right font-weight-normal">{{ $mission->status == 1? 'В работе' : 'Ожидает решения' }}</span>
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
                                                                    <div class="col-6"><span
                                                                            class="badge badge-light">{{ $mission->worker->fio }}</span>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <span
                                                                            class="badge {{ $mission->status == 1? 'badge-info' : 'badge-warning' }} float-right font-weight-normal">{{ $mission->status == 1? 'В работе' : 'Ожидает решения' }}</span>
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

    {{--change pass modal--}}
    <div class="modal fade" id="change-pass" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="form-group">
                            <select class="custom-select" id="inputGroupSelect01" name="position">
                                <option selected>Выберите должность</option>
                                @foreach($positions as $position)
                                    <option value="{{ $position->id }}" {{ $user->position->id == $position->id ? 'selected' : Null }}>{{ $position->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Пароль" id="password"
                                   class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Повторите пароль" id="password_confirmation"
                                   class="form-control" name="password_confirmation">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" id="pass_conf_btn" class="btn btn-primary">Сохранить
                            изменения
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    {{--end change pass modal--}}
@endsection

@section('js')
@endsection
