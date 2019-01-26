@extends('layout.index')
@section('css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 m-0">
                    <div class="input-group mb-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="material-icons">search</i>
                            </span>
                        </div>
                        <input id="inputSearch" type="text" class="form-control" placeholder="Введите слово или фразу"
                               aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3 card-outer">
                    <div class="card">
                        <div class="card-header card-info-header">
                            <div class="row">
                                <div class="col-12">
                                    <span class="badge badge-light float-left topic">Как поставить wifi-точку</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque dolorem libero magni
                            veniam...</span>
                            <p class="m-0"><a href="" class="read-more">Читать полностью</a></p>
                        </div>
                        <div class="card-footer card-info-header">
                            <div class="row">
                                <div class="col-6">
                                    <span class="badge badge-light float-left">Комусов Николай</span>
                                </div>
                                <div class="col-6">
                                    <span class="badge badge-light float-right">2019-01-25 07:52:42</span>
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
        $('#inputSearch').keyup(function (e) {
            let input = $(this).val();
            if (input == '') {
                $('.card-outer').show()
            } else {
                $('.topic').each(function (index) {
                    if ($(this).text().toLowerCase().search(input.toLowerCase()) == -1) {
                        $(this).closest('.card-outer').hide();
                    } else {
                        $(this).closest('.card-outer').show();
                    }
                })
            }
        })
    </script>
@endsection
