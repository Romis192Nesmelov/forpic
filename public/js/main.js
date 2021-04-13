$(document).ready(function() {
    $('.styled').uniform();
    // unifiedHeight();
    // $(window).resize(function() {
    //     unifiedHeight();
    // });

    // $('.styled').uniform();
    $('a.img-preview').fancybox({padding: 3});
    
    // Owlcarousel
    // $('.owl-carousel.sports').owlCarousel({
    //     margin: 10,
    //     loop: true,
    //     nav: true,
    //     autoplay: true,
    //     dots: true,
    //     responsive: {
    //         0: {
    //             items: 1
    //         },
    //         729: {
    //             items: 3
    //         },
    //         1200: {
    //             items: 4
    //         }
    //     },
    //     navText:[navButtonBlack1,navButtonBlack2]
    // });

    // Scroll menu
    $('a[data-scroll]').click(function (e) {
        e.preventDefault();
        window.menuClickFlag = true;
        goToScroll($(this).attr('data-scroll'));
    });

    // Scroll controls
    var onTopButton = $('#on-top-button');
    $(window).scroll(function() {
        if (!window.menuClickFlag) {
            var win = $(this);
            $('.section').each(function () {
                var scrollData = $(this).attr('data-scroll-destination');
                if (!win.scrollTop()) {
                    resetColorHrefsMenu();
                } else if ($(this).offset().top <= win.scrollTop()+50 && scrollData) {
                    resetColorHrefsMenu();
                    $('a[data-scroll-destination=' + scrollData + ']').addClass('active');
                }
            });
        }
        if ($(window).scrollTop() > $(window).height()) onTopButton.fadeIn();
        else onTopButton.fadeOut();
    });
});

// function unifiedHeight() {
//     var unifiedHeight = [
//         {
//             'obj'       :$('.event'),
//             'reserve'   :0,
//             'except'    :null,
//             'include'   :$('.calendar-container')
//         }
//     ];
//
//     setTimeout(function () {
//         $.each(unifiedHeight, function (k,item) {
//             maxHeight(item.obj,item.reserve,item.except,item.include);
//         });
//     },1000);
// }

function goToScroll(scrollData) {
    $('html,body').animate({
        scrollTop: $('div[data-scroll-destination="' + scrollData + '"]').offset().top
    }, 1500, 'easeInOutQuint');
}

function resetColorHrefsMenu() {
    $('.main-menu > a.active').removeClass('active').blur();
}