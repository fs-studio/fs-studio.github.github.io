$('.about-slider').slick({
  dots: true,
  arrows: true,
  prevArrow: $('.left-arrow'),
  nextArrow: $('.right-arrow'),
  infinite: true,
  speed: 300,
  slidesToShow: 2,
  slidesToScroll: 1,
  responsive: [
//    {
//      breakpoint: 1024,
//      settings: {
//        slidesToShow: 3,
//        slidesToScroll: 3,
//        infinite: true,
//        dots: true
//      }
//    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});