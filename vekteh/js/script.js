$(function() {
//  $("a[href^='#']").click(function() {
//    var _href = $(this).attr("href");
//    $("html, body").animate({scrollTop: $(_href).offset().top+"px"});
//    return false;
//  });
  
  $('.header-menu__hamburger').click(function() {
    $(this).toggleClass('header-menu__hamburger_active');
    $('.header-container').toggle(300);
  });
  
  $('.to_offer').on('click', function() {
//    $('.main-bg__title').css('z-index', 'auto');
    $('.modal').show(300);
  });
  $('.to_complectation').on('click', function() {
    $('.complectation').show(300);
  });
  $('.main-descr__button').on('click', function() {
    $('.modalSelect').show(300);
  });
  $('#modal-close').on('click', function() {
    $('.modal').hide(300);
  });
  $('#complectation-close').on('click', function() {
    $('.complectation').hide(300);
  });
  $('#modalSelect-close').on('click', function() {
    $('.modalSelect').hide(300);
  });
});