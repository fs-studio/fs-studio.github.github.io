$(function() {
  $('.tab-link').on('click', function() {
    let tab = $(this).attr('tab');

    $(this).siblings().removeClass('tab-link__active');
    $(this).addClass('tab-link__active');

    $('.tab-content:eq(' + tab + ')').siblings().removeClass('tab-content__active');
    $('.tab-content:eq(' + tab + ')').addClass('tab-content__active');
    
    $('#tab-content-slider-' + tab).trigger('refresh.owl.carousel');
  });
});