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
                    <h5 class="modal-title" id="exampleModalLabel">Редактирование статьи</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Название статьи">
                        </div>
                        <div class="form-group">
                            <textarea type="text" id="description" name="short_info" class="form-control"
                                      placeholder="Краткое описание статьи" rows="1"></textarea>
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
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-9 col-lg-9 col-form-label">
                    {{ $wiki->name }}
                </div>
                <div class="col-sm-12 col-md-12 col-xl-3 col-lg-3">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-6 col-lg-6">
                            <button class="btn btn-light float-right col-12" data-toggle="modal"
                                    data-target="#exampleModal" onclick="changeWiki({{ $wiki }})">
                                Редактировать
                            </button>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-6 col-lg-6">
                            <button class="btn btn-danger float-right col-12">
                                Удалить
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div>{!! $wiki->info !!}
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
        $(document).ready(function () {
            tinymce.init({
                selector: '#wiki-body',
                plugins: "table, codesample, textcolor, image, media, formatpainter, emoticons"
            });
        })
    </script>
    <script>
        function changeWiki(wiki) {
            $('#name').val(wiki.name)
            $('#description').val(wiki.short_info)
            $('#wiki-body_ifr').contents().find('body').html(wiki.info)

        }
    </script>
@endsection
