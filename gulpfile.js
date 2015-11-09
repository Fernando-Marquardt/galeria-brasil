var gulp = require('gulp');
var usemin = require('gulp-usemin');
var uglify = require('gulp-uglify');
var minifyCss = require('gulp-minify-css');
var wiredep = require('wiredep').stream;

gulp.task('bower', function() {
    gulp.src('./templates/index.html')
        .pipe(wiredep({
            ignorePath: '../public_html/',
            overrides: {
                bootstrap: {
                    main: ['dist/css/bootstrap.css']
                }
            }
        }))
        .pipe(gulp.dest('./public_html'));
});

gulp.task('minify', function() {
    gulp.src('./public_html/index.html')
        .pipe(usemin({
            assetsDir: '.',
            css: [minifyCss(), 'concat'],
            js: [uglify(), 'concat']
        }))
        .pipe(gulp.dest('dist'));
});

gulp.task('default', ['bower']);

gulp.task('watch', ['minify'], function() {
    gulp.watch([
        'templates/*.html',
        'bower_components/*/dist/js/*.js',
        '!bower_components/*/dist/js/*.min.js',
        'bower_components/*/dist/css/*.css',
        '!bower_components/*/dist/css/*.min.css',
        'bower_components/*/dist/fonts/*',
        'bower_components/*/angular*.js',
        '!bower_components/*/angular*.min.js'
    ], ['minify']);
});
