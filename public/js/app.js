$(document).ready(function () {

    tinymce.init({
        selector: '#comment-user-mission'
    });

    $('.leftmenutrigger').on('click', function (e) {
        $('.side-nav').toggleClass("open");
        $('#wrapper').toggleClass("open");
        e.preventDefault();
    });


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
        "createdRow": function (row, data, dataIndex) {
            if (data["priority"].includes("green")) {
                $(row).addClass('deadline-middle');
            }
            else if (data["priority"].includes("brown")) {
                $(row).addClass('deadline-expired');
            }
            else {
                $(row).addClass('deadline-ok');
            }

            if (data["priority"].includes("clock")){

            }
        },
        "columns": [
            {data: 'id'},
            {data: 'priority'},
            {data: 'type'},
            {data: 'author'},
            {data: 'worker'},
            {data: 'topic'},
            {data: 'client'},
            {data: 'datefrom'},
            {data: 'deadline'},
        ]
    });

    $('.group-user-avatar').popover('enable');
});
