$('.products-carousel').owlCarousel({
    // center: true,
    loop: false,
    margin: 10,
    nav: true,
    dots: false,
    // stagePadding:170,
    autoplay: false,
    autoplayTimeout: 2500,
    autoplayHoverPause: false,
    animateIn: 'fadeIn',
    animateOut: 'fadeOut',
    // navText : ["<img src='/wp-content/uploads/2021/07/Arrow-Left-Blair-ITC.png' />","<img src='/wp-content/uploads/2021/07/Arrow-Right-Blair-ITC.png' />"],
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 3
        },
        1000: {
            items: 4
        }
    }
});

$('.posts-carousel').owlCarousel({
    // center: true,
    loop: false,
    margin: 10,
    nav: true,
    dots: false,
    // stagePadding:170,
    autoplay: false,
    autoplayTimeout: 2500,
    autoplayHoverPause: false,
    animateIn: 'fadeIn',
    animateOut: 'fadeOut',
    navText: ["<img src='https://insideoutcreative.io/wp-content/uploads/2022/11/Arrow-Left-Fancy.png' />", "<img src='https://insideoutcreative.io/wp-content/uploads/2022/11/Arrow-Right-Fancy.png' />"],
    items: 1,
    // responsive:{
    //     0:{
    //         items:2
    //     },
    //     600:{
    //         items:3
    //     },
    //     1000:{
    //         items:4
    //     }
    // }
});

$('.testimonials-carousel').owlCarousel({
    // center: true,
    loop: false,
    margin: 10,
    nav: true,
    dots: false,
    // stagePadding:170,
    autoplay: false,
    autoplayTimeout: 2500,
    autoplayHoverPause: false,
    animateIn: 'fadeIn',
    animateOut: 'fadeOut',
    navText: ["<img src='https://insideoutcreative.io/wp-content/uploads/2022/11/Arrow-Left-Fancy.png' />", "<img src='https://insideoutcreative.io/wp-content/uploads/2022/11/Arrow-Right-Fancy.png' />"],
    items: 1,
    // responsive: {
    //     0: {
    //         items: 2
    //     },
    //     600: {
    //         items: 3
    //     },
    //     1000: {
    //         items: 4
    //     }
    // }
});