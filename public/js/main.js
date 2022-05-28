$('.header .header-dots .dot').click(function () {
    $('.header .header-dots .dot').removeClass('active');
    $(this).addClass('active');
    let dataHeader = parseInt($(this).data('header')) + 1;

    $('.header-title:first-child').removeClass('fadeInLeft').addClass('bounceOutRight');
    setTimeout(() => {
        $('.header-description.header-description-display').removeClass('fadeInLeft').addClass('bounceOutRight');
    }, 300);

    setTimeout(() => {
        $('.header-btn').removeClass('bounceInLeft').removeClass('fadeInLeft').addClass('bounceOutRight');
    }, 600);

    setTimeout(() => {
        let text = $('.header-title:nth-child(' + dataHeader + ')').text();
        $('.header-title:first-child').removeClass('bounceOutRight').addClass('bounceInLeft').find('span').text(text);

        setTimeout(() => {
            text = $('.header-description.header-description-' + (dataHeader - 1)).text();
            $('.header-description.header-description-display').removeClass('bounceOutRight').addClass('fadeInLeft').text(text);
        }, 300);

        setTimeout(() => {
            $('.header-btn').removeClass('bounceOutRight').addClass('bounceInLeft');
        }, 600);

    }, 1300);
});

$('.navbar-toggle').click(function () {
    let show = $('.navbar-nav').data('show');
    if (show) {
        $('.navbar-nav').css({
            'display': 'none'
        });
        $('.navbar-nav').data('show', false)
        $(this).html('<i class="fas fa-bars"></i>');
    } else {
        $('.navbar-nav').css({
            'display': 'block'
        });
        $('.navbar-nav').data('show', true)
        $(this).html('<i class="fas fa-times"></i>');
    }
});

$('.gallery-preview').click(function (e) {
    e.preventDefault();

    var src = $(this).find('img').attr('src');

    $('#gallery-preview').addClass('show').find('img').attr('src', src);
    $('body').css({ 'overflow-y': 'hidden' });
});

$('.gallery-preview-times').click(function (e) {
    e.preventDefault();

    $('#gallery-preview').removeClass('show');
    $('body').css({ 'overflow-y': 'scroll' });
})

$('#scroll-top').click(function () {
    $('html, body').animate({
        scrollTop: 0
    }, 800, function () {
        $(window).scrollTop(0);
    });
});

$(window).scroll(function (e) {
    let scrollTop = $(window).scrollTop();
    if (scrollTop > 500) {
        scrollToTopShow();
    } else {
        scrollToTopHide();
    }
});

function scrollToTopShow() {
    $('#scroll-top').removeClass('bounceOutDown').addClass('bounceInUp');
}

function scrollToTopHide() {
    $('#scroll-top').removeClass('bounceInUp').addClass('bounceOutDown');
}

$('.link-to-element').click(function (e) {
    e.preventDefault();
    let selector = $(this).attr('href');
    let distEl = $(selector).offset().top;

    $('html, body').animate({
        scrollTop: distEl
    }, 2000, function () {
        $(window).scrollTop(distEl);
    });
});