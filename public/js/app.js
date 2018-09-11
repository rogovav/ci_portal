$(document).ready(function () {

    tinymce.init({
        selector: '#comment-user-mission'
    });

    $('.leftmenutrigger').on('click', function (e) {
        $('.side-nav').toggleClass("open");
        $('#wrapper').toggleClass("open");
        e.preventDefault();
    });

    // var data_to_table = $.getJSON("https://raw.githubusercontent.com/angular-ui/ui-grid/master/misc/site/data/10000.json", function (data) {
    //     console.log(data);
    //     return data;
    // });

    var table = $('#table_id').DataTable({
        "order": [[0, "desc"]],
        "language": {
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
        },
        "ajax": {
            "url": "http://ci/public/test.json",
            "dataSrc": "data"
        },
        "columns": [
            {data: 'id'},
            {data: 'type'},
            {data: 'author'},
            {data: 'worker'},
            {data: 'topic'},
            {data: 'client'},
            {data: 'priority'},
            {data: 'datefrom'},
            {data: 'deadline'},
            {data: 'time'}
        ]
    });

    table.on('xhr', function () {
        var json = table.ajax.json();
        console.log(json.data.length + ' row(s) were loaded');
    });



});
