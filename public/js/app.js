$(document).ready(function () {

    $('.leftmenutrigger').on('click', function (e) {
        $('.side-nav').toggleClass("open");
        $('#wrapper').toggleClass("open");
        e.preventDefault();
    });


    var data = [
        {
            "name": "Tiger Nixon",
            "position": "System Architect",
            "salary": "$3,120",
            "start_date": "2011/04/25",
            "office": "Edinburgh",
            "extn": "5421"
        },
        {
            "name": "Garrett Winters",
            "position": "Director",
            "salary": "$5,300",
            "start_date": "2011/07/25",
            "office": "Edinburgh",
            "extn": "8422"
        }
    ]

    $('#table_id').DataTable({
        data: data,
        columns: [
            {data: 'name'},
            {data: 'position'},
            {data: 'salary'},
            {data: 'office'}
        ]
    });

});

