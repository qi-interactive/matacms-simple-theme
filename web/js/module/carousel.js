window.mata = window.mata || {};
mata.simpleTheme = mata.simpleTheme || {};

$(window).ready(function() {
	$(window).resize();
	
	mata.simpleTheme.adjustCarouselContainerDimension();
})


mata.simpleTheme.adjustCarouselContainerDimension = function() {
	$('.module-carousel .carousel-view').each(function() {
		var me = $(this);
		if ((me.find('#add-media-container').length == 1) && $(window).width() > 480) 
			me.find('#add-media-container').width(400);
	});
};

