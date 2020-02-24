const $ = jQuery.noConflict();
import Global from './global';

'use strict';// jshint ignore:line
const Menu = {
	/*-------------------------------------------------------------------------------
		# Cache dom and strings
	-------------------------------------------------------------------------------*/
	$domMenuBtn: $('.js-menu-btn'),
	$domMenuNav: $('.js-main-nav'),
	$domMenuHasSub: $('.js-main-nav .menu-item--expanded'),
	classOpen: 'open',
	classOpenMenu: 'menu-open',
	classSubMenu: '.menu-item--expanded > .menu',
	classSubIcon: '.sub-icon',
	classMenu: '.menu',
	classList: 'li',

	/*-------------------------------------------------------------------------------
		# Initialize
	-------------------------------------------------------------------------------*/
	init: () => {
		// functions
		const closeNav = () => {
			Menu.$domMenuBtn.removeClass(Menu.classOpen);
			Menu.$domMenuNav
				.removeClass(Menu.classOpen)
				.find(Menu.classSubMenu)
				.slideUp();
			Menu.$domMenuNav
				.find(Menu.classSubIcon)
				.removeClass(Menu.classOpen);
			Global.$domBody.removeClass(Menu.classOpenMenu);
		};

		if (Global.varsWindowWidth < 992) {
			Menu.$domMenuHasSub.each((i, el) => {
				$(el).append(
					'<span class="sub-icon font-plus-circle" data-open-sub></span>'
				);
			});
		}

		// bind events
		Menu.$domMenuBtn.on('click', e => {
			e.preventDefault();
			Menu.$domMenuBtn.toggleClass(Menu.classOpen);
			Menu.$domMenuNav
				.toggleClass(Menu.classOpen)
				.find(Menu.classSubMenu)
				.slideUp();
			Menu.$domMenuNav.find(Menu.classSubIcon).removeClass('open');
			Global.$domBody.toggleClass(Menu.classOpenMenu);
		});

		Menu.$domMenuNav.on('click', '[data-open-sub]', e => {
			const self = $(e.currentTarget);

			if (self.hasClass(Menu.classOpen)) {
				self.removeClass(Menu.classOpen)
					.siblings(Menu.classSubMenu)
					.slideUp();
				self.siblings()
					.find(Menu.classSubIcon)
					.removeClass(Menu.classOpen);
				self.siblings()
					.find(Menu.classMenu)
					.slideUp();
			} else {
				self.addClass(Menu.classOpen)
					.siblings(Menu.classSubMenu)
					.slideDown();
				self.parent()
					.siblings(Menu.classList)
					.find(Menu.classSubIcon)
					.removeClass(Menu.classOpen);
				self.parent()
					.siblings(Menu.classList)
					.find(Menu.classMenu)
					.slideUp();
			}
		});

		Global.functions.clickOutsideContainer(
			Menu.$domMenuNav,
			Menu.$domMenuNav.find('ul'),
			Menu.$domMenuBtn,
			closeNav
		);

		Global.functions.escKey(closeNav);
	}
};

export default Menu;
