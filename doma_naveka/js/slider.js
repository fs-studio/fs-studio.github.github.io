let tabContentActive = $('.tab-content__active').owlCarousel({
    margin: 30,
    dotsContainer: '.nav-dots',
    dotClass: 'nav-dots__elem',
    loop: true,
    smartSpeed: 1000
});

$('.nav-prev').click(function() {
    tabContentActive.trigger('prev.owl.carousel');
});

$('.nav-next').click(function() {
    tabContentActive.trigger('next.owl.carousel');
});