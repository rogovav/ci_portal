@extends('layout.index')
@section('content')
    @foreach($admins as $admin)
        <ul>
            <li>{{ $admin->id }}</li>
            <li>{{ $admin->fio }}</li>
            <li>{{ $admin->group_admin }}</li>
        </ul>
    @endforeach
    <hr>
    @foreach($groups as $group)
        <ul>
            <li>{{ $group->id }}</li>
            <li>{{ $group->name }}</li>
            <li>{{ $group->admin }}</li>
            <li>{{ $group->admin_user }}</li>
        </ul>
    @endforeach
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-tasks"></i> Последние изменения заявок</h5>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td><img src="{{asset("images/profile-photo.jpg")}}" class="profile-image"
                                     alt="Имя пользователя"></td>
                            <td><span><a href="">001</a></span><br><span class="text-post">Тема заявки</span>
                            </td>
                            <td class="time-post">24 матра 2016, 14:14</td>
                        </tr>
                        <tr>
                            <td><img src="{{asset("images/profile-photo.jpg")}}" class="profile-image"
                                     alt="Имя пользователя"></td>
                            <td><span><a href="">002</a></span><br><span class="text-post">Тема заявки</span>
                            </td>
                            <td class="time-post">24 матра 2016, 14:14</td>
                        </tr>
                        <tr>
                            <td><img src="{{asset("images/profile-photo.jpg")}}" class="profile-image"
                                     alt="Имя пользователя"></td>
                            <td><span><a href="">003</a></span><br><span class="text-post">Тема заявки</span>
                            </td>
                            <td class="time-post">24 матра 2016, 14:14</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-graduation-cap"></i> Последнее из Базы Знаний</h5>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td><img src="{{asset("images/profile-photo.jpg")}}" class="profile-image"
                                     alt="Имя пользователя"></td>
                            <td><span><a href="">Тема поста</a></span><br><span
                                    class="text-post">Краткое описание поста</span>
                            </td>
                            <td class="time-post">24 матра 2016, 14:14</td>
                        </tr>
                        <tr>
                            <td><img src="{{asset("images/profile-photo.jpg")}}" class="profile-image"
                                     alt="Имя пользователя"></td>
                            <td><span><a href="">Тема поста</a></span><br><span
                                    class="text-post">Краткое описание поста</span>
                            </td>
                            <td class="time-post">24 матра 2016, 14:14</td>
                        </tr>
                        <tr>
                            <td><img src="{{asset("images/profile-photo.jpg")}}" class="profile-image"
                                     alt="Имя пользователя"></td>
                            <td><span><a href="">Тема поста</a></span><br><span
                                    class="text-post">Краткое описание поста</span>
                            </td>
                            <td class="time-post">24 матра 2016, 14:14</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-tasks"></i> Список заявок</h5>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                               role="tab" aria-controls="nav-home" aria-selected="true">Мои</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                               role="tab" aria-controls="nav-profile" aria-selected="false">Мне</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                             aria-labelledby="nav-home-tab">
                            <table class="table table-tasks">
                                <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Инфо</th>
                                    <th scope="col">Тема</th>
                                    <th scope="col">Автор</th>
                                    <th scope="col">Deadline</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="deadline deadline-ok">
                                    <th scope="row">1</th>
                                    <td><i class="far fa-check-circle" title="Выполнена"></i>
                                        <i class="fas fa-arrow-circle-down" title="Низкий приоритет"></i></td>
                                    <td>Тема 1</td>
                                    <td>Otto</td>
                                    <td>24 матра 2016, 14:14</td>
                                </tr>
                                <tr class="deadline deadline-middle">
                                    <th scope="row">2</th>
                                    <td><i class="far fa-dot-circle popup-top-fa" title="В работе"></i> <i
                                            class="fas fa-arrow-circle-up" title="Высокий приортиет"></i></td>
                                    <td>Тема 2</td>
                                    <td>Thornton</td>
                                    <td>24 матра 2016, 14:14</td>
                                </tr>
                                <tr class="deadline deadline-expired">
                                    <th scope="row">3</th>
                                    <td><i class="far fa-clock popup-top-fa" title="Ожидает действий"></i> <i
                                            class="fas fa-minus-circle" title="Высокий приортиет"></i></td>
                                    <td>Тема 3</td>
                                    <td>Thornton</td>
                                    <td>24 матра 2016, 14:14</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                             aria-labelledby="nav-profile-tab">
                            <table class="table table-tasks">
                                <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Инфо</th>
                                    <th scope="col">Тема</th>
                                    <th scope="col">Автор</th>
                                    <th scope="col">Deadline</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="deadline deadline-ok">
                                    <th scope="row">8</th>
                                    <td><i class="far fa-check-circle" title="Выполнена"> </i> <i
                                            class="fas fa-arrow-circle-down" title="Низкий приоритет"></i></td>
                                    <td>Тема 1</td>
                                    <td>Otto</td>
                                    <td>24 матра 2016, 14:14</td>
                                </tr>
                                <tr class="deadline deadline-middle">
                                    <th scope="row">9</th>
                                    <td><i class="far fa-dot-circle" title="В работе"></i> <i
                                            class="fas fa-arrow-circle-up" title="Высокий приортиет"></i></td>
                                    <td>Тема 2</td>
                                    <td>Thornton</td>
                                    <td>24 матра 2016, 14:14</td>
                                </tr>
                                <tr class="deadline deadline-expired">
                                    <th scope="row">10</th>
                                    <td><i class="far fa-clock" title="Ожидает действий"></i> <i
                                            class="fas fa-minus-circle" title="Высокий приортиет"></i></td>
                                    <td>Тема 3</td>
                                    <td>Thornton</td>
                                    <td>24 матра 2016, 14:14</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                             aria-labelledby="nav-contact-tab">...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
