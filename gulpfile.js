'use strict';

const gulp = require('gulp'),
  sass = require('gulp-sass'),
  browserSync = require('browser-sync').create(),
  autoprefixer = require('gulp-autoprefixer'),
  rename = require('gulp-rename'),
  svgmin = require('gulp-svgmin'),
  svgstore = require('gulp-svgstore'),
  del = require('del'),
  cheerio = require('gulp-cheerio'),
  ghPages = require('gulp-gh-pages'),
  webp = require('gulp-webp'),
  imagemin = require('gulp-imagemin'),
  cssnano = require('gulp-cssnano'),
  concat = require('gulp-concat'),
  uglify = require('gulp-uglify'),
  babel = require('gulp-babel');

// Development Tasks
// -----------------

// Start browserSync server
gulp.task('browserSync', function() {
  browserSync.init({
    server: {
      baseDir: '.'
    },
    notify: false
  });

  gulp.watch('./scss/**/**/*.scss', gulp.parallel('sass'));
  gulp.watch('./*.html').on('ch.e', browserSync.reload);
  gulp.watch(['./js/**/*.js', '!./js/**/bundle.min.js'], gulp.parallel('scripts'));
});

gulp.task('sass', function() {
  return gulp
    .src('./scss/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(
      autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
      })
    )
    .pipe(gulp.dest('./css'))
    .pipe(cssnano())
    .pipe(rename('style.min.css'))
    .pipe(gulp.dest('./css'))
    .pipe(browserSync.stream());
});

gulp.task('scripts', function() {
  return gulp
    .src(['./js/**/*.js', '!./js/**/bundle.min.js', '!./js/vendor/jquery-3.3.1.min.js', '!./js/customizer.js'])
    .pipe(concat('bundle.min.js'))
    .pipe(babel({ presets: ['@babel/env'] }))
    .pipe(uglify())
    .pipe(gulp.dest('./js/'))
    .pipe(browserSync.stream());
});

// Watchers
gulp.task('watch', gulp.series('sass', 'browserSync'));

// Optimization Tasks
gulp.task('webp', () =>
  gulp
    .src('./img/hero_*.{jpg,png}')
    .pipe(webp())
    .pipe(gulp.dest('./img/'))
);

gulp.task('imagemin', () =>
  gulp
    .src('./img/*.jpg')
    .pipe(imagemin())
    .pipe(gulp.dest('./img/'))
);

// Sprites
gulp.task('sprite', function() {
  return gulp
    .src('./img/icon-*.svg')
    .pipe(svgmin())
    .pipe(svgstore({ inlineSvg: true }))
    .pipe(
      cheerio({
        run: function($) {
          $('[fill]').removeAttr('fill');
          $('svg').attr('style', 'display:none');
        },
        parserOptions: { xmlMode: true }
      })
    )
    .pipe(rename('sprite.svg'))
    .pipe(gulp.dest('./img/'));
});

// Copying project to dist
gulp.task('copy', function() {
  return gulp
    .src(['src/fonts/**/*', 'src/img/**', 'src/video/**', 'src/js/**/*', 'src/css/**', 'src/*.html'], {
      base: 'src/'
    })
    .pipe(gulp.dest('dist'));
});

gulp.task('clean:dist', function() {
  return del('dist/**/*');
});

// Build Sequences

gulp.task(
  'build',
  gulp.series('clean:dist', 'sass', 'copy', function(done) {
    done();
  })
);

// Deploy

gulp.task('deploy', function() {
  return gulp.src('./dist/**/*').pipe(ghPages());
});
