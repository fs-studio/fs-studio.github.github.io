$(function() {
  $('.header-menu__hamburger').click(function() {
    $(this).toggleClass('header-menu__hamburger_active');
    $('.header-container').toggle(300);
  });
  $('.to_offer').on('click', function() {
    $('.modal').show(300);
  });
  $('#modal-close').on('click', function() {
    $('.modal').hide(300);
  });
});