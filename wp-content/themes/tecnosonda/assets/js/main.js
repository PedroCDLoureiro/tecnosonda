jQuery(document).ready(function ($) {
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

    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 100) {
            $("header").addClass("menu-scroll");
            $("#btn-header-orcamento")
                .removeClass("transparent-btn")
                .addClass("secondary-btn");
        } else {
            $("header").removeClass("menu-scroll");
            $("#btn-header-orcamento")
                .removeClass("secondary-btn")
                .addClass("transparent-btn");
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
        var marginLeft =
            parseInt($("#nossos-servicos .container").css("margin-left"), 10) +
            12;
        $(
            "#nossos-servicos .container-fluid, #sobre-noticias .container-fluid, #page-nossa-historia .container-marcos"
        ).css("padding-left", marginLeft);
    }

    ajustarPadding();

    $(window).on("resize", function () {
        ajustarPadding();
    });

    function ajustarPadding(seletorReferencia, seletorAlvo, offset = 0) {
        var marginLeft =
            parseInt($(seletorReferencia).css("margin-left"), 10) + offset;
        $(seletorAlvo).css("padding-left", marginLeft);
    }

    function atualizarTodos() {
        ajustarPadding(
            "#nossos-servicos .container",
            "#nossos-servicos .container-fluid, #sobre-noticias .container-fluid",
            12
        );

        ajustarPadding("header .container", "#banner .texts", 12);

        ajustarPadding(
            "#page-nossa-historia .container",
            "#page-nossa-historia .marcos",
            12
        );
    }

    atualizarTodos();

    $(window).on("resize", function () {
        clearTimeout(window._ajusteTimeout);
        window._ajusteTimeout = setTimeout(atualizarTodos, 100);
    });

    // Conteúdo cards nossos serviços
    $(".row-items-servicos .item").on("click", function () {
        var id = $(this).data("id");

        $(".row-items-servicos .item")
            .removeClass("active")
            .addClass("desactive");

        $(this).removeClass("desactive").addClass("active");

        $(".content-servico").hide();
        $('.content-servico[data-id="' + id + '"]').show();
    });

    // Botões scroll
    function initHorizontalScroll(prevBtn, nextBtn, slider, pixelsToScroll) {
        const $slider = $(slider);

        $(prevBtn).on("click", function () {
            $slider.animate(
                { scrollLeft: $slider.scrollLeft() - pixelsToScroll },
                pixelsToScroll
            );
        });

        $(nextBtn).on("click", function () {
            $slider.animate(
                { scrollLeft: $slider.scrollLeft() + pixelsToScroll },
                pixelsToScroll
            );
        });
    }
    // Scroll nossos serviços
    initHorizontalScroll(
        "#prev-nossos-servicos",
        "#next-nossos-servicos",
        ".row-items-servicos",
        300
    );
    // Scroll subserviços
    $(".prev-subservicos").each(function () {
        let dataId = $(this).data("id");

        initHorizontalScroll(
            '.prev-subservicos[data-id="' + dataId + '"]',
            '.next-subservicos[data-id="' + dataId + '"]',
            '.subservicos-wrapper[data-id="' + dataId + '"]',
            300
        );
    });
    // Scroll cases
    $(".prev-cases").each(function () {
        let dataId = $(this).data("id");

        initHorizontalScroll(
            '.prev-cases[data-id="' + dataId + '"]',
            '.next-cases[data-id="' + dataId + '"]',
            '.cases-wrapper[data-id="' + dataId + '"]',
            300
        );
    });
    // Scroll nossos clientes
    initHorizontalScroll(
        "#prev-nossos-clientes",
        "#next-nossos-clientes",
        ".row-items-nossos-clientes",
        300
    );
    // Scroll sobre - notícias
    initHorizontalScroll(
        "#prev-sobre-noticias",
        "#next-sobre-noticias",
        ".row-items-noticias",
        300
    );
    // Scroll marcos
    initHorizontalScroll(
        "#prev-marcos",
        "#next-marcos",
        ".marcos-wrapper",
        600
    );

    // Modal cases
    $(document).on("click", ".case-item", function () {
        const postId = $(this).data("id");
        const indice = $(this).data("indice");
        const modal = $(`.caseModal[data-id="${postId}"]`);
        const slider = modal.find(".items-slider");

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

    // Modal marcos
    $(document).on("click", ".content-marco", function () {
        const indice = $(this).data("indice");
        const modal = $(".marcoModal");
        const slider = modal.find(".items-slider");

        modal.fadeIn(() => {
            $("body").addClass("stop-scroll");

            if (!slider.hasClass("slick-initialized")) {
                slider.slick({
                    autoplay: false,
                    arrows: true,
                    dots: true,
                    infinite: false,
                    speed: 1000,
                    fade: true,
                    cssEase: "linear",
                    customPaging: function (slider, i) {
                        var thumb = $(slider.$slides[i]).data("thumb");
                        return (
                            '<img src="' +
                            thumb +
                            '" alt="thumbnail ' +
                            (i + 1) +
                            '">'
                        );
                    },
                });
            }

            slider.slick("slickGoTo", indice, true);
        });
    });

    $(document).on("click", ".marcoModal .next-slide", function () {
        const slider = $(".marcoModal .items-slider");

        if (slider.hasClass("slick-initialized")) {
            slider.slick("slickNext");
        }
    });

    function ajustarTextsEDots() {
        const $texts = $(".marcoModal .texts");
        const $dots = $(".marcoModal .slick-dots");

        if ($texts.length && $dots.length) {
            let maxHeight = 0;

            // Descobre o maior height entre todos os .texts
            $texts.each(function () {
                const h = $(this).outerHeight();
                if (h > maxHeight) maxHeight = h;
            });

            // Aplica o maior height a todos os .texts
            $texts.css("height", maxHeight + "px");

            // Ajusta o bottom dos dots
            $dots.css("bottom", maxHeight + 10 + "px");
        }
    }

    // Chamada inicial (após o modal e slider estarem visíveis)
    $(document).on("click", ".content-marco", function () {
        const modal = $(".marcoModal");

        modal.fadeIn(() => {
            $("body").addClass("stop-scroll");

            const slider = modal.find(".items-slider");
            if (!slider.hasClass("slick-initialized")) {
                slider.slick({
                    autoplay: false,
                    arrows: true,
                    dots: true,
                    infinite: false,
                    speed: 1000,
                    fade: true,
                    cssEase: "linear",
                    customPaging: function (slick, i) {
                        const thumb = $(slick.$slides[i]).data("thumb");
                        return (
                            '<img src="' +
                            thumb +
                            '" alt="thumbnail ' +
                            (i + 1) +
                            '">'
                        );
                    },
                });
            }

            // Ajusta textos e dots
            ajustarTextsEDots();
        });
    });

    // Também atualiza no resize da janela
    $(window).on("resize", function () {
        ajustarTextsEDots();
    });

    // Fechar modal
    $(document).on("click", ".close-modal", function () {
        const modal = $(".modal");
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

    // Formatação H1 páginas internas
    $(".page h1").each(function () {
        var texto = $(this).text().trim();
        var palavras = texto.split(/\s+/); // separa por espaços, considerando múltiplos
        var total = palavras.length;

        if (total < 2) return; // só 1 palavra, não faz nada

        var inicioSegundaParte;
        if (total === 2) {
            inicioSegundaParte = 1; // pega a última palavra
        } else if (total === 3) {
            inicioSegundaParte = 1; // pega as duas últimas palavras
        } else {
            inicioSegundaParte = Math.ceil(total / 2); // divide pela metade
        }

        var primeiraParte = palavras.slice(0, inicioSegundaParte).join(" ");
        var segundaParte = palavras.slice(inicioSegundaParte).join(" ");

        $(this).html(primeiraParte + " <span>" + segundaParte + "</span>");
    });
});
