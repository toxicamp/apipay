document.addEventListener('DOMContentLoaded', function () {


    function toggleSlideItem(parent, item, speed) {
        $(parent).on('click', function () {
            $(item).slideToggle(speed);
        });
    }

    function toggleFadeItem(parent, item, speed) {
        $(parent).on('click', function () {
            $(item).fadeToggle(speed);
        });
    }

    function closeFadeItem(parent, item, speed) {
        $(parent).on('click', function () {
            $(item).fadeOut(speed);
        });
    }

    toggleSlideItem('.profile-main__btn', '.profile__content', 300);
    toggleFadeItem('.sample-popup__close-change', '.sample-popup-change', 400);
    toggleFadeItem('.sample__btn-change', '.sample-popup-change', 400);

    toggleFadeItem('.main__btn--logo', '.popup--registration', 400);
    toggleFadeItem('.main__btn--header', '.popup--authorization', 400);
    toggleFadeItem('.popup__close--registration', '.popup--registration', 400);
    toggleFadeItem('.popup__close--authorization', '.popup--authorization', 400);
    toggleFadeItem('.popup__link-registration', '.popup--registration', 400);
    closeFadeItem('.popup__link-registration', '.popup--authorization', 400);
    toggleFadeItem('.popup__link-password', '.popup--password', 400);
    closeFadeItem('.popup__link-password', '.popup--authorization', 400);
    toggleFadeItem('.popup__close--password', '.popup--password', 400);
    toggleFadeItem('.sample__btn-big', '.sample-popup-add', 400);
    toggleFadeItem('.sample-popup__close-add', '.sample-popup-add', 400);
    closeFadeItem('.modal-add__closed--add', '.modal-bg--add', 400);
    toggleFadeItem('.btn-add', '.modal-bg--add', 400);
    closeFadeItem('.modal-add__closed--change', '.modal-bg--change', 400);
    toggleFadeItem('.table-edit', '.modal-bg--change', 400);


    $('.admin-table__nine-btn').on('click', function () {
        $(this).siblings(".gear__content").fadeToggle(300);
    });
    $('.admin-table__nine-btn').on('click', function () {
        $(this).toggleClass('active');
    });
});