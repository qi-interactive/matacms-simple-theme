$(document).ready(function() {
	var iframeDocument = $('#mata-content').contents()[0];
  $(".revisions .date", iframeDocument).timeago();
});