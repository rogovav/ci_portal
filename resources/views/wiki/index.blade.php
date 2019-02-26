@extends('layout.index')
@section('css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
@endsection
@section('content')
    <div class="modal fade " id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Создание статьи</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('wiki.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" placeholder="Название статьи">
                        </div>
                        <div class="form-group">
                            <textarea name="short_info" type="text" class="form-control"
                                      placeholder="Краткое описание статьи"></textarea>
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
                        <div class="col-12 col-md-9 col-lg-9 col-xl-10 mt-1">
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
                        <div class="col-12 col-md-3 col-lg-3 col-xl-2 mt-1">
                            <button class="btn btn-info float-right btn-block" data-toggle="modal"
                                    data-target="#exampleModal">
                                Создать статью
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-outer ml-5 mt-3">
            <h5>Тема 1</h5>
            <ul style="list-style: none" class="ml-4">
                @foreach($wikis as $wiki)
                    <li class="wiki-name">
                        <h6><a href="{{ route('wiki.show', $wiki->id) }}">{{ $wiki->name }}</a></h6>
                    </li>
                @endforeach
            </ul>
        </div>

        {{--@foreach($wikis as $wiki)--}}
        {{--<div class=" col-md-6 col-lg-6 col-xl-4 card-outer">--}}
        {{--<div class="card">--}}
        {{--<div class="card-header">--}}
        {{--<div class="row">--}}
        {{--<div class="col-12">--}}
        {{--<span class="badge badge-light float-left topic"><h6 class="mb-0">{{ $wiki->name }}</h6></span>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="card-body">--}}
        {{--<span>{!! nl2br($wiki->short_info) !!}</span>--}}
        {{--<p class="m-0"><a href="{{ route('wiki.show', $wiki->id) }}" class="read-more">Читать полностью</a></p>--}}
        {{--</div>--}}
        {{--<div class="card-footer">--}}
        {{--<div class="row">--}}
        {{--<div class="col-6">--}}
        {{--<span class="badge badge-light float-left">{{ $wiki->user->fio }}</span>--}}
        {{--</div>--}}
        {{--<div class="col-6">--}}
        {{--<span class="badge badge-light float-right">{{ $wiki->created_at }}</span>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--@endforeach--}}

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
                $('.wiki-name').each(function (index) {
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
