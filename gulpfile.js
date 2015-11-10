var del = require('del');
var gulp = require('gulp');
var usemin = require('gulp-usemin');
var uglify = require('gulp-uglify');
var minifyCss = require('gulp-minify-css');
var wiredep = require('wiredep').stream;
var install = require('gulp-install');

gulp.task('bower', function() {
    var stream = gulp.src('./bower.json')
        .pipe(install());

    return stream;
});

gulp.task('wiredep', function() {
    var stream = gulp.src(['./public_html/index.html', './public_html/login.html'])
        .pipe(wiredep({
            ignorePath: '../public_html/',
            overrides: {
                bootstrap: {
                    main: ['dist/css/bootstrap.css']
                }
            }
        }))
        .pipe(gulp.dest('./public_html'));

    return stream;
});

gulp.task('minify', ['bower'], function() {
    return gulp.src('./public_html/index.html')
        .pipe(usemin({
            path: './public_html/',
            css: [minifyCss(), 'concat'],
            theme: [minifyCss(), 'concat'],
            js: [uglify(), 'concat'],
            app: [uglify(), 'concat']
        }))
        .pipe(gulp.dest('dist'));
});

// Task para gerar os arquivos para distribuição
gulp.task('dist', ['clean', 'minify']);
gulp.task('clean', function() {
    return del('dist/**');
});

// Tasks para utilizar durante o desenvolvimento
gulp.task('install', ['bower', 'wiredep']);
gulp.task('dev', ['install']);
