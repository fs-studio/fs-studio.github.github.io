$(function() {
  $('#more').click(function(e) {
    e.preventDefault;
//    if($('.assortment-block_hidden').css('display') === 'none') {
//      $('.assortment-block_hidden').css('display', 'block');
//    }
    $('.assortment-block_hidden').toggle(300);
    $(this).text('Скрыть');
  });
});