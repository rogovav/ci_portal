@extends('layout.index')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <style>
        thead input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        @foreach($users as $user)
            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                <div class="card">
                    {{--{{ $user->isOnline()? "avatar-index-border-online" : Null }} {{ $user->super? "avatar-index-border-admin" : Null}}--}}
                    <div class="card-header ">
                        <h6 class="card-subtitle text-center">
                            {{ $user->fio }}
                        </h6>
                        <p class="text-center mb-0 small">({{ $user->position->name }})</p>
                    </div>
                    <div class="card-body p-0">
                        <a href="{{ route('user.show', $user->id) }}">
                            <img src="{{ asset('images/avatars/users/' . $user->avatar) }}"
                                 class="account-profile-avatar-index"
                                 alt="">
                        </a>
                        <div>
                            <h6 class="font-weight-bold text-center mt-1">Завершенные ({{ $user->all_missions }})</h6>
                            <table class="table table-sm m-auto">
                                <tr>
                                    <td>Выполнено</td>
                                    <td>{{ $user->end_missions }}</td>
                                    <td>{{ $user->end_missions_per }}%</td>
                                </tr>
                                <tr>
                                    <td>Просрочено</td>
                                    <td>{{ $user->exp_missions }}</td>
                                    <td>{{ $user->exp_missions_per }}%</td>
                                </tr>
                            </table>
                        </div>
                        <div>
                            <h6 class="font-weight-bold text-center mt-1">В работе ({{ $user->all_missions_work }})</h6>
                            <table class="table table-sm m-auto">
                                <tr>
                                    <td>Просрочено</td>
                                    <td>{{ $user->exp_missions_work }}</td>
                                    <td>{{ $user->exp_missions_work_per }}%</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('js')

@endsection
