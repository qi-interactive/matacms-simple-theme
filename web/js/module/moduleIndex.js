$(window).ready(function() {
	$("a.delete-btn").on("click", function() {
		if($(this).attr('data-delete-allowed') == "false" && $(this).attr('data-delete-alert')) {
			alert($(this).attr('data-delete-alert'));
			return false;
		} else {
			return confirm("Are you sure you want to delete " +  $(this).parents(".list-container").find(".item-label").first().html() + "?")
		}
	})	
})

