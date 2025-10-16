$(window).on("resize load", function (e) {

    if ($(window).width() > 991) {
        $('ul.nav li.dropdown').hover(function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(200);
        }, function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(200);
        });
    }

});

$('.carousel').carousel({
    interval: 5000 //changes the speed
});

$(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 200) {
        $("body").addClass("top-none");
    } else {
        $("body").removeClass("top-none");
    }
});
