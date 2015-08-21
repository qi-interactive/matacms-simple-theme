window.mata = window.mata || {};
mata.simpleTheme = mata.simpleTheme || {};

var body = document.body,
dropArea = document.getElementById( 'drop-area' );
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

	mata.simpleTheme.addClickEventToRearrangeAndVersionsBtns();

	mata.simpleTheme.closeOverlay();

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



mata.simpleTheme.addHoverBehaviourToVersionTooltip = function() {
	$('.list-version-container').each(function(el) {
		addHoverEffectToVersionsTooltip($(this));
	})

	$('#mata-content').contents().find('.list-version-container').each(function(el) {
		addHoverEffectToVersionsTooltip($(this));
	})

};


function addHoverEffectToVersionsTooltip(el) {
	var popUpWidth = el.outerWidth();
	el.css('margin-right', -(popUpWidth - 23));

	el.on('mouseover', function() {
		$('#mata-content').contents().find('ol.revisions li .list-version-container').removeClass('is-hover');
		el.addClass('is-hover');

		el.on('mouseout', function() {
			el.removeClass('is-hover');

		})
	})
}


mata.simpleTheme.addClickEventToRearrangeAndVersionsBtns = function() {

	$('.rearrangeable-trigger-btn').on('click', function() {
		classie.add( body, 'drag-active' );

		var url = $(this).attr("data-url");

		$.ajax(url).done(function(data) {
			$('#drop-area .main-body').html(data);
			mata.simpleTheme.addHoverBehaviourToVersionTooltip();
			classie.add( dropArea, 'show' );


		});

	});

	$('#header-inner-versions').on('click', function() {

		var iframeBody = $('#mata-content').contents().find('body')[0],
		iframeDropArea = $('#mata-content').contents().find('#drop-area')[0];

		classie.add(iframeBody, 'drag-active');

		var url = $(this).attr("data-url");

		$.ajax(url).done(function(data) {
			$('#mata-content').contents().find('#drop-area .main-body').html(data);
			mata.simpleTheme.addHoverBehaviourToVersionTooltip();
			$('#mata-content').contents().find('ol.revisions li .list-version-container.live').trigger('mouseover');
			classie.add(iframeDropArea, 'show');

		});

	})
};

mata.simpleTheme.closeOverlay = function() {

	$('#drop-area .close-character').on('click', function() {
		classie.remove( body, 'drag-active' );
		classie.remove( dropArea, 'show' );
		$('#drop-area .main-body').empty();
	})
};


$(window).on("pjax:success", function() {

	mata.simpleTheme.onPjaxSuccess();

});


mata.simpleTheme._showParentBackdropHandler = function() {
	$(window).one("show.bs.modal", function(e) {
		mata.simpleTheme.showParentBackdrop(e, 'in');
	});


	// TO BE IMPLEMENTED AFTER IMPERAVI REDACTOR UPGRADE
	// $(document).on("click", ".redactor-toolbar li, .redactor-dropdown a", function(e) {
	//
	// 	setTimeout(function() {
	//
	// 		if ($("#redactor-modal-close").length > 0) {
	//
	// 			mata.simpleTheme.showParentBackdrop(e, 'in-redactor');
	//
	//
	// 			// for redactor modal-close clicked
	// 			$(document).one("click", "#redactor-modal-close", function(e) {
	// 				setTimeout(function() {
	// 					$('header.cd-header div.modal-backdrop', window.parent.document).removeClass("in in-redactor").addClass("out-redactor");
	// 				}, 20);
	// 			})
	//
	// 			$(document).one("click", "#redactor-modal", function(e2) {
	// 				console.log($(e2.target))
	// 				// if (!$(e2.target).hasClass('redactor-modal-close-btn'))
	// 				// {
	// 				// 	return;
	// 				// }
	// 				//
	// 				// setTimeout(function() {
	// 				// 	$('header.cd-header div.modal-backdrop', window.parent.document).removeClass("in in-redactor").addClass("out-redactor");
	// 				// }, 20);
	// 			})
	//
	// 			// for redactor ESC pressed
	// 			$(document).on('keyup.redactor-modal', function() {
	// 				setTimeout(function() {
	// 					$('header.cd-header div.modal-backdrop', window.parent.document).removeClass("in in-redactor").addClass("out-redactor");
	// 				}, 20);
	// 			})
	// 		}
	//
	// 	}, 0)
	//
	// })
}

mata.simpleTheme._showParentBackdropHandler();

$(window).on("hide.bs.modal", function(e) {
	$(e.target).one("bsTransitionEnd", function(e) {
		$('header.cd-header div.modal-backdrop', window.parent.document).removeClass("in in-redactor").addClass("out");
	});

	mata.simpleTheme._showParentBackdropHandler()

});

mata.simpleTheme.showParentBackdrop = function(e, cssInClass) {
	$('header.cd-header div.modal-backdrop', window.parent.document).removeClass('out out-redactor').addClass(cssInClass);
}

mata.simpleTheme.onPjaxSuccess = function() {
	mata.simpleTheme.addAClassToSelectizeAndFileUploaderAndUriParent();
	mata.simpleTheme.addAClassToMainActionButtonsParent();

	$(window).resize();
	mata.simpleTheme.addHoverBehaviourToVersionTooltip();
}


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
