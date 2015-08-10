window.mata = window.mata || {};
mata.simpleTheme = mata.simpleTheme || {};
mata.simpleTheme.navigator = mata.simpleTheme.navigator || {};

var navigatorNamespace = mata.simpleTheme.navigator;

mata.simpleTheme.navigator.handleLink = function() {
	if($(this).hasClass('hard-link'))
		return true;

	navigatorNamespace.navigate($(this).attr("href"));
	return false;
}

$(window).ready(function() {
	$("#w0 a, #subnav-overlay a").on("click", mata.simpleTheme.navigator.handleLink);

	mata.simpleTheme.iframe.on("load", function() {
		mata.simpleTheme.iframe.trigger(mata.simpleTheme.events.IFRAME_LOADED);
	});

	/**
	 * Check if there is a deep link into iFrame. Cause by inIframe (module layout file)
	 */
	 if (window.location.hash.length > 0)
	 	mata.simpleTheme.navigator.navigate(window.location.hash.replace("#", ""))

})

mata.simpleTheme.navigator.navigate = function(href) {

	mata.simpleTheme.navigator.updateURL(href)
	mata.simpleTheme.ajaxLoader.run();

	mata.simpleTheme.iframe.attr("src", href);
}

mata.simpleTheme.navigator.updateURL = function(href) {
	window.history.pushState(null, "", href);
}


// enabling the below breaks the UI in Chrome only, not sure why
$(window).on('popstate', function(e) {
	// mata.simpleTheme.navigator.navigate(window.location.href)
	// mata.simpleTheme.iframe.attr("src", window.location.href)
})
