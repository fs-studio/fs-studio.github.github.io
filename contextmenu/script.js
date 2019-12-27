$(function() {
    $(document).on("contextmenu", function(e) {
        $(".context-menu").removeClass("hidden");
        $(".context-menu").css({
            top: e.clientY,
            left: e.clientX
        });

        $(this).on("click", function(e) {
            if (event.which == 1) {
                $(".context-menu").addClass("hidden");
            }
        });

        return false;
    });
});
