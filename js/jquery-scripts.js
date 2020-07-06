(function ($) {
    // Initialize each block on page load (front end).
    $(document).ready(function () {
        console.log("jquery-scripts ready");
        $('.fixed-scroll-top').on('click', function () {
            $("html, body").animate({
                scrollTop: 0
            }, "slow");
            return false;
        });

    });

    $(document).on('click', 'a[href^="#"]', function (event) {
        event.preventDefault();
        console.log("scrolled to anchor");
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top + -250
        }, 200);
    });

    $(document).on('scroll', function () {

    })
})(jQuery);