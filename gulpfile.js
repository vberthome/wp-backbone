var gulp       = require('gulp');
var sass       = require('gulp-sass');
var livereload = require('gulp-livereload');

gulp.task('sass', function () {
    return gulp.src('assets/source/sass/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./'))
        .pipe(livereload());
});

gulp.task('sass:watch', function () {
    livereload.listen();
    gulp.watch('assets/source/sass/**/*.scss', ['sass']);
});

gulp.task('default', ['sass', 'sass:watch']);