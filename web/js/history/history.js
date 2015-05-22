window.mata = window.mata || {};
mata.history = mata.history || {};


mata.history.init = function() {
	var iframeDocument = $('#mata-content').contents()[0];
  	$(".revisions .date", iframeDocument).timeago();
}
