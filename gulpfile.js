var gulp = require('gulp'),
watch = require('gulp-watch'),
livereload = require('gulp-livereload'),
less = require('gulp-less'),
path = require('path'),
rename = require("gulp-rename"),
plumber = require('gulp-plumber'),
gutil = require('gulp-util'),
lessPluginCleanCSS = require('less-plugin-clean-css');

var cleanCSS = new lessPluginCleanCSS({ 
	advanced: true,
	keepSpecialComments : 0,
	keepBreaks: true
})

var options = {
	dontFail: true
} 

gulp.task('less', function() {

	gulp.src(['widgets/**/assets/less/*.less'])
	.pipe(plumber(handleError))
	.pipe(less({
		plugins: [cleanCSS]
	}))
	.pipe(rename(function(filepath) {
		filepath.dirname = "widgets/" + path.dirname(path.dirname(filepath.dirname));
	}))
	.pipe(gulp.dest("./web/css"))
	.pipe(livereload());

	gulp.src(['assets/less/**/*.less', '!assets/less/inuit.css/**/*', '!assets/less/vars.less'])
	.pipe(plumber(handleError))
	.pipe(less({
		paths: [ path.join(__dirname, 'less', 'less/inuit.css', 'less/vars.less') ],
		plugins: [cleanCSS]
	}))
	.pipe(gulp.dest("./web/css"))
	.pipe(livereload());
})

gulp.task('watch', function() {

	livereload.listen();

	watch(['assets/less/**/*.less', '!assets/less/inuit.css/*.less'], {
		name: "Watcher",
		verbose: true
	}, function() {
		gulp.start('less');
	})
});

function handleError(err) {
	var displayErr = gutil.colors.red(err);
	gutil.log(displayErr);
	gutil.beep();
	if (options.dontFail) {
		return true;
	} else {
		throw displayErr;
	}
}

gulp.task('default', ['less', 'watch']);