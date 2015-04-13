$(window).ready(function() {
	$("a.delete-btn").on("click", function() {
	    return confirm("Are you sure you want to delete " +  $(this).parents(".list-container").find(".item-label").first().html() + "?")
	})	
})

