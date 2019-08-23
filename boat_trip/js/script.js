$(function() {
  $('.header-top__left_hamburger').click(function() {
    $(this).toggleClass('hamburger_active');
    $('nav').toggleClass('visible');
  });
  $('#more').click(function() {
    $('.assortment-block_hidden').toggle(300);
    $(this).css('display', 'none');
  });
  
  $('#modal-close').click(function() {
    $('.modal').hide(300);
  });
  $('#anapa').click(function() {
    $('#anapa-modal').show(300);
    $('.slick-track').css('width', '808px');
  })
});