// Portfolio
    $(window).on('load', function () {
        var $container = $('.portfolioContainer');
        var _filter = ".mtop";

        try {
            $container.isotope({
                filter: _filter,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            $(".portfolioContainer").css("visibility", "visible");
            
        } catch (error) {
            
        }


        $('.portfolioFilter a').on("click", function () {
            $('.portfolioFilter .active').removeClass('active');
            $(this).addClass('active');

            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            return false;
        });

            

    });