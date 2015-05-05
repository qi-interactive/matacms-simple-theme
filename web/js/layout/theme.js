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
	mata.simpleTheme.addSelectedAscendingDescendingClassesToSortBy();
	$(window).on('resize', function() { 
		var btnsContainerWidth = $('.content-block-top-bar .btns-container').outerWidth(true);
		var contentsBlockTopBarWidth = $('.content-block-top-bar').outerWidth(true);
		var searchContainerWidth = $('.content-block-top-bar .search-container').width(((contentsBlockTopBarWidth - btnsContainerWidth) - 1) + 'px');
		

		if($('.content-block-top-bar .search-container').width() <= 260) {
			$('.content-block-top-bar .search-container').css({
				width:  '100%',
				'margin-top': '20px'
			});
		} else {
			searchContainerWidth;
			$('.content-block-top-bar .search-container').css('margin-top', '0px');
		}
		

	}).resize();

	mata.simpleTheme.addHoverBehaviourToVersionTooltip();
})


$(window).on("pjax:success", function() {

	mata.simpleTheme.onPjaxSuccess();
	
});

mata.simpleTheme.onPjaxSuccess = function() {
	mata.simpleTheme.addAClassToSelectizeAndFileUploaderAndUriParent();
	mata.simpleTheme.addAClassToMainActionButtonsParent();
	
	$(window).resize();
	mata.simpleTheme.addHoverBehaviourToVersionTooltip();
}

mata.simpleTheme.addHoverBehaviourToVersionTooltip = function() {
	$('.list-container .list-version-container').each(function(el) {
		var popUpWidth = $(this).outerWidth();
		$(this).css('margin-right', -(popUpWidth - 25));

		$(this).on('mouseover', function() {
			$(this).addClass('is-hover');

			$(this).on('mouseout', function() {
				$(this).removeClass('is-hover');

			})
		})

	})


};


mata.simpleTheme.addSelectedAscendingDescendingClassesToSortBy = function() {

	$('.top-bar-sort-by-container ul li').not('.sort-by-label').on('click', function() {
		$(this).addClass('selected-asc').siblings('li').removeClass('selected-asc');

	})

}


mata.simpleTheme.addAClassToSelectizeAndFileUploaderAndUriParent = function() {
	$('select, .file-uploader, #generate-uri').each(function(el) {
		$(this).parents('.form-group:not(.full-width)').addClass('partial-max-width-item');
	})
}

mata.simpleTheme.addAClassToMainActionButtonsParent = function() {
	$('button[type=submit], input[type=submit]').each(function(el) {
		$(this).parents('.form-group').addClass('submit-form-group');
	})
}
