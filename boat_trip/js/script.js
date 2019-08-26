$(function() {
  $('.header-top__left_hamburger').click(function() {
    $(this).toggleClass('hamburger_active');
    $('nav').toggleClass('visible');
  });
  $('#more').click(function() {
    $('.assortment-block_hidden').toggle(300);
    $(this).css('display', 'none');
  });
  
  $('.modal-close').click(function() {
    $('.modal').hide(300);
  });
  $('#anapa').click(function() {
    $('#anapa-modal').show(300);
    $('.slick-track').css('width', '808px');
  })
  $('#obzor').click(function() {
    $('#obzor-modal').show(300);
    $('.slick-track').css('width', '808px');
  })
  $('#gelendzhik').click(function() {
    $('#gelendzhik-modal').show(300);
    $('.slick-track').css('width', '808px');
  })
  $('#novorossiysk').click(function() {
    $('#novorossiysk-modal').show(300);
    $('.slick-track').css('width', '808px');
  })
  $('#abrau').click(function() {
    $('#abrau-modal').show(300);
    $('.slick-track').css('width', '808px');
  })
  $('#arhip').click(function() {
    $('#arhip-modal').show(300);
    $('.slick-track').css('width', '808px');
  })
  $('#tuapse').click(function() {
    $('#tuapse-modal').show(300);
    $('.slick-track').css('width', '808px');
  })
  $('.to-offer').click(function() {
    $('#form').show(300);
  })
});