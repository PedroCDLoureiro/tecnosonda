// Menu header
$("#icon-menu")
    .off("click")
    .on("click", function () {
        $(".menu-header").toggleClass("active");

        if ($(".menu-header").hasClass("active")) {
            $("#btn-header-orcamento").fadeOut(300, function () {
                $("#secondary-menu-header").fadeIn(300);
            });
        } else {
            $("#secondary-menu-header").fadeOut(300, function () {
                $("#btn-header-orcamento").fadeIn(300);
            });
        }
    });

// Barra busca
$("#icon-search svg")
    .off("click")
    .on("click", function () {
        $("#div-search").toggleClass("active");
    });

// Tamanho textos cards nossos serviços
function fitTextToHeight() {
    $(".left-title h3").each(function () {
        var $h3 = $(this);
        var parentHeight = $h3.parent().height();
        var fontSize = 10;
        $h3.css("font-size", fontSize + "px");

        while ($h3[0].scrollHeight < parentHeight && fontSize < 200) {
            fontSize++;
            $h3.css("font-size", fontSize + "px");
        }

        if ($h3[0].scrollHeight > parentHeight) {
            $h3.css("font-size", fontSize - 1 + "px");
        }
    });
}

$(window).on("load resize", fitTextToHeight);

// Padding container fluid nossos serviços
function ajustarPadding() {
    var $container = $("#nossos-servicos .container");
    var $containerFluid = $("#nossos-servicos .container-fluid");

    var marginLeft = parseInt($container.css("margin-left"), 10) + 12;
    $containerFluid.css("padding-left", marginLeft);
}

ajustarPadding();

$(window).on("resize", function () {
    ajustarPadding();
});

// Conteúdo cards nossos serviços
$(".row-items-servicos .item").on("click", function () {
    var id = $(this).data("id");

    $(".row-items-servicos .item").removeClass("active").addClass("desactive");

    $(this).removeClass("desactive").addClass("active");

    $(".content-servico").hide();
    $('.content-servico[data-id="' + id + '"]').show();
});

// Botões scroll
function initHorizontalScroll(prevBtn, nextBtn, slider) {
    const $slider = $(slider);

    $(prevBtn).on("click", function () {
        $slider.animate({ scrollLeft: $slider.scrollLeft() - 300 }, 300);
    });

    $(nextBtn).on("click", function () {
        $slider.animate({ scrollLeft: $slider.scrollLeft() + 300 }, 300);
    });
}
// Scroll nossos serviços
initHorizontalScroll(
    "#prev-nossos-servicos",
    "#next-nossos-servicos",
    ".row-items-servicos"
);
// Scroll subserviços
$(".prev-subservicos").each(function () {
    let dataId = $(this).data("id");

    initHorizontalScroll(
        '.prev-subservicos[data-id="' + dataId + '"]',
        '.next-subservicos[data-id="' + dataId + '"]',
        '.subservicos-wrapper[data-id="' + dataId + '"]'
    );
});
// Scroll cases
$(".prev-cases").each(function () {
    let dataId = $(this).data("id");

    initHorizontalScroll(
        '.prev-cases[data-id="' + dataId + '"]',
        '.next-cases[data-id="' + dataId + '"]',
        '.cases-wrapper[data-id="' + dataId + '"]'
    );
});
// Scroll nossos clientes
initHorizontalScroll(
    "#prev-nossos-clientes",
    "#next-nossos-clientes",
    ".row-items-nossos-clientes"
);

// Modal cases
$(document).on("click", ".case-item", function () {
    const postId = $(this).data("id");
    const indice = $(this).data("indice");
    const modal = $(`.caseModal[data-id="${postId}"]`);
    const slider = modal.find(".case-slider");

    modal.fadeIn(() => {
        $("body").addClass("stop-scroll");

        if (!slider.hasClass("slick-initialized")) {
            slider.slick({
                autoplay: false,
                arrows: true,
                dots: false,
                speed: 1000,
                fade: true,
                cssEase: "linear",
            });
        }

        slider.slick("slickGoTo", indice, true);
    });
});

// Fechar modal
$(document).on("click", ".close-caseModal", function () {
    const postId = $(this).data("id");
    const modal = $(`.caseModal[data-id="${postId}"]`);
    modal.fadeOut();
    $("body").removeClass("stop-scroll");
});

// Vídeo Nossos Valores
$(document).on("click", "#play-midia", function () {
    var video = $("#video-nossos-valores").get(0);
    video.play();
    $(this).fadeOut();
});

$(document).on("click", "#video-nossos-valores", function () {
    var video = $(this).get(0);
    if (!video.paused) {
        video.pause();
        $("#play-midia").fadeIn();
    }
});

$("#video-nossos-valores").on("ended", function () {
    $("#play-midia").fadeIn();
});
