window.mata = window.mata || {};
mata.simpleTheme = mata.simpleTheme || {};

mata.simpleTheme.ajaxLoader = {
	_timeout: null
};

var ajaxLoader = mata.simpleTheme.ajaxLoader;

mata.simpleTheme.ajaxLoader.run = function() {
	$("#progress-bar").width("100%").removeClass("success");

	clearTimeout(ajaxLoader._timeout);

	ajaxLoader._timeout = setTimeout(function() {

		$("#progress-bar").css("opacity", 1)

		ajaxLoader._timeout = setTimeout(function() {
			$("#progress-bar").width("30%");

			ajaxLoader._timeout = setTimeout(function() {
				$("#progress-bar").width("40%");

				ajaxLoader._timeout = setTimeout(function() {
					$("#progress-bar").width("60%");

					ajaxLoader._timeout = setTimeout(function() {
						$("#progress-bar").width("85%");
						ajaxLoader.slowRequestProgress()
					}, 500);
				}, 200);
			}, 200);
		}, 100);
	}, 400);
};

mata.simpleTheme.ajaxLoader.slowRequestProgress = function() {
	$("#progress-bar").width($("#progress-bar").width() + 10);
	ajaxLoader._timeout = setTimeout(ajaxLoader.slowRequestProgress, Math.random() * 100);
}

mata.simpleTheme.ajaxLoader.stop = function() {

	clearTimeout(ajaxLoader._timeout);

	$("#progress-bar").width("100%")

	ajaxLoader._timeout = setTimeout(function() {
		$("#progress-bar").addClass("success")
		ajaxLoader._timeout = setTimeout(function() {
			$("#progress-bar").css("opacity", 0)
		}, 900)
	}, 150)

	
}

$(window).ready(function() {
	mata.simpleTheme.iframe.on(mata.simpleTheme.events.IFRAME_LOADED, mata.simpleTheme.ajaxLoader.stop);

})
