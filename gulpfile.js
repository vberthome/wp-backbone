var gulp       = require('gulp');
var sass       = require('gulp-sass');
var concat     = require('gulp-concat');
var rename     = require('gulp-rename');
var uglify     = require('gulp-uglify');
var svgSprite  = require('gulp-svg-sprite');
var sourcemaps = require('gulp-sourcemaps');
var livereload = require('gulp-livereload');

var paths = {
    sass: 'source/sass/**/*.scss',
    svg: 'source/svg/**/*.svg',
    scripts: {
        app: ['source/js/**/*.js', '!source/js/vendor/**/*.js'],
        vendor: 'source/js/vendor/**/*.js'
    }
}

gulp.task('sass', function () {
    return gulp.src('source/sass/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./'))
        .pipe(livereload());
});

gulp.task('js', function(){
    return gulp.src(paths.scripts.app)
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(concat('main.min.js'))
        .pipe(sourcemaps.write('sourcemaps'))
        .pipe(gulp.dest('assets/js'));
});

gulp.task('js:vendor', function(){
    return gulp.src(paths.scripts.vendor)
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('assets/js/vendor'));
});

gulp.task('svg', function(){
    return gulp.src(paths.svg)
        .pipe(svgSprite({
            mode: {
                symbol: { // symbol mode to build the SVG
                    render: {
                        css: false, // CSS output option for icon sizing
                        scss: false // SCSS output option for icon sizing
                    },
                    dest: 'sprite', // destination folder
                    prefix: '.svg--%s', // BEM-style prefix if styles rendered
                    sprite: 'sprite.svg', //generated sprite name
                    example: true // Build a sample page, please!
                }
            }
        })).on('error', sass.logError)
        .pipe(gulp.dest('assets'));
});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch(paths.sass, ['sass']);
    gulp.watch(paths.svg, ['svg']);
    gulp.watch(paths.scripts.app, ['js']);
    gulp.watch(paths.scripts.vendor, ['js:vendor']);
});

gulp.task('default', ['sass', 'js', 'js:vendor', 'svg', 'watch']);