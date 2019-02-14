$(document).ready(function () {

    $('.leftmenutrigger').on('click', function (e) {
        $('.side-nav').toggleClass("open");
        $('#wrapper').toggleClass("open");
        e.preventDefault();
    });

    $('.group-user-avatar').popover('enable');

    $(".post-comment-icon").click(function () {
        console.log("click");
        $(this).closest(".posts-wrapper").find(".comments-rendered").slideToggle("slow", function () {
            console.log($(".comments-rendered").css("display") == "block");
        });
    });
    //.user-popup-select

});

