/* Button Ripple Effect */
$(function() {
    $(".button_ripple").on("click", function(e) {
        $(this).append("<span class=\"ripple-effect\">");
        $(this).find(".ripple-effect").css({
            left: e.pageX - $(this).offset().left,
            top: e.pageY - $(this).offset().top
        }).animate({
            opacity: 0
        }, 1500, function() {
            $(this).remove();
        });
    });
});

/* END--Button Ripple Effect */

/* Modal Window */

$(function() {
    $("#openModal").on("click", function() {
        setTimeout(function() {
            $(".modal-window").removeClass("modal-window_disactive")
        }, 200);
    });

    $(".container_modal").on("click", function(e) {

        if ($(e.target).attr("class") == $(this).attr("class")) {
            $(".modal-window").addClass("modal-window_disactive");
        } else {
            console.log("click");
        }

    });

    $(".modal-close__close").on("click", function() {
        $(".modal-window").addClass("modal-window_disactive");
    });

    $(document).on("keydown", function(e) {

        if (e.keyCode == 27 && !$(".modal-window").hasClass("modal-window_disactive")) {
            $(".modal-window").addClass("modal-window_disactive");
        }

    });

    $("#sendOrder").on("click", function(e) {
        e.preventDefault();

        let name = $("#customerName").val();
        let phone = $("#customerPhone").val();

        if (name != "" || phone != "") {
            //post-запрос на обработчик

            window.location.href = "../thanks/";
        } else {
            alert("Пожалуйста, заполните все поля!");
        }

    });
});

/* END--Modal Window */
