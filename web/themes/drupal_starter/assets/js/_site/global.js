const $ = jQuery.noConflict();
// import jQuery from "jquery";

'use strict'; // jshint ignore:line

const Global = {
	$domWindow: $(window),
	$domDoc: $(document),
	$domBody: $('body'),

	varsWindowWidth: window.innerWidth,

	functions: {
		escKey: (callback) => {
			Global.$domDoc.on('keyup', function (e) {
				if (e.keyCode === 27) {
					callback();
				}
			});
		},

		clickOutsideContainer: (selector, container, closeBtn, callback) => {
			selector.on('mouseup', (e) => {
				e.preventDefault();
				if (!container.is(e.target) && container.has(e.target).length === 0 && !closeBtn.is(e.target)) {
					callback();
				}
			});
		}
	}
};

export default Global;
