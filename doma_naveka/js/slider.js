let tabContentActive = $('#tab-content-slider-0').owlCarousel({
    margin: 30,
    dotsContainer: '.nav-dots-0',
    dotClass: 'nav-dots__elem',
    loop: true,
    smartSpeed: 1000,
    responsive: {
        1900: {
            items: 3
        },
        1500: {
            items: 2
        }
    }
});

$('.nav-prev0').click(function() {
    tabContentActive.trigger('prev.owl.carousel');
});

$('.nav-next0').click(function() {
    tabContentActive.trigger('next.owl.carousel');
});

/*----------------------------*/
$('#tab-content-slider-1').owlCarousel({
    margin: 30,
    dotsContainer: '.nav-dots-1',
    dotClass: 'nav-dots__elem',
    loop: true,
    smartSpeed: 1000,
    responsive: {
        1900: {
            items: 3
        },
        1500: {
            items: 2
        }
    }
});

$('#tab-content-slider-2').owlCarousel({
    margin: 30,
    dotsContainer: '.nav-dots-2',
    dotClass: 'nav-dots__elem',
    loop: true,
    smartSpeed: 1000,
    responsive: {
        1900: {
            items: 3
        },
        1500: {
            items: 2
        }
    }
});

$('.nav-prev1').click(function() {
    $('#tab-content-slider-1').trigger('prev.owl.carousel');
});

$('.nav-next1').click(function() {
    $('#tab-content-slider-1').trigger('next.owl.carousel');
});

$('.nav-prev2').click(function() {
    $('#tab-content-slider-2').trigger('prev.owl.carousel');
});

$('.nav-next2').click(function() {
    $('#tab-content-slider-2').trigger('next.owl.carousel');
});