window.mata.form = window.mata.form || {
	hasChanged: false
}


$(window).ready(function() {
	
	mata.form.trackFormChange();
	mata.form.setFormGroups();

	$('#back-to-list-view').on('click', function () {
		if(mata.form.hasChanged) {
			return window.top.confirm("Are you sure you want to navigate away from the form?");
		} else {
			return true;
		}
	});
})

mata.form.trackFormChange = function() {
	$('.container form input, .container form select, .container form textarea').on("change keyup paste", function() {
		mata.form.hasChanged = true;
	});
}

mata.form.setFormGroups = function() {

	var formGroups = $('.container form div.form-group');

	formGroups.each(function(index) {
		if($(this).hasClass('partial-max-width-item')) {
			if(formGroups.eq(index-2).hasClass('partial-max-width-item') && formGroups.eq(index-1).hasClass('partial-max-width-item') && !formGroups.eq(index+1).hasClass('partial-max-width-item')) {
				$(this).removeClass('partial-max-width-item');
			}
			if(formGroups.eq(index-3).hasClass('partial-max-width-item') && formGroups.eq(index-2).hasClass('partial-max-width-item') && formGroups.eq(index-1).hasClass('partial-max-width-item') && !formGroups.eq(index+1).hasClass('partial-max-width-item')) {
				$(this).addClass('partial-max-width-item');
			}
			if($(this).hasClass('partial-max-width-item') && $(this).next().hasClass('partial-max-width-item')) {
				$(this).next().addBack().wrapAll('<div class="form-row" />');
			}
			// set last form-group to full width
			// if(index === formGroups.length-2) {
			// 	$(this).removeClass('partial-max-width-item');
			// }
		}

	});
}