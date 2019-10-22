/* Button Ripple Effect */

$(".button_ripple").on("click", function(e) {
    $(this).append("<span class=\"ripple-effect\">");
    $(this).find(".ripple-effect").css({
        left: e.pageX - $(this).offset().left,
        top: e.pageY - $(this).offset().top
    }).animate({
        opacity: 0
    }, 1500, function() {
        //$(this).remove();
    });
});

/* END--Button Ripple Effect */
