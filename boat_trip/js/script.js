$(function() {
  $('.header-top__left_hamburger').click(function() {
    $(this).toggleClass('hamburger_active');
    $('.header-top__left nav').toggle(300);
  });
});