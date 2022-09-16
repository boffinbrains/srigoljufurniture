jQuery(document).ready(function ($) {
    var owl = $(".owl-carousel");
    owl.on(
        "initialize.owl.carousel initialized.owl.carousel " +
        "initialize.owl.carousel initialize.owl.carousel " +
        "resize.owl.carousel resized.owl.carousel " +
        "refresh.owl.carousel refreshed.owl.carousel " +
        "update.owl.carousel updated.owl.carousel " +
        "drag.owl.carousel dragged.owl.carousel " +
        "translate.owl.carousel translated.owl.carousel " +
        "to.owl.carousel changed.owl.carousel",
        function (e) {
            $("." + e.type)
                .removeClass("secondary")
                .addClass("success");
            window.setTimeout(function () {
                $("." + e.type)
                    .removeClass("success")
                    .addClass("secondary");
            }, 500);
        }
    );
    owl.owlCarousel({
        loop: true,
        nav: true,
        lazyLoad: true,
        margin: 10,
        video: true,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            960: {
                items: 3,
            },
            1200: {
                items: 4,
            },
        },
    });
});