	var body = document.body,
	dropArea = document.getElementById( 'drop-area' );

	$('.rearrangeable-trigger-btn').on('click', function() {
		classie.add( body, 'drag-active' );
		classie.add( dropArea, 'show' );

		// var url = $(this).attr("data-url");
		// $.ajax(url).done(function(data) {
		// 	$('#drop-area .main-body').html(data);
		// });
	$('#drop-area .main-body iframe').attr("src", $(this).attr("data-url"))

	})

	$('#drop-area .close-character').on('click', function() {
		classie.remove( body, 'drag-active' );
		classie.remove( dropArea, 'show' );
		$('#drop-area .main-body iframe').attr("src", "")

	})

