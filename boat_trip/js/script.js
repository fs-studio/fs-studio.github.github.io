$(function() {
  $('.header-top__left_hamburger').click(function() {
    $(this).toggleClass('hamburger_active');
    $('nav').toggle(300);
  });
  $('#more').click(function(e) {
    e.preventDefault;
//    if($('.assortment-block_hidden').css('display') === 'none') {
//      $('.assortment-block_hidden').css('display', 'block');
//    }
    $('.assortment-block_hidden').toggle(300);
    $(this).text('Скрыть');
  });
});