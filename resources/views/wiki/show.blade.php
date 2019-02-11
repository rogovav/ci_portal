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
                    <h5 class="modal-title" id="exampleModalLabel">Редактирование статьи</h5>
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
                            <textarea name="info" id="wiki-body" cols="30" rows="10" class="form-control"
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
        <div class="card-header card-info-header">
            <h6>{{ $wiki->name }}</h6>
        </div>
        <div class="card-body padding-0">
            <div class="card">
                <div class="card-body">
                    <div>
                        {!! $wiki->info !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            @if( $wiki->user == Auth::user() )
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-light float-left btn-sm" data-toggle="modal" data-target="#exampleModal">
                                Редактировать
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-danger float-right btn-sm" data-toggle="modal" data-target="#exampleModal">
                                Удалить
                            </button>
                        </div>
                    </div>
            @endif
        </div>
    </div>
@endsection

@section('js')
    <script
        src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ubhq9o4po4p1w2zdmnaepfxsb8h6f4e78gdvggrvli4ho8cs"></script>
    <script>
        tinymce.init({
            selector: '#wiki-body',
            plugins: "table, codesample, textcolor, image, media, formatpainter, emoticons"
        });
    </script>
@endsection
