$(document).on("ready pjax:success", function() {
	
	// $.pjax.defaults.timeout = 10000;

	// $(window).on("ready pjax:success", function() {
	//     $("#item-search").focus();
	//     parent.mata.simpleTheme.ajaxLoader.stop()
	// })

	// $(window).on("pjax:start", function() {
	//     parent.mata.simpleTheme.ajaxLoader.run()
	// })
})

$('body').on("click", "a.delete-btn", function() {
    return confirm("Are you sure you want to delete " +  $(this).parents(".list-container").find(".item-label").first().html() + "?")
});