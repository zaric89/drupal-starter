const $ = jQuery.noConflict();
import Global from './global';

('use strict'); // jshint ignore:line
const FormValidate = {
	/*-------------------------------------------------------------------------------
		# Cache dom and strings
	-------------------------------------------------------------------------------*/
	// Use this class for every form you whant to validate
	classForm : '.js-validation',

	/*-------------------------------------------------------------------------------
		# Initialize
	-------------------------------------------------------------------------------*/
	init: () => {
		if ($(FormValidate.classForm).length > 0) {
			$.validate({
				form: FormValidate.classForm,
			});
		}
	}
};

export default FormValidate;
