$(function() {
  var slide = 1;
  var goSlider = setInterval(function() { slider(); }, 10000);

  setTimeout(function() { slider(); }, 3000);

  function slider() {
    $('.main-bg').addClass('main-bg-slide' + slide);

    $('.main-bg').removeClass('main-bg-slide' + (slide - 1));

    if (slide > 3) {
        slide = 1;
        $('.main-bg').removeClass('main-bg-slide4');
    }

    slide++;
  }
});