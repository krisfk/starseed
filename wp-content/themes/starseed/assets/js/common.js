var $ = jQuery;
$.fn.isInViewport = function() {
    if ($(this).length > 0) {
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();

        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();

        return elementBottom > viewportTop && elementTop < viewportBottom;
    }
};

$(function() {
    $(
        '.fadeleft-ele , .faderight-ele, .fadein-ele,.fadeinup-ele,.fadeindown-ele,.fadeinup-ele2'
    ).css({
        opacity: 0,
    });
});

window.onload = function() {
    checkvisible();
};

$(window).on('scroll', function() {
    checkvisible();
});

function checkvisible() {
    for (i = 0; i < $('.fadeleft-ele').length; i++) {
        if (
            $('.fadeleft-ele').eq(i).isInViewport() &&
            !$('.fadeleft-ele').eq(i).hasClass('animate__animated')
        ) {
            $('.fadeleft-ele').eq(i).addClass('animate__animated');
            $('.fadeleft-ele').eq(i).addClass('fadeInLeft2');
            $('.fadeleft-ele').eq(i).addClass('delay-3');
        }
    }

    for (i = 0; i < $('.faderight-ele').length; i++) {
        if (
            $('.faderight-ele').eq(i).isInViewport() &&
            !$('.faderight-ele').eq(i).hasClass('animate__animated')
        ) {
            $('.faderight-ele').eq(i).addClass('animate__animated');
            $('.faderight-ele').eq(i).addClass('fadeInRight2');
            $('.faderight-ele').eq(i).addClass('delay-3');
        }
    }
    for (i = 0; i < $('.fadein-ele').length; i++) {
        if (
            $('.fadein-ele').eq(i).isInViewport() &&
            !$('.fadein-ele').eq(i).hasClass('animate__animated')
        ) {
            $('.fadein-ele').eq(i).addClass('animate__animated');
            $('.fadein-ele').eq(i).addClass('animate__fadeIn');
            $('.fadein-ele').eq(i).addClass('delay-2');
        }
    }

    for (i = 0; i < $('.sep-flo').length; i++) {
        if (
            $('.sep-flo').eq(i).isInViewport() &&
            !$('.sep-flo').eq(i).hasClass('animate__animated')
        ) {
            $('.sep-flo').eq(i).addClass('animate__animated');
            $('.sep-flo').eq(i).addClass('animate__fadeIn');
            $('.sep-flo').eq(i).addClass('delay-2');
        }
    }

    for (i = 0; i < $('.sep').length; i++) {
        if (
            $('.sep').eq(i).isInViewport() &&
            !$('.sep').eq(i).hasClass('animate__animated')
        ) {
            $('.sep').eq(i).addClass('animate__animated');
            $('.sep')
                .eq(i)
                .delay(500)
                .animate({ width: '100%', opacity: 1 }, 500, 'swing');
        }
    }

    for (i = 0; i < $('.sep2').length; i++) {
        if (
            $('.sep2').eq(i).isInViewport() &&
            !$('.sep2').eq(i).hasClass('animate__animated')
        ) {
            $('.sep2').eq(i).addClass('animate__animated');
            $('.sep2')
                .eq(i)
                .delay(500)
                .animate({ width: '100%', opacity: 1 }, 500, 'swing');
        }
    }

    for (i = 0; i < $('.little-gold-bar').length; i++) {
        if (
            $('.little-gold-bar').eq(i).isInViewport() &&
            !$('.little-gold-bar').eq(i).hasClass('animate__animated')
        ) {
            $('.little-gold-bar').eq(i).addClass('animate__animated');
            $('.little-gold-bar')
                .eq(i)
                .delay(500)
                .animate({ width: '100px', opacity: 1 }, 500, 'swing');
        }
    }

    //

    //
    for (i = 0; i < $('.fadeinup-ele').length; i++) {
        if (
            $('.fadeinup-ele').eq(i).isInViewport() &&
            !$('.fadeinup-ele').eq(i).hasClass('animate__animated')
        ) {
            $('.fadeinup-ele').eq(i).addClass('animate__animated');
            $('.fadeinup-ele').eq(i).addClass('animate__fadeInUp');
            $('.fadeinup-ele').eq(i).addClass('delay-4');
        }
    }
    for (i = 0; i < $('.fadeindown-ele').length; i++) {
        if (
            $('.fadeindown-ele').eq(i).isInViewport() &&
            !$('.fadeindown-ele').eq(i).hasClass('animate__animated')
        ) {
            $('.fadeindown-ele').eq(i).addClass('animate__animated');
            $('.fadeindown-ele').eq(i).addClass('animate__fadeInDown');
            $('.fadeindown-ele').eq(i).addClass('delay-4');
        }
    }

    for (i = 0; i < $('.fadeinup-ele2').length; i++) {
        if (
            $('.fadeinup-ele2').eq(i).isInViewport() &&
            !$('.fadeinup-ele2').eq(i).hasClass('animate__animated')
        ) {
            $('.fadeinup-ele2').eq(i).addClass('animate__animated');
            $('.fadeinup-ele2').eq(i).addClass('fadeInUp2');
            $('.fadeinup-ele2').eq(i).addClass('delay-3');
        }
    }

    if (
        $('.circular-info').isInViewport() &&
        !$('.circular-info').hasClass('animate__animated')
    ) {
        $('.circular-info').addClass('animate__animated');
        $('.circular-info').addClass('animate__rotateIn');
        $('.circular-info').addClass('delay-3');
    }
}