$(function() {
  $(window).scroll(function() {
    if ($(this).scrollTop() > 275) {
      $('#masthead').removeClass('menu_nofixed');
      $('#masthead').addClass('menu_fixed');
      $('.site-content').css('margin-top', '120px');
    } else {
      $('#masthead').removeClass('menu_fixed');
      $('#masthead').addClass('menu_nofixed');
      $('.site-content').css('margin-top', '0');
    }
  });
});
