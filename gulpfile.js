var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');

var sassOptions = {
  errLogToConsole: true,
  outputStyle: 'compressed'
};


gulp.task('styles', function() {
    gulp.src('scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass(sassOptions).on('error', sass.logError))
        .pipe(autoprefixer({
                browsers: ['last 2 versions'],
                cascade: false
            }))
        .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest('./css/'))
});

//Watch task
gulp.task('default',function() {
    gulp.watch('scss/**/*.scss',['styles']);
});
 