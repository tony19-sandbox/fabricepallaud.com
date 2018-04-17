var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var concat = require('gulp-concat');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');
var autoprefixer  = require('gulp-autoprefixer');
var plumber = require('gulp-plumber');
var imagemin = require('gulp-imagemin');
const sourcemaps = require('gulp-sourcemaps');
var gutil = require('gulp-util');
var onError = function (err) {
  console.log('An error occurred:', gutil.colors.magenta(err.message));
  gutil.beep();
  this.emit('end');
};

gulp.task('sass', function() {
  return gulp.src('../assets/styles/**/*.scss')
  .pipe(plumber({ errorHandler: onError }))
  .pipe(sourcemaps.init())
  .pipe(sass())
  .pipe(sourcemaps.write())
  .pipe(autoprefixer())
  .pipe(gulp.dest('../dist/styles'))
  .pipe(browserSync.reload({stream: true}))
});

gulp.task('js', function() {
  return gulp.src(['../assets/scripts/*.js'])
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(concat('main.js'))
    .pipe(uglify())
    .pipe(gulp.dest('../dist/scripts'))
    .pipe(browserSync.reload({
      stream: true
    }))
});

gulp.task('images', function() {
  return gulp.src('../assets/images/**/*')
    .pipe(imagemin({optimizationLevel: 7, progressive: true}))
    .pipe(gulp.dest('../dist/images'));
});

gulp.task('browserSync', function() {
  browserSync.init({
    proxy: 'http://127.0.0.1/fabricepallaud/',
  })
})

gulp.task('watch', ['browserSync','js','sass'], function() {
  gulp.watch('../assets/styles/**/*.scss',['sass']);
  gulp.watch('../**/**/*.php', browserSync.reload);
  gulp.watch('../assets/scripts/*.js', ['js']);
  gulp.watch('../*.html', browserSync.reload);
});