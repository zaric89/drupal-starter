const $ = jQuery.noConflict();
import Global from './global';

('use strict'); // jshint ignore:line
const Sticky = {
	/*-------------------------------------------------------------------------------
		# Cache dom and strings
	-------------------------------------------------------------------------------*/
	$header: $('.js-header'),
	$content : $('.js-site-content'),
	classSticky: 'sticky-header',
	classStickyContent: 'sticky-content',

	/*-------------------------------------------------------------------------------
		# Initialize
	-------------------------------------------------------------------------------*/
	init: () => {

		$(window).on('scroll', () => {
			if ($(window).scrollTop() >= 30) {
				Sticky.$content.addClass(Sticky.classStickyContent);
				Sticky.$header.addClass(Sticky.classSticky);
			} else {
				Sticky.$content.removeClass(Sticky.classStickyContent);
				Sticky.$header.removeClass(Sticky.classSticky);
			}
		});
	}
};

export default Sticky;
