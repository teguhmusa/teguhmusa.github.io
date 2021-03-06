! function() {
    "use strict";
    var e, t = function(e, t) {
            for (var n = 0; n < e.length; n++) t(e[n])
        },
        n = e => {
            var t = e.split("#");
            return t.length > 1 ? t[0] : e
        },
        o = (e, t, n) => {
            for (var o = e instanceof NodeList ? e : [e], r = 0; r < o.length; r++) o[r] && o[r].addEventListener(t, n)
        },
        r = (e, t) => {
            l(e, t, "toggle")
        },
        i = (e, t) => {
            l(e, t, "add")
        },
        a = (e, t) => {
            l(e, t, "remove")
        },
        l = (e, t, n) => {
            for (var o = t.split(" "), r = e instanceof NodeList ? e : [e], i = 0; i < r.length; i++) r[i] && r[i].classList[n].apply(r[i].classList, o)
        },
        d = null,
        s = 2,
        c = () => {
            var {
                masonryStatus: e,
                masonryColumns: t,
                blogLayout: n
            } = NeveProperties;
            "enabled" !== e || t < 2 || null !== (d = document.querySelector(".nv-index-posts .posts-wrapper")) && imagesLoaded(d, () => {
                window.nvMasonry = new Masonry(d, {
                    itemSelector: "article.layout-".concat(n),
                    columnWidth: "article.layout-".concat(n),
                    percentPosition: !0
                })
            })
        },
        u = () => {
            "enabled" === NeveProperties.infiniteScroll && null !== document.querySelector(".nv-index-posts .posts-wrapper") && function(e, t) {
                var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : .5,
                    o = new IntersectionObserver(o => {
                        if (!(o[0].intersectionRatio <= n)) {
                            t();
                            var r = setInterval(() => {
                                var n = e.getBoundingClientRect(),
                                    {
                                        top: o,
                                        left: i,
                                        right: a,
                                        bottom: l
                                    } = n,
                                    {
                                        innerWidth: d,
                                        innerHeight: s
                                    } = window;
                                o >= 0 && i >= 0 && a <= d && l <= s ? t() : clearInterval(r)
                            }, 750)
                        }
                    });
                o.observe(e)
            }(document.querySelector(".infinite-scroll-trigger"), () => {
                if (parent.wp.customize) return parent.wp.customize.requestChangesetUpdate().then(() => {
                    v()
                }), !1;
                v()
            })
        },
        v = () => {
            var e = document.querySelector(".infinite-scroll-trigger");
            if (null !== e) {
                if (document.querySelector(".nv-loader").style.display = "block", s > NeveProperties.infiniteScrollMaxPages) return e.parentNode.removeChild(e), void(document.querySelector(".nv-loader").style.display = "none");
                var t, n, o, r, i = document.querySelector(".nv-index-posts .posts-wrapper"),
                    a = p(NeveProperties.infiniteScrollEndpoint + s);
                s++, t = a, n = e => {
                    if (i.innerHTML += JSON.parse(e), "enabled" !== NeveProperties.masonry) return !1;
                    window.nvMasonry.reloadItems(), window.nvMasonry.layout()
                }, o = NeveProperties.infiniteScrollQuery, (r = new XMLHttpRequest).onload = () => {
                    4 === r.readyState && 200 === r.status && n(r.response)
                }, r.onerror = () => {}, r.open("POST", t, !0), r.setRequestHeader("Content-Type", "application/json; charset=UTF-8"), r.send(o)
            }
        },
        p = e => void 0 === wp.customize ? e : (e += "?customize_changeset_uuid=" + wp.customize.settings.changeset.uuid + "&customize_autosaved=on", "undefined" == typeof _wpCustomizeSettings ? e : e += "&customize_preview_nonce=" + _wpCustomizeSettings.nonce.preview),
        m = () => {
            var o;
            e = window.location.href, y(),
                function() {
                    var o = document.querySelectorAll(".nv-nav-wrap a");
                    if (0 === o.length) return;
                    t(o, t => {
                        t.addEventListener("click", t => {
                            var o = t.target.getAttribute("href");
                            if (null === o) return !1;
                            n(o) === n(e) && window.HFG.toggleMenuSidebar(!1)
                        })
                    })
                }(), g(), w(), h(), !0 === /(Trident|MSIE|Edge)/.test(window.navigator.userAgent) && (o = document.querySelectorAll('.header--row[data-show-on="desktop"] .sub-menu'), t(o, e => {
                    var t = e.parentNode;
                    t.addEventListener("mouseenter", () => {
                        i(e, "dropdown-open")
                    }), t.addEventListener("mouseleave", () => {
                        a(e, "dropdown-open")
                    })
                })), window.HFG.initSearch = function() {
                    w(), g()
                }
        },
        y = () => {
            var e, n, {
                    isRTL: o
                } = NeveProperties,
                r = document.querySelectorAll(".sub-menu, .minimal .nv-nav-search");
            if (0 !== r.length) {
                var i = window.innerWidth;
                t(r, t => {
                    var r = t.getBoundingClientRect(),
                        a = r.left;
                    a < 0 && (e = o ? "auto" : 0, n = o ? "-100%" : "auto", t.style.right = n, t.style.left = e), a + r.width >= i && (n = o ? 0 : "100%", e = "auto", t.style.right = n, t.style.left = e)
                })
            }
        };

    function g() {
        var e = document.querySelectorAll(".caret-wrap");
        t(e, e => {
            e.addEventListener("click", t => {
                t.preventDefault(), t.stopPropagation();
                var n = e.parentNode.parentNode.querySelector(".sub-menu");
                r(e, "dropdown-open"), r(n, "dropdown-open"), f(document.querySelectorAll(".dropdown-open"), "dropdown-open")
            })
        })
    }

    function w() {
        var e = document.querySelectorAll(".nv-nav-search"),
            n = document.querySelectorAll(".menu-item-nav-search"),
            o = document.querySelectorAll(".close-responsive-search");
        t(n, e => {
            e.addEventListener("click", t => {
                t.preventDefault(), t.stopPropagation(), r(e, "active"), setTimeout(() => {
                    e.querySelector(".search-field").focus()
                }, 50), window.innerWidth <= 960 || f(e, "active")
            })
        }), t(e, e => {
            e.addEventListener("click", e => {
                e.stopPropagation()
            })
        }), t(o, e => {
            e.addEventListener("click", e => {
                e.preventDefault(), t(n, e => {
                    a(e, "active")
                });
                var o = document.querySelector(".nav-clickaway-overlay");
                null !== o && o.parentNode.removeChild(o)
            })
        })
    }

    function h() {
        var e = document.querySelectorAll(".header--row .nv-nav-cart");
        0 !== e.length && t(e, e => {
            e.getBoundingClientRect().left < 0 && (e.style.left = 0)
        })
    }

    function f(e, t) {
        var n = document.querySelector(".nav-clickaway-overlay");
        null !== n && n.parentNode.removeChild(n), n = document.createElement("div"), i(n, "nav-clickaway-overlay");
        var o = document.querySelector("header.header");
        o.parentNode.insertBefore(n, o), n.addEventListener("click", () => {
            a(e, t), n.parentNode.removeChild(n)
        })
    }
    window.addEventListener("resize", h);
    var S, b = function() {
        this.options = {
            menuToggleDuration: 300
        }, this.init()
    };

    function q() {
        window.HFG = new b, (() => {
            if (null === document.querySelector(".blog.nv-index-posts")) return !1;
            c(), u()
        })(), m()
    }

    function L() {
        y()
    }
    b.prototype.init = function() {
        var e = arguments.length > 0 && void 0 !== arguments[0] && arguments[0];
        if (!1 === e) {
            var t = document.querySelectorAll(".close-sidebar-panel .navbar-toggle");
            o(t, "click", () => {
                this.toggleMenuSidebar(!1)
            })
        }
        var n = document.querySelectorAll(".menu-mobile-toggle");
        o(n, "click", () => {
            this.toggleMenuSidebar(!0)
        });
        var r = document.querySelector(".header-menu-sidebar-overlay");
        o(r, "click", function() {
            this.toggleMenuSidebar(!1)
        }.bind(this))
    }, b.prototype.toggleMenuSidebar = function(e) {
        var t = document.querySelectorAll(".menu-mobile-toggle");
        if (a(document.body, "hiding-header-menu-sidebar"), !NeveProperties.isCustomize && document.body.classList.contains("is-menu-sidebar") || !1 === e) {
            var n = document.querySelector(".nav-clickaway-overlay");
            null !== n && n.parentNode.removeChild(n), i(document.body, "hiding-header-menu-sidebar"), a(document.body, "is-menu-sidebar"), a(t, "is-active"), setTimeout(function() {
                a(document.body, "hiding-header-menu-sidebar")
            }.bind(this), 1e3)
        } else i(document.body, "is-menu-sidebar"), i(t, "is-active")
    }, window.addEventListener("load", () => {
        q()
    }), window.addEventListener("resize", () => {
        clearTimeout(S), S = setTimeout(L, 500)
    })
}();