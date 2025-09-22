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
$("#icon-search svg")
    .off("click")
    .on("click", function () {
        $("#div-search").toggleClass("active");
    });

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

function ajustarPadding() {
    var $container = $("#nossos-servicos .container");
    var $containerFluid = $("#nossos-servicos .container-fluid");

    var marginLeft = $container.css("margin-left");

    $containerFluid.css("padding-left", marginLeft);
}

ajustarPadding();

$(window).on("resize", function () {
    ajustarPadding();
});

$(".row-items-servicos .item").on("click", function () {
    var id = $(this).data("id");

    $(".row-items-servicos .item").removeClass("active").addClass("desactive");

    $(this).removeClass("desactive").addClass("active");

    $(".content-servico").hide();
    $('.content-servico[data-id="' + id + '"]').show();
});
