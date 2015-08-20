window.mata = window.mata || {};
mata.simpleTheme = mata.simpleTheme || {};

$(window).ready(function() {
	$(window).resize();
	fitLayout();
})


fitLayout = function() {

	$(".left-container").attr("style", null)
	$(".right-container").attr("style", null)

	var minWidth = $(".left-container span").outerWidth(true);
	var containerWidth = $(".event-label").width();
	var gutter = 20;

	if ($(".left-container").outerWidth(true) < minWidth)
		$(".left-container").width(minWidth);

	$(".right-container").width(containerWidth - $(".left-container").outerWidth(true) - gutter - 1).css("margin-left", gutter);
}

$(window).resize(function() {
	fitLayout();
}).trigger('resize');

