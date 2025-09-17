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
