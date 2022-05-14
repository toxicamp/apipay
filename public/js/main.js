"use strict";

function slideUp(e) {
    e.slideUp(300)
}

function fadeOut(e) {
    e.fadeOut(300)
}

function closedClick(e, t, o) {
    var n = $(e), a = $(t);
    $(document).mouseup((function (e) {
        n.is(e.currentTarget) || 0 !== n.has(e.target).length || (a.removeClass("active"), o(a))
    }))
}

function select() {
    var e = document.querySelectorAll(".select__top"), t = document.querySelectorAll(".select__content"),
        o = $(".select__input");
    document.addEventListener("click", (function (n) {
        var a = n.target;
        a.classList.contains("select__top") ? e.forEach((function (e, o) {
            a == e && (e.classList.toggle("active"), $(t[o]).slideToggle(300)), a != e && (e.classList.remove("active"), $(t[o]).slideUp(300))
        })) : e.forEach((function (e, o) {
            e.classList.remove("active"), $(t[o]).slideUp(300)
        })), o.on("click", (function () {
            var e = $(this).find("span").text(), t = $(this).find("img").attr("src"), o = $(this).parent(),
                n = $(this).parent().prev();
            n.find(".select__top-title").text(e), n.find(".select__top-icon").attr("src", t), o.slideUp(300)
        }))
    }))
}

$(".control__title").on("click", (function () {
    $(this).next().slideToggle(300)
})), closedClick(".header-profile", ".profile__content", slideUp), closedClick(".sample-popup__inner", ".sample-popup", fadeOut), closedClick(".popup", ".popup", fadeOut), closedClick(".modal-add", ".modal-bg", fadeOut),
    $(".custum-check__input").on("click", (function () {
        $(this).toggleClass("active")
        if($(".custum-check__input").hasClass('active')){
            $(".custum-check__input").find('.status_checked').val(1);
        }else{
            $(".custum-check__input").find('.status_checked').val(0);
        }

    })), select(), $(".btn-add-template, .create-account, .read-more").on("click", (function () {
    $(".add-template, .applic-modal").fadeIn(400), $(".overley").fadeIn(400)
})), $(".add-template__closed, .overley, .applic-modal__closed").on("click", (function () {
    $(".add-template, .applic-modal").fadeOut(400), $(".overley").fadeOut(400)
})), $(".edit, .edit-show").on("click", (function () {
    var id = $(this).attr('id');
    if(id){
        $(".edit-user[id='"+id+"']").fadeIn(400), $(".overley").fadeIn(400)
    }else{
        $(".edit-user").fadeIn(400), $(".overley").fadeIn(400)
    }

})), $(".edit-user__closed, .overley").on("click", (function () {
    $(".edit-user").fadeOut(400), $(".overley").fadeOut(400)
})), $(".btn-add-exchange").on("click", (function () {
    $(".modal-add-popup").fadeIn(400), $(".overley").fadeIn(400)
})), $(".modal-add__closed, .overley").on("click", (function () {
    $(".modal-add-popup").fadeOut(400), $(".overley").fadeOut(400)
})), $(".search-modal-show").on("click", (function () {
    $(".search-modal").fadeIn(400), $(".overley").fadeIn(400)
})), $(".overley, .search-modal__closed").on("click", (function () {
    $(".search-modal").fadeOut(400), $(".overley").fadeOut(400)
})), $(".btn-open").on("click", (function () {
    $(".transactions-modal").fadeIn(400), $(".overley").fadeIn(400)
})), document.addEventListener("DOMContentLoaded", (function () {
    $(".burger").on("click", (function () {
        $(".burger, .nav, .header__nav").toggleClass("active")
    })), $(".nav__link ").on("click", (function () {
        $(this).next().slideToggle(300)
    }))
})), document.addEventListener("DOMContentLoaded", (function () {
    function e() {
        var e = $(".header-admin").outerHeight();
        $(".page-content").css("padding-top", "".concat(e + 20, "px")), $(".nav").css("top", "".concat(e, "px"))
    }

    e(), $(window).resize((function () {
        e()
    }))
})), document.addEventListener("DOMContentLoaded", (function () {
    $(".tab").on("click", (function (e) {
        e.preventDefault(), $($(this).siblings()).removeClass("tab-active"), $($(this).closest(".tabs-wrapper").siblings().find("div, form")).removeClass("tabs-content-active"), $(this).addClass("tab-active"), $($(this).attr("href")).addClass("tabs-content-active")
    }))
})), document.addEventListener("DOMContentLoaded", (function () {
    function e(e, t, o) {
        $(e).on("click", (function () {
            $(t).fadeToggle(o)
        }))
    }

    function t(e, t, o) {
        $(e).on("click", (function () {
            $(t).fadeOut(o)
        }))
    }

    var o, n;
    o = ".profile__content", n = 300, $(".profile-main__btn").on("click", (function () {
        $(o).slideToggle(n)
    })), e(".sample-popup__close-change", ".sample-popup-change", 400), e(".sample__btn-change", ".sample-popup-change", 400), e(".main__btn--logo", ".popup--registration", 400), e(".main__btn--header", ".popup--authorization", 400), e(".popup__close--registration", ".popup--registration", 400), e(".popup__close--authorization", ".popup--authorization", 400), e(".popup__link-registration", ".popup--registration", 400), t(".popup__link-registration", ".popup--authorization", 400), e(".popup__link-password", ".popup--password", 400), t(".popup__link-password", ".popup--authorization", 400), e(".popup__close--password", ".popup--password", 400), e(".sample__btn-big", ".sample-popup-add", 400), e(".sample-popup__close-add", ".sample-popup-add", 400), t(".modal-add__closed--add", ".modal-bg--add", 400), e(".btn-add", ".modal-bg--add", 400), t(".modal-add__closed--change", ".modal-bg--change", 400), e(".table-edit", ".modal-bg--change", 400), $(".admin-table__nine-btn").on("click", (function () {
        $(this).siblings(".gear__content").fadeToggle(300)
    })), $(".admin-table__nine-btn").on("click", (function () {
        $(this).toggleClass("active")
    }))
}));
