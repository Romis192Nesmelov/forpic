$(document).ready(function() {
    $('.styled').uniform();
    // unifiedHeight();
    // $(window).resize(function() {
    //     unifiedHeight();
    // });

    $('a.img-preview').fancybox({padding: 3});
    new PerfectScrollbar('html');

    halfHeight();
    $(window).resize(function() {
        halfHeight();
    });

    // Owlcarousel
    var navButtonBlack1 = '<img src="/images/arrow_left_black.svg" />',
        navButtonBlack2 = '<img src="/images/arrow_right_black.svg" />';
        // navButtonWhite1 = '<img src="/images/arrow_left_white.svg" />',
        // navButtonWhite2 = '<img src="/images/arrow_right_white.svg" />';
    $('.owl-carousel.documents').owlCarousel({
        margin: 10,
        loop: true,
        nav: true,
        autoplay: true,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            729: {
                items: 3
            },
            1200: {
                items: 4
            }
        },
        navText:[navButtonBlack1,navButtonBlack2]
    });

    // Scroll menu
    $('a[data-scroll], div[data-scroll]').click(function (e) {
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

    // Calculator
    var checkBoxes = $('.calculator input'),
        calculatorTotal = $('#calculator-value');
    checkBoxes.change(function () {
        var totalValue = 0;
        checkBoxes.each(function () {
            if ($(this).is(':checked')) {
                totalValue += parseInt($(this).attr('name'));
            }
        });
        calculatorTotal.html(tolocalstring(totalValue));
    });

    $('.calculator button').click(function () {
        checkBoxes.prop('checked',false).uniform('refresh');
        calculatorTotal.html(tolocalstring(0));
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

function halfHeight() {
    var obj = $('.half-height'),
        windowHeight = $(window).height();
    if (windowHeight < 800) obj.css('height',windowHeight);
    else obj.css('height',windowHeight/1.8);
}

function tolocalstring(string) {
    return string.toLocaleString().replace(/\,/g, ' ')+' ₽';
}