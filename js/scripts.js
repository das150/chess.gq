(function($) {
    "use strict"; 
	
	/* Preloader */
	$(window).on('load', function() {
		var preloaderFadeOutTime = 500;
		function hidePreloader() {
			var preloader = $('.spinner-wrapper');
			setTimeout(function() {
				preloader.fadeOut(preloaderFadeOutTime);
			}, 500);
		}
		hidePreloader();
	});

	
	/* Navbar */
	// jQuery to collapse the navbar on scroll
    $(window).on('scroll load', function() {
		if ($(".navbar").offset().top > 55) {
			$(".dropdown-menu").addClass("dropwhite");
		} else {
			$(".dropdown-menu").removeClass("dropwhite");
		}
    });

	/* Navbar */
	// jQuery to collapse the navbar on scroll
    $(window).on('scroll load', function() {
		if ($(".navbar").offset().top > 55) {
			$(".fixed-top").addClass("top-nav-collapse");
		} else {
			$(".fixed-top").removeClass("top-nav-collapse");
		}
    });

    /* Counter */
	var a = 0;
	$(window).scroll(function() {
		if ($('#counter').length) { // checking if exists
			var oTop = $('#counter').offset().top - window.innerHeight;
			if (a == 0 && $(window).scrollTop() > oTop) {
			$('.counter-value').each(function() {
				var $this = $(this),
				countTo = $this.attr('data-count');
				$({
				countNum: $this.text()
				}).animate({
					countNum: countTo
				},
				{
					duration: 2000,
					easing: 'swing',
					step: function() {
					$this.text(Math.floor(this.countNum));
					},
					complete: function() {
					$this.text(this.countNum);
					}
				});
			});
			a = 1;
			}
		}
    });

})(jQuery);
