@extends('layout.index')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-table-rendered padding-0">
                <div class="row">
                    <div class="col-12">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Клиент</th>
                                <th>Источник</th>
                                <th>Тема</th>
                                <th>Исполнитель</th>
                                <th>Помощники</th>
                                <th>Адрес</th>
                            </tr>
                            <tr class="search-tr">
                                <th>#</th>
                                <th>Клиент</th>
                                <th>Источник</th>
                                <th>Тема</th>
                                <th>Исполнитель</th>
                                <th>Помощники</th>
                                <th>Адрес</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($missions as $mission)
                                    <tr>
                                        <td>
                                            <a href="{{ route('mission.show', $mission->id) }}">#{{ $mission->id }}</a>
                                        </td>
                                        <td>{{@$mission->client->fio}}</td>
                                        <td>{{ $from[$mission->from] }}</td>
                                        <td>{{$mission->subject->name}}</td>
                                        <td>{{$mission->worker->fio}}</td>
                                        <td>
                                            @foreach($mission->helpers as $helper)
                                                {{ $helper->fio . ' ' }}
                                            @endforeach
                                        </td>
                                        <td>{{ @$mission->building->name }}{{ $mission->address? (', ' . $mission->address) : null }}
                                            ({{ @$mission->building->address }})</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                fixedHeader: true,
                responsive: true,
                order: [[0, 'desc']],
                language: {
                    "processing": "Подождите...",
                    "search": "Поиск:",
                    "lengthMenu": "Показать _MENU_ записей",
                    "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                    "infoEmpty": "Записи с 0 до 0 из 0 записей",
                    "infoFiltered": "(отфильтровано из _MAX_ записей)",
                    "infoPostFix": "",
                    "loadingRecords": "Загрузка записей...",
                    "zeroRecords": "Записи отсутствуют.",
                    "emptyTable": "В таблице отсутствуют данные",
                    "paginate": {
                        "first": "Первая",
                        "previous": "Предыдущая",
                        "next": "Следующая",
                        "last": "Последняя"
                    },
                    "aria": {
                        "sortAscending": ": активировать для сортировки столбца по возрастанию",
                        "sortDescending": ": активировать для сортировки столбца по убыванию"
                    }
                }
            });
            // Setup - add a text input to each footer cell
            $('#example .search-tr th').each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control" />');
            });

            // DataTable
            var table = $('#example').DataTable();

            // Apply the search
            table.columns().every(function () {
                var that = this;

                $('input', this.header()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
@endsection