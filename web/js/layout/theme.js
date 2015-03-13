window.mata = window.mata || {};
mata.simpleTheme = mata.simpleTheme || {};

mata.simpleTheme.attachLoaderHandlers = function() {

	$(window).on('beforeunload', function(e) {
		parent.mata.simpleTheme.ajaxLoader.run();
	})

	$(document).ajaxSend(function() {
		parent.mata.simpleTheme.ajaxLoader.run();
		$( document ).one("ajaxStop", function() {
			parent.mata.simpleTheme.ajaxLoader.stop();
		});
	});
}

if (typeof parent.mata.simpleTheme !== "undefined")
	parent.mata.simpleTheme.navigator.updateURL(window.location.href);

mata.simpleTheme.attachLoaderHandlers();
