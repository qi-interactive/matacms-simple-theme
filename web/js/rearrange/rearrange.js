var body = document.body,
dropArea = document.getElementById( 'drop-area' );

$('.rearrangeable-trigger-btn').on('click', function() {
	classie.add( body, 'drag-active' );

	var url = $(this).attr("data-url");
	$.ajax(url).done(function(data) {
		$('#drop-area .main-body').html(data);
		classie.add( dropArea, 'show' );
	});

})

$('#drop-area .close-character').on('click', function() {
	classie.remove( body, 'drag-active' );
	classie.remove( dropArea, 'show' );
	$('#drop-area .main-body').empty();
})
