// Home Slider


jQuery("#carousel").owlCarousel({
    autoplay: true,
    rewind: true,
    responsiveClass: true,
    smartSpeed: 1200,
    slideSpeed: 800,
    loop: true,
    nav: true,
    navText: ["<img src='public/yalla_gt/assets/img/icon/left-arrow.png'>","<img src='public/yalla_gt/assets/img/icon/right-arrow.png'>"], 
    responsive: {
        0: {
            items: 1
        },

        600: {
            items: 1
        },

        1024: {
            items: 1
        },

        1366: {
            items: 1
        }
    }
});

// Sale Cars
var $carsforsaleContainer = $('.carsforsaleContainer');
if ($carsforsaleContainer.length > 0) {
    $('.carsforsaleContainer').on('changed.owl.carousel initialized.owl.carousel', function (event) {
        $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')
    }).owlCarousel({
        loop: false,
        nav: false,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 4,
        margin: 20,
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            300: {
                items: 1,
                margin: 15,
            },
            480: {
                items: 2,
            },
            768: {
                items: 3,
            },
            992: {
                items: 4,
            },
        }
    });
}


// Brands & Manufacturers
var $brandContainer = $('.brand_container');
if ($brandContainer.length > 0) {
    $('.brand_container').on('changed.owl.carousel initialized.owl.carousel', function (event) {
        $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')
    }).owlCarousel({
        loop: false,
        nav: false,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 4,
        margin: 20,
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            300: {
                items: 2,
                margin: 15,
            },
            480: {
                items: 2,
            },
            768: {
                items: 3,
            },
            992: {
                items: 4,
            },

        }
    });
}

// Featured Category
var $featured_categories = $('.featured_categories');
if ($featured_categories.length > 0) {
    $featured_categories.on('changed.owl.carousel initialized.owl.carousel', function (event) {
        $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')
    }).owlCarousel({
        loop: false,
        autoplay: true,
        autoplayTimeout: 8000,
        items: 5,
        margin: 10,
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2.2,
            },
            576: {
                items: 2.2,
            },
            768: {
                items: 4,
            },
            992: {
                items: 8,
            },
            1200: {
                items: 8,
            },

        }
    });
}
