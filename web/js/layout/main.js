window.mata = window.mata || {};
mata.simpleTheme = mata.simpleTheme || {};
mata.simpleTheme.iframe = $("#mata-content");

mata.simpleTheme.events = {
	IFRAME_LOADED: "st-IFRAME_LOADED"
}

$(window).resize(function() {
	$("#container").height($(this).height() - $(".cd-header").height());
}).resize();


jQuery(document).ready(function($){
	//toggle 3d navigation
	$('.cd-3d-nav-trigger').on('click', function(){
		toggle3dBlock(!$('.cd-header').hasClass('nav-is-visible'));
		return false;
	});

	//select a new item from the 3d navigation


	$('.cd-3d-nav a').on('click', function(e) {

		if ($(this).attr("data-subnav") != null) {
			showSubnav($(this).attr("data-subnav"))
			e.stopPropagation();
			return false;
		} else {
			$('#progress-bar').css('background', $('.cd-marker').css('color'));
			mata.simpleTheme.iframe.one(mata.simpleTheme.events.IFRAME_LOADED, function() {
				$('.cd-3d-nav-trigger').trigger("click");
			});
		}

		var activeItem = $(this);
		activeItem.parent('li').addClass('cd-active').siblings('li').removeClass('cd-active');

	})


	$('.cd-3d-nav a').on('mouseover', function(e) {
		var selected = $(this);
		selected.parent('li').addClass('cd-selected').siblings('li').removeClass('cd-selected');
		updateSelectedNav();

		$(this).on('mouseout', function() {
			$('li.cd-active').addClass('cd-selected').siblings('li').removeClass('cd-selected');
			updateSelectedNav();
		});
	});


	$(window).on('resize', function(){
		window.requestAnimationFrame(updateSelectedNav);
		resizeSubnav();
	});

	$(window).on('resize', function(){
		resizeSubnav();
	}).resize();

	function toggle3dBlock(addOrRemove) {
		if(typeof(addOrRemove)==='undefined') addOrRemove = true;	
		$('.cd-header').toggleClass('nav-is-visible', addOrRemove);
		$('main').toggleClass('nav-is-visible', addOrRemove);
		$('.cd-3d-nav-container').toggleClass('nav-is-visible', addOrRemove);

		if (addOrRemove == false)
			hideSubnav();

	}

	function showSubnav(subnavId) {
		var overlay = $("#subnav-overlay");
		
		overlay.find("> div").hide();
		overlay.css({
			height: $(window).height() - $("nav").height(),
			top: $("nav").height(),
			overflow: 'auto',
			backgroundColor: $('.cd-header').css("color")
		}).fadeIn();

		$("#subnav-" + subnavId).fadeIn();

		$("#subnav-overlay a").one("click", function() {
			toggle3dBlock(false)
		})
	}

	function hideSubnav() {
		$("#subnav-overlay").fadeOut().find("> div").fadeOut();
	}

	function resizeSubnav() {
		var overlay = $("#subnav-overlay");
		var overlayHeight = overlay.height();
		var subnavItem = $("#subnav-overlay .subnav-item:visible");


		if(subnavItem !== null && subnavItem !== undefined) {
			var subnavItemHeight = $("#subnav-overlay .subnav-item:visible").outerHeight(true);

			if(subnavItemHeight >= overlayHeight) {
				overlay.css({
					height: $(window).height() - $("nav").height(),
					top: $("nav").height(),
					overflow: 'auto'
				});
			} else {
				overlay.css({
					height: $(window).height() - $("nav").height(),
					top: $("nav").height(),
					overflow: 'auto'
				});
			}
		}
		
	}

	mata.addActiveStateToMenuItemsOnLoad = function(controllerIdParam) {
		$('a[data-module-name]', window.top.document).each(function(index, value) { 
			if ($(this).attr("data-module-name") == controllerIdParam) {
				$(this).parent('li').addClass("cd-active").siblings('li').removeClass('cd-active');
			}

			// $('.cd-marker').css('left',  $('.cd-active').offset().left);
		});

	};


	//this function update the .cd-marker position
	function updateSelectedNav(type) {
		var selectedItem = $('.cd-selected'),
		selectedItemPosition = selectedItem.index() + 1, 
		leftPosition = selectedItem.offset().left,
		backgroundColor = selectedItem.data('color');

		$('.cd-marker').removeClassPrefix('color').addClass('color-'+ selectedItemPosition).css({
			'left': leftPosition,
		});

		if( type == 'close') {
			$('.cd-marker').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				toggle3dBlock(false);
			});
		}
	}

	$.fn.removeClassPrefix = function(prefix) {
		this.each(function(i, el) {
			var classes = el.className.split(" ").filter(function(c) {
				return c.lastIndexOf(prefix, 0) !== 0;
			});
			el.className = $.trim(classes.join(" "));
		});
		return this;
	};
});

$(window).ready(function() {
	$('li.cd-active a').trigger('click');
})

