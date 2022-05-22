document.addEventListener('DOMContentLoaded', function () {

    $('.burger').on('click', function () {
        $('.burger, .nav, .header__nav').toggleClass('active');
    });

    $('.nav__link ').on('click', function () {
        $(this).next().slideToggle(300);
    });
});