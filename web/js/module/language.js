window.mata = window.mata || {};
mata.simpleTheme = mata.simpleTheme || {};

$(window).ready(function() {
	toggleSaveBtn();
	toggleTickIcon();
})

toggleSaveBtn = function() {
	$('.module-language ').on("focus", ".item input", function() {
		var me = $(this);
		$('.module-language .details-view .item .info').removeClass('save-btn');
		me.parents('.info').addClass('save-btn');
	})
}


toggleTickIcon = function() {
	$('.module-language ').on("click", ".item .info button", function() {
		$('.module-language .details-view .item .info').removeClass('saved');
		$(this).parents('.info').removeClass('save-btn').addClass('saved');

		setTimeout(function() {
			if($('.module-language .details-view .item .info').hasClass('saved'))
				$('.module-language .details-view .item .info').removeClass('saved');
		}, 5000);
	})

}
