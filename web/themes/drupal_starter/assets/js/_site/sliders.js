const $ = jQuery.noConflict();

'use strict'; // jshint ignore:line
const Sliders = {
	/*-------------------------------------------------------------------------------
		# Cache dom and strings
	-------------------------------------------------------------------------------*/
	$domSlider: $('.js-slider'),
	$domSliderBanner: $('.js-slider-banner'),

	/*-------------------------------------------------------------------------------
		# Initialize
	-------------------------------------------------------------------------------*/
	init: () => {
		// slider
		Sliders.$domSlider.slick({
			infinite: true,
			slidesToShow: 2,
			slidesToScroll: 1,
			speed: 1000,
			arrows: false,
			autoplay: false,
			dots: true,
			responsive: [
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 1
					}
				}
			]
		});

		// Banner Slider
		Sliders.$domSliderBanner.slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			speed: 1000,
			arrows: false,
			autoplay: true,
			dots: true,
			pauseOnHover: false,
			pauseOnFocus: false,
			fade: true,
			autoplaySpeed: 4000
		});
	}
};

export default Sliders;
