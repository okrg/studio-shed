// REQUIRED VARS
var browserSync = require('browser-sync');
var gulp = require('gulp');
var plumber = require('gulp-plumber');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var minify = require('gulp-minify');
var cssnano = require('gulp-cssnano');
var sass = require('gulp-sass');
var imagemin = require('gulp-imagemin');
var imageminGifsicle = require('imagemin-gifsicle');
var imageminJpegtran = require('imagemin-jpegtran');
var imageminOptipng = require('imagemin-optipng');
var imageminSvgo = require('imagemin-svgo');


// IMAGEMIN OPTIMIZATION
gulp.task('images', function() {
  gulp.src('src/img/**/*')
    .pipe(imagemin([
      imageminGifsicle({ interlaced: true }),
      imageminJpegtran({ progressive: true }),
      imageminOptipng({ optimizationLevel: 5 }),
      imageminSvgo({
        plugins: [
          { removeViewBox: true },
          { cleanupIDs: false }
        ]
      })
    ]))
    .pipe(gulp.dest('img'));
});

// SCSS
gulp.task('sass', function() {
  return gulp.src(['src/css/**/*.scss'])
    .pipe(plumber({
      errorHandler: function(error) {
        console.log(error.message);
        this.emit('end');
      }
    }))
    .pipe(sass())
    .pipe(cssnano())
    .pipe(concat('screen.css'))
    .pipe(gulp.dest('css'))
    .pipe(browserSync.stream());
});


// COMPILE JS
gulp.task('js', function() {
  return gulp.src([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/popper.js/dist/umd/popper.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'src/js/site.js'
    ])
    .pipe(plumber({
      errorHandler: function(error) {
        console.log(error.message);
        this.emit('end');
      }
    }))
    .pipe(concat('site.js'))
    //.pipe(uglify())
    .pipe(minify())
    .pipe(gulp.dest('js'))
    .pipe(browserSync.stream());
});


//COPY FONTAWESOME FILES TO DEPLOYED DIRECTORY
gulp.task('fontawesome', function() {
  gulp.src([
      'node_modules/@fortawesome/fontawesome-free/webfonts/*',
    ])
    .pipe(gulp.dest('webfonts'));
});

// Static Server + watching scss/js/html files
gulp.task('serve', gulp.series('sass', function() {

  browserSync.init({
    // SET THIS TO YOUR LOCAL URL
    proxy: 'http://studio-shed:8888/'
  });

  gulp.watch("src/css/**/*.scss", gulp.series('sass'));
  gulp.watch("src/js/**/*.js", gulp.series('js'));
  gulp.watch("includes/*.php").on('change', browserSync.reload);
  gulp.watch("*.html").on('change', browserSync.reload);
}));

gulp.task('default', gulp.parallel('js', 'sass', 'images', 'fontawesome', 'serve'));