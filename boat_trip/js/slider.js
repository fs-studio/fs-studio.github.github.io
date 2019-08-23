//$('.slider-for').slick({
//  slidesToShow: 1,
//  slidesToScroll: 1,
//  arrows: false,
//  fade: true,
//  asNavFor: '.slider-nav'
//});
//$('.slider-nav').slick({
//  slidesToShow: 3,
//  slidesToScroll: 1,
//  asNavFor: '.slider-for',
//  centerMode: true,
//  focusOnSelect: true
//});
$('.slider').slick({
  autoplay: true,
  autoplaySpeed: 5000,
  speed: 2500,
  infinite: true,
  dots: true,
  arrows: false,
  fade: true
});

//$('.slider-nav').slick({
//  slidesToShow: 4,
//  autoplay: true,
//  autoplaySpeed: 5000,
//  infinite: true,
//  asNavFor: '.slider-for',
//  arrows: false,
//  draggable: false,
//  focusOnSelect: true
//});