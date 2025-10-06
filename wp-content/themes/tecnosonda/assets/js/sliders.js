jQuery(document).ready(function ($) {
    $("#slider-topo").slick({
        autoplay: false,
        arrows: true,
        dots: true,
        speed: 1000,
        fade: true,
        cssEase: "linear",
    });
    $("#slider-imagens-servico").slick({
        autoplay: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
        dots: false,
        speed: 1000,
        cssEase: "linear",
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });
});
