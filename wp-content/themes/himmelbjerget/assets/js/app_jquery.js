(function ($) {
    $(document).ready(function () {
        //Animation degrees on scroll in hero module
        (() => {
            var degrees = $('#hero-degrees');
            if (!degrees) {
                return;
            }

            var start = 6.4;

            $(window).scroll(function () {
                var scrolled = $(window).scrollTop(),
                    coff = (scrolled / 60 - start) * -1;

                if (coff >= 0 && coff <= start) {
                    degrees.html(coff.toFixed(1).replace('.', ','));
                }

                if (coff <= 0) {
                    degrees.html(0.0.toFixed(1).replace('.', ','));
                }
            });
        })();

        //Animation scroll on click to anchor
        (() => {
            $('a[href^="#"]').on("click", function (e) {
                e.preventDefault();
                var anchor = $(this);

                $('html, body').stop().animate({
                    scrollTop: $(anchor.attr('href')).offset().top - 50
                }, 1000);
            });
        })();

        //Window scroll top
        (() => {
            $('#scroll-top').on('click', function () {
                window.scrollTo({top: 0, behavior: 'smooth'});
            });
        })();
    });
})(jQuery);
