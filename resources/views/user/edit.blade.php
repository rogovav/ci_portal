@extends('layout.index')
@section('content')
    <div class="row">
        <div class="col-4">
            <div class="col account-main-info-col">
                <img src="{{ asset('images/avatars/users/' . Auth::user()->avatar) }}" class="account-profile-avatar"
                     alt="">
                p
            </div>
        </div>
        <div class="col-8"></div>
    </div>
@endsection
