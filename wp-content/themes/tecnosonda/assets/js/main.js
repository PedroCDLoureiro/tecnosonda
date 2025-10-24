jQuery(document).ready(function ($) {
    // Container width
    var containerWidth = $(".container").width();

    // Define uma variável CSS global no :root
    $(":root").css("--container-width", containerWidth + "px");

    $(window).on("resize", function () {
        var containerWidth = $(".container").width();
        $(":root").css("--container-width", containerWidth + "px");
    });

    // Menu header
    $("#icon-menu")
        .off("click")
        .on("click", function () {
            if ($(window).width() > 991) {
                // DESKTOP
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
            } else {
                // MOBILE
                $("#menu-mobile").toggleClass("active");
                $("body").toggleClass("stop-scroll");
            }
        });
    $("#close-menu-mobile")
        .off("click")
        .on("click", function () {
            $("#menu-mobile").toggleClass("active");
            $("body").toggleClass("stop-scroll");
        });

    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 100) {
            $("#menu-scroll").addClass("active");
            $("header").addClass("menu-scroll");
        } else {
            $("#menu-scroll").removeClass("active");
            $("header").removeClass("menu-scroll");
        }
    });

    // Barra busca
    $(".icon-search svg")
        .off("click")
        .on("click", function () {
            $("#div-search").toggleClass("active");
            $("#input-search input").focus();
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

    function ajustarPadding(seletorReferencia, seletorAlvo, offset = 0) {
        if ($(seletorReferencia).length > 0) {
            var marginLeft =
                parseInt($(seletorReferencia).css("margin-left"), 10) + offset;
            $(seletorAlvo).css("padding-left", marginLeft);

            if ($(window).width() > 767) {
                $(".section-title").css(
                    "--before-left",
                    -marginLeft / 2 + "px"
                );
                $("#entre-em-contato").css(
                    "--before-left",
                    -marginLeft / 2 + "px"
                );
            }
        }
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
        const postId = $(this).data("id"); // opcional
        const indice = $(this).data("indice") || 0;
        let modal;

        // Se existir postId, seleciona o modal com data-id, senão pega o modal genérico
        if (postId) {
            modal = $(`.caseModal[data-id="${postId}"]`);
        } else {
            modal = $(".caseModal").first(); // pega o primeiro modal disponível
        }

        if (!modal.length) return; // se não achar modal, aborta

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

    // Modal Contato
    $(document).on("click", "#form-contato", function () {
        const modal = $(".contactModal");
        modal.fadeIn(() => {
            $("body").addClass("stop-scroll");
        });
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
    $(
        ".page h1, .page .title_servico, .single h1, .single h2, .title-list h3, #page-category h1"
    ).each(function () {
        var $el = $(this);
        var texto = $el.text().trim();
        var palavras = texto.split(/\s+/);
        var total = palavras.length;

        if (total < 2) return; // só 1 palavra, não faz nada

        // Se o título tiver a classe .broken-title
        if ($el.is(".page h1.broken-title, .single h1.broken-title")) {
            // Divide as palavras pela metade
            var metade = Math.floor(total / 2);
            // Se for ímpar, a segunda parte fica maior
            var inicioSegundaParte = metade;

            // Se for ímpar, dá a palavra "extra" para a segunda metade
            if (total % 2 !== 0) {
                inicioSegundaParte = metade; // a divisão natural já deixa a segunda parte maior
            }

            var primeiraParte = palavras.slice(0, inicioSegundaParte).join(" ");
            var segundaParte = palavras.slice(inicioSegundaParte).join(" ");

            $el.html(primeiraParte + "<br><span>" + segundaParte + "</span>");
        } else {
            // Comportamento normal para outros títulos
            var inicioSegundaParte = total === 3 ? 1 : Math.ceil(total / 2);

            var primeiraParte = palavras.slice(0, inicioSegundaParte).join(" ");
            var segundaParte = palavras.slice(inicioSegundaParte).join(" ");

            $el.html(primeiraParte + " <span>" + segundaParte + "</span>");
        }
    });

    // Botões Subserviços (interna)
    jQuery(document).ready(function ($) {
        $(".btn-subservico").on("click", function () {
            const index = $(this).data("index");

            // Atualiza botão ativo
            $(".btn-subservico").removeClass("active");
            $(this).addClass("active");

            // Mostra conteúdo correspondente
            $(".subservico-item").hide();
            $('.subservico-item[data-index="' + index + '"]').fadeIn(300);
        });
    });

    // Botão Upload File
    $("#upload-field").on("change", function () {
        const fileName = $(this).val().split("\\").pop();
        const label = $(".upload-archives label");
        if (fileName) {
            let displayName = fileName;
            if (displayName.length > 20) {
                displayName = displayName.slice(0, 20) + "...";
            }
            label.html("<strong>" + displayName + "</strong> incluído");
        } else {
            label.text("Incluir");
        }
    });

    // Botão voltar
    $(".btn-voltar").on("click", function (e) {
        e.preventDefault();
        console.log("clique");

        if (document.referrer && document.referrer !== window.location.href) {
            window.history.back();
        } else {
            window.location.href = "/";
        }
    });

    // Botão compartilhar post

    $(document).on("click", "#btn-share-post", function () {
        const postTitle = $("h1").first().text().trim();
        const postUrl = window.location.href;

        // Se o navegador suporta o Web Share API (mobile, Safari, Chrome, Edge modernos)
        if (navigator.share) {
            navigator
                .share({
                    title: postTitle,
                    text: "Confira esta notícia:",
                    url: postUrl,
                })
                .then(() => {
                    console.log("Post compartilhado com sucesso!");
                })
                .catch((err) => {
                    console.error("Erro ao compartilhar:", err);
                });
        }
        // Fallback para desktop ou navegadores sem suporte
        else {
            // Cria um input temporário para copiar o link
            const tempInput = $("<input>");
            $("body").append(tempInput);
            tempInput.val(postUrl).select();
            document.execCommand("copy");
            tempInput.remove();

            // Feedback visual (você pode ajustar o estilo)
            const $btn = $("#btn-share-post");
            const originalSvg = $btn.html();

            $btn.html(
                '<span style="color:#fff;font-size:12px;">Link copiado!</span>'
            );

            setTimeout(() => {
                $btn.html(originalSvg);
            }, 2000);
        }
    });
});
