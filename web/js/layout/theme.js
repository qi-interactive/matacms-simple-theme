window.mata = window.mata || {};
mata.simpleTheme = mata.simpleTheme || {};

// mata.simpleTheme.attachLoaderHandlers = function() {

// 	$(window).on('beforeunload', function(e) {
// 		parent.mata.simpleTheme.ajaxLoader.run();
// 	})

// 	$(document).ajaxSend(function() {
// 		parent.mata.simpleTheme.ajaxLoader.run();
// 		$( document ).one("ajaxStop", function() {
// 			parent.mata.simpleTheme.ajaxLoader.stop();
// 		});
// 	});
// }

// if (typeof parent.mata.simpleTheme !== "undefined")
// 	parent.mata.simpleTheme.navigator.updateURL(window.location.href);

// mata.simpleTheme.attachLoaderHandlers();



$(window).ready(function() {
	mata.simpleTheme.addAClassToSelectizeAndFileUploaderAndUriParent();
	mata.simpleTheme.addAClassToMainActionButtonsParent();
})


mata.simpleTheme.addAClassToSelectizeAndFileUploaderAndUriParent = function() {
	$('select, .file-uploader, #generate-uri').each(function(el) {
		$(this).parents('.form-group').addClass('half-max-width-item');
	})
}


mata.simpleTheme.addAClassToMainActionButtonsParent = function() {
	$('button[type=submit], input[type=submit]').each(function(el) {
		$(this).parents('.form-group').addClass('submit-form-group');
	})
}