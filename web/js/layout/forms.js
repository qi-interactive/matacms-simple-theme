window.mata.form = window.mata.form || {
	hasChanged: false
}


$(window).ready(function() {
	mata.form.trackFormChange();
	mata.form.setFormGroups();

	$('.back-btn', parent.document).on('click', function (e) {
		if (mata.form.checkFormChange() == false) {
            return false;
        }
	});

	$(window.parent.document).trigger('myCustomTrigger');
});

$(window.parent).on('popstate pushstate', function(e) {
	if (mata.form.checkFormChange() == false) {
        e.stopPropagation();
        e.preventDefault();
        return false;
    }
});

// $("#w0 a, #subnav-overlay a, .cd-3d-nav a", parent.document).on("click", function(e) {
// 	if (mata.form.checkFormChange() == false) {
// 		console.log(this, 'click', false)
// 		e.stopPropagation();
// 		e.preventDefault();
//         return false;
//     }
// });

$(".cd-3d-nav a", parent.document).on("click", function(e) {
	if (mata.form.checkFormChange() == false) {
		return false;
	}
});

// $(".cd-3d-nav a", parent.document).on("mouseover mouseout", function(e) {
// 	if (mata.form.hasChanged) {
// 		console.log(this, e, false)
// 		e.stopPropagation();
// 		e.preventDefault();
//         return false;
//     }
// });

mata.form.trackFormChange = function() {
	$('.container form input, .container form select, .container form textarea').on("change keyup paste", function() {
		mata.form.hasChanged = true;
	});

	$('.container form').on('submit', function() {
		setTimeout(function() {
			if(mata.form.hasChanged)
				mata.form.hasChanged = false;
		},100);
	});

}

mata.form.setFormGroups = function() {

	var formGroups = $('.container form div.form-group');

	formGroups.each(function(index) {
		if(!$(this).hasClass('submit-form-group') && !$(this).hasClass('full-width')) {

			if(formGroups.eq(index-3).hasClass('partial-max-width-item') && formGroups.eq(index-2).hasClass('partial-max-width-item') && formGroups.eq(index-1).hasClass('partial-max-width-item') && !formGroups.eq(index+1).hasClass('partial-max-width-item') && !formGroups.eq(index).hasClass('full-width-item')) {
				$(this).addClass('partial-max-width-item');
			}

			if(!formGroups.eq(index-2).hasClass('field-media') && formGroups.eq(index-1).hasClass('field-media') && formGroups.eq(index).hasClass('field-media')) {
				$(this).prev().addBack().wrapAll('<div class="form-row" />');
				return;
			}

			if(formGroups.eq(index).hasClass('field-media') && !formGroups.eq(index+1).hasClass('field-media')) {
				$(this).addBack().wrapAll('<div class="form-row" />');
				return;
			}

			if($(this).hasClass('partial-max-width-item') && $(this).prev().hasClass('partial-max-width-item')) {
				$(this).prev().addBack().wrapAll('<div class="form-row" />');
			}

			if(!formGroups.eq(index).parent().hasClass('form-row') && index === formGroups.length-2) {
				$(this).addBack().wrapAll('<div class="form-row" />');
			}

			// if(formGroups.eq(index-1).hasClass('field-media') && formGroups.eq(index).hasClass('field-media')) {
			// 	$(this).prev().addBack().wrapAll('<div class="form-row" />');
			// }

			// if($(this).hasClass('partial-max-width-item') && $(this).prev().hasClass('partial-max-width-item')) {
			// 	$(this).prev().addBack().wrapAll('<div class="form-row" />');
			// }

			// // if(formGroups.eq(index-2).hasClass('partial-max-width-item') && formGroups.eq(index-1).hasClass('partial-max-width-item') && !formGroups.eq(index+1).hasClass('partial-max-width-item')) {
			// // 	$(this).addClass('partial-max-width-item');
			// // }

			// if(index === formGroups.length-2) {
			// 	$(this).addBack().wrapAll('<div class="form-row" />');
			// }


			// if(formGroups.eq(index-2).hasClass('partial-max-width-item') && formGroups.eq(index-1).hasClass('partial-max-width-item') && (formGroups.length <= index+1 && !formGroups.eq(index+1).hasClass('partial-max-width-item'))) {
			// 	$(this).removeClass('partial-max-width-item');
			// }
			// if(formGroups.eq(index-3).hasClass('partial-max-width-item') && formGroups.eq(index-2).hasClass('partial-max-width-item') && formGroups.eq(index-1).hasClass('partial-max-width-item') && !formGroups.eq(index+1).hasClass('partial-max-width-item')) {
			// 	$(this).addClass('partial-max-width-item');
			// }
			// if(formGroups.eq(index-2).hasClass('partial-max-width-item') && formGroups.eq(index-1).hasClass('partial-max-width-item') && !formGroups.eq(index+1).hasClass('partial-max-width-item')) {
			// 	$(this).addClass('partial-max-width-item');
			// }
			// if(formGroups.eq(index-1).hasClass('field-media') && !formGroups.eq(index+1).hasClass('field-media')) {
			// 	$(this).prev().wrapAll('<div class="form-row" />');
			// }
			// if(formGroups.eq(index-1).hasClass('partial-max-width-item') && !formGroups.eq(index+1).hasClass('partial-max-width-item') && formGroups.eq(index).hasClass('field-media')) {
			// 	$(this).addClass('partial-max-width-item');
			// }
			// if($(this).hasClass('partial-max-width-item') && $(this).prev().hasClass('partial-max-width-item')) {
			// 	$(this).prev().addBack().wrapAll('<div class="form-row" />');
			// }
			// if(!formGroups.eq(index-1).hasClass('partial-max-width-item') && $(this).hasClass('partial-max-width-item') && index == formGroups.length-2) {
			// 	$(this).wrapAll('<div class="form-row" />');
			// }
			// set last form-group to full width
			// if(formGroups.eq(index-1).hasClass('partial-max-width-item') && formGroups.eq(index).hasClass('partial-max-width-item') && index === formGroups.length-2) {
			// 	return true;
			// }

			// if(formGroups.eq(index-3).hasClass('partial-max-width-item') && formGroups.eq(index-2).hasClass('partial-max-width-item') && formGroups.eq(index-1).hasClass('partial-max-width-item') && index === formGroups.length-2) {
			// 	$(this).removeClass('partial-max-width-item');
			// }
		}

	});
}

mata.form.checkFormChange = function() {
	if(mata.form.hasChanged) {
		var result = window.top.confirm("Are you sure you want to navigate away from the form?");
		if(result) {
			mata.form.hasChanged = false;
			return true;
		} else {
			return false;
		}
	} else {
		return true;
	}
}

$(window).load(function() {

    $(document).on('mouseenter', 'figure.effect-winston', function() {
        $(this).addClass('hover')
    }).on('mouseleave', 'figure.effect-winston', function() {
        $(this).removeClass('hover')
    });

});
