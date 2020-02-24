const $ = jQuery.noConflict();
// import jQuery from "jquery";

'use strict'; // jshint ignore:line

const Messages = {
    $statusMessages : $('body').find('div[aria-label*="Status message"]'),
    $errorMessages : $('body').find('div[aria-label*="Error message"]'),
    $warningMessages : $('body').find('div[aria-label="Warning message"]'),

	init: () => {
        Messages.$statusMessages.on('click', (e) => {
            const targetMessage = $(e.currentTarget);
            targetMessage.addClass('hide');
        })

        Messages.$errorMessages.on('click', (e) => {
            const targetMessage = $(e.currentTarget);
            targetMessage.addClass('hide');
        })

        Messages.$warningMessages.on('click', (e) => {
            const targetMessage = $(e.currentTarget);
            targetMessage.addClass('hide');
        })
	}
};

export default Messages;