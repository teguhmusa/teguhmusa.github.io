document.addEventListener("DOMContentLoaded", () => { var n = 1; const t = new Plyr("#player");

    function i() { 1 == n && t.play() }
    window.player = t, $(".open_invitation").click(function() { t.play() }), window.addEventListener("touchstart", function(n) { i() }), window.addEventListener("scroll", function(n) { i() }), $(".btn-play-pause").click(function() { 0 == n ? (t.play(), n = 1) : (t.pause(), n = 0) }), $(".open_invitation").click(function() { i() }) });
