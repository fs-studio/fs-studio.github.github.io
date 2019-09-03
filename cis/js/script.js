/* Preloader */

$(function() {
  $(window).on('load', function() {
    setTimeout(function() {
      var fspagepreloader = $(".preloader");
      if (!fspagepreloader.hasClass("preloader_disable")) {
        fspagepreloader.removeClass("preloader_active");
        fspagepreloader.addClass("preloader_disable");
      }
    }, 1500);
  });
});


/* Preloader */


$(function() {

    $(".js-openClass").on('click', function() {
        let openClass = '.' + $(this).attr('data-open');

        if (!$(openClass).hasClass('active')) {
            $(openClass).addClass('active');
        } else {
            $(openClass).removeClass('active');
        }

    });

    $(".js-close").on('click', function() {
        let closeClass = '.' + $(this).attr('data-close');

        if ($(closeClass).hasClass('active')) {
            $(closeClass).removeClass('active');
        }

    });

});
