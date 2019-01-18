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
                                        <form action="" class="col-12">
                                            <div class="form-row mb-3">
                                                <div class="col-8">
                                                    <input class="form-control" type="text" placeholder="Название TODO"
                                                           name="name">
                                                </div>
                                                <div class="col-4">
                                                    <select class="form-control" name="priority">
                                                        <option value="1">Низкий приоритет</option>
                                                        <option value="2">Средний приоритет</option>
                                                        <option value="3">Высокий приоритет</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row  mb-3">
                                                <div class="col">
                                                <textarea placeholder="Текст TODO" class="form-control" name="text"
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
                                    <div class="tab-pane fade show active" id="nav-do" role="tabpanel"
                                         aria-labelledby="nav-home-tab">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="card">
                                                    <div class="card-header card-priority-high-header">
                                                        <div class="row">
                                                            <div class="col-6">Название TODO</div>
                                                            <div class="col-6"><span
                                                                    class="badge badge-light float-right">25.01.2017</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body card-priority-high">
                                                        <p>Lorem ipsum vkbskdfnkjd dhf ldsbflDKS FlDSKBF kdbf</p>
                                                        <div class="row">
                                                            <div class="col-6"><span
                                                                    class="badge badge-danger text-center col-12">Высокий приоритет</span>
                                                            </div>
                                                            <div class="col-6">
                                                                <a href=""
                                                                   class="badge badge-success text-center col-12">Завершить
                                                                    TODO</a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="card">
                                                    <div class="card-header card-priority-mid-header">
                                                        <div class="row">
                                                            <div class="col-6">Название TODO</div>
                                                            <div class="col-6"><span
                                                                    class="badge badge-light float-right">25.01.2017</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body card-priority-mid">
                                                        <p>Lorem ipsum vkbskdfnkjd dhf ldsbflDKS FlDSKBF kdbf</p>
                                                        <div class="row">
                                                            <div class="col-6"><span
                                                                    class="badge badge-warning text-center col-12">Средний приоритет</span>
                                                            </div>
                                                            <div class="col-6">
                                                                <a href=""
                                                                   class="badge badge-success text-center col-12">Завершить
                                                                    TODO</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="card">
                                                    <div class="card-header card-priority-low-header">
                                                        <div class="row">
                                                            <div class="col-6">Название TODO</div>
                                                            <div class="col-6"><span
                                                                    class="badge badge-light float-right">25.01.2017</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body card-priority-low">
                                                        <p>Lorem ipsum vkbskdfnkjd dhf ldsbflDKS FlDSKBF kdbf</p>
                                                        <div class="row">
                                                            <div class="col-6"><span
                                                                    class="badge badge-success text-center col-12">Низкий приоритет</span>
                                                            </div>
                                                            <div class="col-6">
                                                                <a href=""
                                                                   class="badge badge-success text-center col-12">Завершить
                                                                    TODO</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="card todo-done">
                                                    <div class="card-header card-priority-high-header">
                                                        <div class="row">
                                                            <div class="col-6"><s>Название TODO</s></div>
                                                            <div class="col-6"><span
                                                                    class="badge badge-light float-right">25.01.2017</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body card-priority-high">
                                                        <p><s>Lorem ipsum vkbskdfnkjd dhf ldsbflDKS FlDSKBF
                                                                kdbf</s></p>
                                                        <div class="row">
                                                            <div class="col-6"><span
                                                                    class="badge badge-danger text-center col-12">Высокий приоритет</span>
                                                            </div>
                                                            <div class="col-6"><a href=""
                                                                                  class="badge badge-dark text-center col-12">Восстановить
                                                                    TODO</a>
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
