$(".featured-carousel").owlCarousel({
    loop: true,
    nav: true,
    autoplay: true,
    autoplayHoverPause: true,
    autoplayTimeout: 2000,
    margin: 10,

    responsive: {
        0: {
            items: 1,
            dots: false
        },
        600: {
            items: 3,
            dots: false
        },

        1000: {
            items: 3,
            dots: false
        }
    }
});