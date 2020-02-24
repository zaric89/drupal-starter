import Menu from './_site/menu';
import Sliders from './_site/sliders';
import Sticky from './_site/stickyHeader';
import FormValidate from './_site/jsFormValidate';
import Messages from './_site/messages';
import Select2 from './_site/select2';

jQuery( () => {
	// Site Menu
	Menu.init();

	// Slick Slider
	Sliders.init();

	// Sticky header
	Sticky.init();

	// Frontend form validation
	FormValidate.init();

	//Messages
	Messages.init();

	// Select 2
	Select2.init();
});
