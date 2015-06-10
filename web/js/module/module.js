/**
 * Included in each module view
 */

 window.mata = window.mata || {};
 mata.simpleTheme = mata.simpleTheme || {};

 mata.simpleTheme.setHeader = function() {

 	var el = $("h1").first();

 	if (el && parent.mata.simpleTheme.header != undefined) {
 		parent.mata.simpleTheme.header.setText(el.html()).show();
 		el.hide();
 	}
 	
 }

 window.onbeforeunload = function() {
 	parent.mata.simpleTheme.header.hide();
 }