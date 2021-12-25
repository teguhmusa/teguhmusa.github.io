"use strict";
$(document).ready(function() {
    $("select").niceSelect(),
    AOS.init(),
    window.addEventListener("load", AOS.refresh),
    $(".dropdown-menu a.dropdown-toggle").on("click", function(n) {
        return $(this).next().hasClass("show") || $(this).parents(".dropdown-menu").first().find(".show").removeClass("show"),
        $(this).next(".dropdown-menu").toggleClass("show"),
        $(this).parents("li.nav-item.dropdown.show").on("hidden.bs.dropdown", function(n) {
            $(".dropdown-submenu .show").removeClass("show")
        }),
        !1
    }),
    $(".count-btn").on("click", function() {
        var n = $(this)
          , o = n.parent(".count-input-btns").parent().find("input").val();
        if (n.hasClass("inc-ammount"))
            var e = parseFloat(o) + 1;
        else if (o > 0)
            e = parseFloat(o) - 1;
        else
            e = 0;
        n.parent(".count-input-btns").parent().find("input").val(e)
    }),
    window.onscroll = function() {
        !function() {
            document.body.scrollTop > 20 || document.documentElement.scrollTop > 20 ? $(".sticky-header").addClass("scrolling") : $(".sticky-header").removeClass("scrolling");
            document.body.scrollTop > 200 || document.documentElement.scrollTop > 200 ? $(".sticky-header.scrolling").addClass("reveal-header") : $(".sticky-header.scrolling").removeClass("reveal-header")
        }()
    }
}),
$(document).ready(function() {
    $(".goto").on("click", function(n) {
        if ("" !== this.hash) {
            n.preventDefault();
            var o = this.hash;
            $("html, body").animate({
                scrollTop: $(o).offset().top
            }, 2e3, function() {
                window.location.hash = o
            })
        }
    })
});
