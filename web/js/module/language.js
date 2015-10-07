window.mata = window.mata || {};
mata.simpleTheme = mata.simpleTheme || {};

$(window).ready(function() {
	toggleSaveBtn();
	toggleTickIcon();


})


toggleSaveBtn = function() {
	$('.module-language .details-view .item .form-group input').each(function() {
		var me = $(this);
		me.focus(function() {
			$('.module-language .details-view .item .info').removeClass('save-btn');
			me.parents('.info').addClass('save-btn');
		});
	})
}


toggleTickIcon = function() {
	$('.module-language .details-view .item .info button').on("click", function() {
		$('.module-language .details-view .item .info').removeClass('saved');
		$(this).parents('.info').removeClass('save-btn').addClass('saved');

		setTimeout(function() {
			if($('.module-language .details-view .item .info').hasClass('saved'))
				$('.module-language .details-view .item .info').removeClass('saved');
		}, 5000);
	})

}



