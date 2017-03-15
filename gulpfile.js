var gulp = require('gulp');

var jshint = require('gulp-jshint');
var sourcemaps = require('gulp-sourcemaps');
var stylint = require('gulp-stylint');
var stylus = require('gulp-stylus');
var uglify = require('gulp-uglify');
var clean = require('gulp-clean');
var concat = require('gulp-concat');
var imagemin = require('gulp-imagemin');
var watch = require('gulp-watch');
var jeet = require('jeet');
var rupture = require('rupture');
var axis = require('axis');
var autoprefixer = require('autoprefixer-stylus');

gulp.task('clean', function() {
  return gulp.src('./_public/**/*', {
    read: false
  })
    .pipe(clean({
      force: true
    }));
});

gulp.task('stylus', function() {
  return gulp.src(['./src/css/*.styl', '!./src/css/_*.styl'])
    .pipe(stylint())
    .pipe(stylus({
      compress: true,
      use: [rupture(), jeet(), axis(), autoprefixer()]
    }))
    .pipe(concat('style.css'))
    .pipe(gulp.dest('./_public/'));
});

gulp.task('concat', function() {
  return gulp.src(['./_public/css/*.css'])
    .pipe(concat('styles.css'))
    .pipe(gulp.dest('./_public/'));
});

gulp.task('js', function() {
  return gulp.src('./src/js/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'))
    .pipe(uglify())
    .pipe(gulp.dest('./_public/js/'));
});

gulp.task('html', function() {
  return gulp.src(['./src/*.html', './src/*.php'])
    .pipe(gulp.dest('./_public'));
});

gulp.task('images', function() {
  return gulp.src(['./src/images/**/*'])
    .pipe(imagemin({
      progressive: true,
      svgoPlugins: [{
        removeViewBox: false
      }],
    }))
    .pipe(gulp.dest('./_public/images/'));
});

gulp.task('watch', ['default'], function() {
  gulp.watch(['./src/css/*.styl', '!./src/css/_*.styl'], ['stylus']);
  gulp.watch(['./_public/css/*.css'], ['css']);
  gulp.watch(['./src/js/*.js'], ['js']);
  gulp.watch(['./src/*.html', './src/*.php'], ['html']);
  gulp.watch(['./src/images/**/*'], ['images']);
});

gulp.task('default', ['stylus', 'js', 'html', 'images']);
