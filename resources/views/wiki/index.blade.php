@extends('layout.index')
@section('css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
@endsection
@section('content')
    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Создание статьи</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Название статьи">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Краткое описание статьи">
                        </div>
                        <div class="form-group">
                            <textarea name="info" id="wiki-body" cols="30" rows="30" class="form-control"
                                      placeholder="Комментарий"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 m-0">
                    <div class="form-row">
                        <div class="col-10">
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="material-icons">search</i>
                            </span>
                                </div>
                                <input id="inputSearch" type="text" class="form-control"
                                       placeholder="Введите слово или фразу"
                                       aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal">
                                Создать статью
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class=" col-md-6 col-lg-6 col-xl-4 card-outer">
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

    <script
        src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ubhq9o4po4p1w2zdmnaepfxsb8h6f4e78gdvggrvli4ho8cs"></script>
    <script>
        tinymce.init({
            selector: '#wiki-body',
            plugins: "table, codesample, textcolor image, media"
        });
    </script>

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
