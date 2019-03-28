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

@endsection
@section('js')
    <div class="row">
        @foreach($users as $user)
            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                <div class="card">
                    {{--{{ $user->isOnline()? "avatar-index-border-online" : Null }} {{ $user->super? "avatar-index-border-admin" : Null}}--}}
                    <div class="card-header ">
                        @if($user->super)
                            <span class="small d-block mb-2 font-weight-normal text-center col-12">Администратор</span>
                        @endif
                        <h6 class="card-subtitle text-center">
                            {{ $user->fio }}
                        </h6>
                        <p class="text-center mb-0 small">({{ $user->position->name }})</p>
                        <div class="text-center">
                            @if($user->blocked)
                                <span class="badge badge-danger font-weight-normal">Blocked</span>
                            @endif
                            {{--@if($user->super)--}}
                            {{--<span class="badge badge-info font-weight-normal">Администратор</span>--}}
                            {{--@endif--}}
                            @if($user->isOnline())
                                <span
                                    class="badge badge-success font-weight-normal">Online</span>
                            @else
                                <span
                                    class="badge badge-secondary font-weight-normal">Offline</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <a href="{{ route('user.show', $user->id) }}">
                            <img src="{{ asset('images/avatars/users/' . $user->avatar) }}"
                                 class="account-profile-avatar-index"
                                 alt="">
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
