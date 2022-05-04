document.addEventListener('DOMContentLoaded', function () {
    $('.tab').on('click', function (event) {
        event.preventDefault();

        $($(this).siblings()).removeClass('tab-active');
        $($(this).closest('.tabs-wrapper').siblings().find('div, form')).removeClass('tabs-content-active');

        $(this).addClass('tab-active');
        $($(this).attr('href')).addClass('tabs-content-active');
    });
});