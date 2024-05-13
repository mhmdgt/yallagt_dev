// Default
// $(document).ready(function () {
//     $(".owl-carousel").owlCarousel();
// });

// Home Slider
jQuery("#carousel").owlCarousel({
    autoplay: true,
    rewind: true,
    responsiveClass: true,
    smartSpeed: 1200,
    slideSpeed: 800,
    loop: true,
    nav: true,
    navText: ["<img src='public/yalla_gt/media/icon/left-arrow.png'>", "<img src='public/yalla_gt/media/icon/right-arrow.png'>"],
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
        navText: ["<i class='bi bi-arrow-left-circle-fill'></i>", "<i class='bi bi-arrow-right-circle-fill'></i>"],
        loop: false,
        nav: false,
        autoplay: false,
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

// Brands
var $BrandOWL = $('.BrandOWL');
if ($BrandOWL.length > 0) {
    $('.BrandOWL').on('changed.owl.carousel initialized.owl.carousel', function (event) {
        $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')
    }).owlCarousel({
        loop: true,
        nav: false,
        slideBy: 2,
        autoplay: true,
        autoplayTimeout: 4000,
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
            },
            480: {
                items: 3,
            },
            768: {
                items: 3,
            },
            992: {
                items: 5,
            },

        }
    });
}

// Product Gategories
var $ProductCatedoryOWL = $('.ProductCatedoryOWL');
if ($ProductCatedoryOWL.length > 0) {
    $('.ProductCatedoryOWL').on('changed.owl.carousel initialized.owl.carousel', function (event) {
        $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')
    }).owlCarousel({
        // navText: ["<i class='bx bxs-left-arrow-circle'></i>","<i class='bx bxs-right-arrow-circle'></i>"],
        loop: false,
        nav: false,
        slideBy: 2,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 6,
        margin: 12,
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
            },
            300: {
                items: 2,
            },
            480: {
                items: 2,
            },
            768: {
                items: 3,
            },
            992: {
                items: 6,
            },

        }
    });
}

// // EditImgs
// var $EditImgsOWL = $('.EditImgsOWL');
// if ($EditImgsOWL.length > 0) {
//     $('.EditImgsOWL').on('changed.owl.carousel initialized.owl.carousel', function (event) {
//         $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')
//     }).owlCarousel({
//         // navText: ["<i class='bx bxs-left-arrow-circle'></i>","<i class='bx bxs-right-arrow-circle'></i>"],
//         loop: false,
//         nav: false,
//         slideBy: 2,
//         autoplay: false,
//         autoplayTimeout: 8000,
//         items: 6,
//         margin: 12,
//         dots: false,
//         responsiveClass: true,
//         responsive: {
//             0: {
//                 items: 2,
//             },
//             300: {
//                 items: 2,
//             },
//             480: {
//                 items: 2,
//             },
//             768: {
//                 items: 3,
//             },
//             992: {
//                 items: 6,
//             },

//         }
//     });
// }
