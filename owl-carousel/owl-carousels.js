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

$('.testimonials-carousel').owlCarousel({
    // center: true,
    loop: false,
    margin: 10,
    nav: true,
    dots: false,
    // autoplay:true,
    // autoplayTimeout:2500,
    // autoplayHoverPause:false,
    navText: ["<img src='http://localhost:8888/monroe-consulting/wp-content/uploads/2022/08/Arrow-Left.png' />", "<img src='http://localhost:8888/monroe-consulting/wp-content/uploads/2022/08/Arrow-Right.png' />"],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
});