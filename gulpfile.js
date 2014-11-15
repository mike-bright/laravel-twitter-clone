var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    concat = require('gulp-concat'),
    clean = require('gulp-clean'),
    notify = require("gulp-notify");

gulp.task('style', function() {
    gulp.src('components/sass/*')
        .pipe(sass({ style: 'expanded' }))
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
        .pipe(gulp.dest('public/css/tmp'))
        .pipe(concat('style.css'))
        .pipe(gulp.dest('public/css'))
        .pipe(notify('Gulp compiled css'));
});

gulp.task('clean-style', function () {
    return gulp.src('public/css/tmp/**/*', {read: false})
        .pipe(clean());
});

gulp.task('watch', function() {
    gulp.watch('components/sass/**/*', ['style']);
});

