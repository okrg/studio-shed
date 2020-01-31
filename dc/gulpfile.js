// REQUIRED VARS
var gulp = require('gulp');
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var imageminGifsicle = require('imagemin-gifsicle');
var imageminJpegtran = require('imagemin-jpegtran');
var imageminOptipng = require('imagemin-optipng');
var imageminSvgo = require('imagemin-svgo');
var cache = require('gulp-cache');
var cleanCSS  = require('gulp-clean-css');
var streamqueue = require('streamqueue');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');

// BROWSER SYNC w/ MAMP
gulp.task('browser-sync', function () {
    browserSync.init({
        // SET THIS TO YOUR LOCAL URL
        //proxy: 'http://localhost/'
        proxy: 'http://studioshed2020:8888/'
    });
});


gulp.task('bs-reload', function () {
    browserSync.reload();
});

// IMAGEMIN OPTIMIZATION
gulp.task('images', function () {
    gulp.src('src/img/**/*')
        .pipe(imagemin([
            imageminGifsicle({interlaced: true}),
            imageminJpegtran({progressive: true}),
            imageminOptipng({optimizationLevel: 5}),
            imageminSvgo({
                plugins: [
                    {removeViewBox: true},
                    {cleanupIDs: false}
                ]
            })
        ]))
        .pipe(gulp.dest('img'));
});

// SCSS
gulp.task('styles', function () {
    return streamqueue({ objectMode: true},
        gulp.src(['src/css/**/*.scss'])
        .pipe(plumber({
            errorHandler: function (error) {
                console.log(error.message);
                this.emit('end');
            }
        }))
        .pipe(sass())
        .pipe(autoprefixer('last 2 versions'))
        .pipe(concat('screen.scss')),
        gulp.src([
            //'node_modules/flickity/dist/flickity.min.css',
            //'node_modules/stuff/file.css'
        ])
        .pipe(concat('plugins.css')))
    .pipe(concat('screen.css'))
    .pipe(gulp.dest('css'))
    .pipe(rename({suffix: '.min'}))
    .pipe(cleanCSS({
        level: {
            1: {
                specialComments: 0
            }
        }
    }))
    .pipe(gulp.dest('css'))
    .pipe(browserSync.stream());
});

// COMPILE JS
gulp.task('scripts', function () {
    //return gulp.src('src/js/**/*.js')
    return gulp.src([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/jquery-migrate/dist/jquery-migrate.min.js',
        'node_modules/popper.js/dist/umd/popper.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/owl.carousel/dist/owl.carousel.js',
        'src/js/**/*.js'
        ])
        .pipe(plumber({
            errorHandler: function (error) {
                console.log(error.message);
                this.emit('end');
            }
        }))
        .pipe(concat('site.js'))
        //.pipe(uglify())
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


// RUN GULP TASKS
gulp.task('default', ['browser-sync'], function () {
    gulp.run('images', 'styles', 'fontawesome', 'scripts');    
    gulp.watch("src/css/**/*.scss", ['styles']);
    gulp.watch("src/js/**/*.js", ['scripts']);
    gulp.watch("src/css/**/*.scss", ['bs-reload']);
    gulp.watch("includes/*.php", ['bs-reload']);
    gulp.watch("*.html", ['bs-reload']);
    gulp.watch("*.php", ['bs-reload']);
});
