@extends('layout.index')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="col account-main-info-col">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ asset('images/avatars/users/' . Auth::user()->avatar) }}"
                                             class="account-profile-avatar"
                                             alt="">
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-subtitle text-center">{{ Auth::user()->fio }}
                                            <span class="badge badge-info">{{ Auth::user()->login }}</span>
                                        </h5>
                                        <p class="text-center mb-0">{{ Auth::user()->position }}</p>
                                        <p class="text-center"><b>День рождения:</b> {{ Auth::user()->birthday }}</p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                            <th width="50%"></th>
                                            <th width="50%"></th>
                                            <span class="badge badge-light">Нажмите на поле, чтобы изменить его</span>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><b>Номер телефона</b></td>
                                                <td><span id="user-phone">234323</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Почта</b></td>
                                                <td><span id="user-email">{{ Auth::user()->email }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Логин VK</b></td>
                                                <td><span id="user-vk">{{ Auth::user()->vk }}</span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <form action="{{ route('user.update',Auth::id()) }}" method="POST"
                                              id="changeInfo">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="collapse" id="collapseExample">
                                <div class="card">
                                    <div class="card-header">
                                        Новое TODO
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('todo.store') }}" class="col-12" method="post">
                                            {{ csrf_field() }}

                                            <div class="form-row mb-3">
                                                <div class="col-4">
                                                    <input class="form-control" type="text" placeholder="Название TODO"
                                                           name="name">
                                                </div>
                                                <div class="col-4">
                                                    <input type="date" class="form-control" name="date">
                                                </div>
                                                <div class="col-4">
                                                    <select class="form-control" name="priority">
                                                        <option value="1">Низкий приоритет</option>
                                                        <option value="2" selected>Средний приоритет</option>
                                                        <option value="3">Высокий приоритет</option>
                                                    </select>
                                                </div>
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
                                                    <button type="submit" class="btn btn-dark float-right">Создать TODO
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    Список дел <a class="badge badge-primary" data-toggle="collapse"
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
                                             aria-labelledby="nav-home-tab">
                                            <div class="row">
                                                @foreach(Auth::user()->todos->where('date', date('Y-m-d'))->sortByDesc('priority') as $todo)
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                        <div class="card {{ $todo->success? 'todo-done' : Null }}">
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
                                                                           class="badge badge-{{ $todo->success? 'dark' : 'success' }} text-center col-12">
                                                                            {{ $todo->success? 'Восстановить задание' : 'Завершить
                                                                            задание' }}
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
                                             aria-labelledby="nav-profile-tab">
                                            <div class="row">
                                                @foreach(Auth::user()->todos->where('date', date('Y-m-d', strtotime(date('Y-m-d') . "+1 days")))->sortByDesc('priority') as $todo)
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                        <div class="card {{ $todo->success? 'todo-done' : Null }}">
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
                                                                           class="badge badge-{{ $todo->success? 'dark' : 'success' }} text-center col-12">
                                                                            {{ $todo->success? 'Восстановить задание' : 'Завершить
                                                                            задание' }}
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
                                             aria-labelledby="nav-contact-tab">
                                            <div class="row">
                                                @foreach(Auth::user()->todos->where('date', '>=', date('Y-m-d'))->where('date', '<=', date('Y-m-d', strtotime(date('Y-m-d') . "+7 days")))->sortByDesc('priority') as $todo)
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                        <div class="card {{ $todo->success? 'todo-done' : Null }}">
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
                                                                           class="badge badge-{{ $todo->success? 'dark' : 'success' }} text-center col-12">
                                                                            {{ $todo->success? 'Восстановить задание' : 'Завершить
                                                                            задание' }}
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
