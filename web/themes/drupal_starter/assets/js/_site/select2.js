const $ = jQuery.noConflict();

'use strict'; // jshint ignore:line
const Select2 = {
	/*-------------------------------------------------------------------------------
		# Cache dom and strings
	-------------------------------------------------------------------------------*/
	$domSelect: $('select'),

	/*-------------------------------------------------------------------------------
	# Initialize
	-------------------------------------------------------------------------------*/
	init: () => {
		// drupal fix for multilingual
		const selectPlaceholder = Drupal.t("Select an option");

		Select2.$domSelect.select2({
			placeholder: `${selectPlaceholder}`,
		});
	}
};

export default Select2;
