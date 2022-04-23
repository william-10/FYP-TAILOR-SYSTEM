    $(".owl-carousel").owlCarousel({
        autoplay: true,
        autoplayhoverpause: true,
        autoplaytimeout: 200,
        items: 2,
        loop: true,
        nav: true,
        responsive: {
            0: {
                items: 1,
                dots: false
            },
            485: {
                items: 2,
                dots: false
            },
            728: {
                items: 2,
                dots: false
            },
            960: {
                items: 2,
                dots: false
            },
            1200: {
                items: 2,
                dots: false
            }
        }
    });