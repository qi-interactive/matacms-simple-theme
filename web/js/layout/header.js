window.mata = window.mata || {};
mata.simpleTheme = mata.simpleTheme || {};
mata.simpleTheme.header = {};

$(window).ready(function() {

	$("#header-inner-container .back-btn").on("click", mata.simpleTheme.navigator.handleLink);

})

mata.simpleTheme.header.setText = function(header) {
	$("#header-inner-container-header").html(header);
	return mata.simpleTheme.header;
}

mata.simpleTheme.header.clearText = function() {
	$("#header-inner-container-header").html("");
	return mata.simpleTheme.header;
}

mata.simpleTheme.header.setBackToListViewURL = function(url) {
	$("#header-inner-container .back-btn").attr("href", url);
	return mata.simpleTheme.header;
}

mata.simpleTheme.header.setVersionsURL = function(url) {
	$("#header-inner-versions").attr("data-url", url);
	return mata.simpleTheme.header;
}

mata.simpleTheme.header.hideBackToListView = function() {
	$("#header-inner-container .back-btn").hide();
	return mata.simpleTheme.header;
}

mata.simpleTheme.header.showBackToListView = function() {
	$("#header-inner-container .back-btn").show();
	return mata.simpleTheme.header;
}

mata.simpleTheme.header.hideVersions = function() {
	$("#header-inner-versions").css("opacity", 0);
	return mata.simpleTheme.header;
}

mata.simpleTheme.header.showVersions = function() {
	$("#header-inner-versions").css("opacity", 1);
	return mata.simpleTheme.header;
}

mata.simpleTheme.header.show = function() {
	$("#header-inner-container").off("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend").css("opacity", 1);
	return mata.simpleTheme.header;
}

mata.simpleTheme.header.hide = function() {
	$("#header-inner-container").css("opacity", 0).one("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend", mata.simpleTheme.header.clearText)

	return mata.simpleTheme.header;
}