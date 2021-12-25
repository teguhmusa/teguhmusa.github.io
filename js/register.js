$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});
var timer = null;
function checkDomain() {
    var n = $("input[name=domain]").val();
    $.ajax({
        type: "POST",
        url: "/api/check-subdomain",
        data: {
            domain: n
        },
        success: function(n) {
            0 == n ? $(".domain-validation").show() : $(".domain-validation").hide()
        }
    })
}
function AvoidSpace(n) {
    if (32 == (n ? n.which : window.event.keyCode))
        return !1
}
$("#domain").keydown(function() {
    clearTimeout(timer),
    timer = setTimeout(checkDomain, 500)
}),
$("input[name='domain']").on({
    keydown: function(n) {
        if (32 === n.which)
            return !1
    },
    change: function() {
        this.value = this.value.replace(/\s/g, "")
    }
});
