var kirbyAssets = './app/assets/';
var devAssets = './assets/';
var phpPort = 8000;

var gulp                = require('gulp');
var beep                = require('beepbeep')
var gutil               = require('gulp-util');
var plumber             = require('gulp-plumber');
var uglify              = require('gulp-uglifyjs');
var sass                = require('gulp-ruby-sass');
var sourcemaps          = require('gulp-sourcemaps');
var livereload          = require('gulp-livereload');
var php                 = require('gulp-connect-php');
var svgstore            = require('gulp-svgstore');
var svgmin              = require('gulp-svgmin');
var path                = require('path');
var rename              = require('gulp-rename');
var clean               = require('gulp-clean');
var autoprefixer        = require('gulp-autoprefixer');


var sequence            = require('run-sequence');
var psi                 = require('psi');


var onError = function (err) {
    beep(1);
    gutil.log(gutil.colors.green(err));
};


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////
//////////     WEBSITE TASKS
//////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// JS
gulp.task('uglifyjs', function() {
    return gulp.src([
        devAssets + 'scripts/*.js',
        devAssets + 'scripts/main.js'
    ])
    .pipe(plumber({
        errorHandler: onError
    }))
    .pipe(uglify('main.js', {
        compress: true,
        outSourceMap: true
    }))
    .pipe(gulp.dest(kirbyAssets + 'scripts/'))
    .pipe(livereload());
});

// VendorJS fused to one file
// gulp.task('vendorJS', function() {
//     return gulp.src([
//         devAssets + 'scripts/vendor/*.js',
//     ])
//     .pipe(plumber({
//         errorHandler: onError
//     }))
//     .pipe(uglify('vendor.js', {
//         compress: true,
//         outSourceMap: true
//     }))
//     .pipe(gulp.dest(kirbyAssets + 'scripts/vendor/'))
//     .pipe(livereload());
// });

// VendorJS fused to files
gulp.task('vendorJS', function() {
    return gulp.src([
        devAssets + 'scripts/vendor/*.js',
    ])
    .pipe(plumber({
        errorHandler: onError
    }))
    .pipe(gulp.dest(kirbyAssets + 'scripts/vendor/'))
    .pipe(livereload());
});

// -------------- TESTING ---------------------

// gulp.task('compress', function (cb) {
//   pump([
//         gulp.src('lib/*.js'),
//         uglify(),
//         gulp.dest('dist')
//     ],
//     cb
//   );
// });

// --------------------------------------------



// Sass
gulp.task('sass', function() {
    return sass('./assets/css/main.scss', { sourcemap: true, style: 'compressed' })
    .pipe(plumber({
        errorHandler: onError
    }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./app/assets/css/'))
    .pipe(livereload());
});

// autoprefix
gulp.task('autoprefixer', function () {
    return gulp.src('./app/assets/css/*.css')
    .pipe(autoprefixer({
        browsers: ['last 2 versions']
    }))
    .pipe(gulp.dest('./app/assets/css/'));
});

// PHP
gulp.task('php', function() {
    php.server({ base: 'app', port: phpPort, keepalive: true, stdio: 'ignore'});
});

// Reload
gulp.task('reload', function() {
    livereload.reload('PHP');
});

// SVG
gulp.task('svgstore', function () {
    return gulp
        .src(devAssets + 'svg/**/*.svg')
        .pipe(rename({prefix: 'svg-'}))
        .pipe(svgmin(function (file) {
            var prefix = path.basename(file.relative, path.extname(file.relative));
            return {
                plugins: [{
                    cleanupIDs: {
                        prefix: prefix + '-',
                        minify: true
                    }
                }]
            }
        }))
        .pipe(svgstore())
        .pipe(gulp.dest(kirbyAssets + 'svg/'));
});

gulp.task('svgcopy', function () {
    return gulp
        .src(devAssets + 'svg/**/*.svg')
        .pipe(plumber({
            errorHandler: onError
        }))
        .pipe(gulp.dest(kirbyAssets + 'svg/'));
});

// copy fonts
gulp.task('copyfonts',['clean-fonts'], function() {
   gulp.src(devAssets + 'fonts/**/*.{ttf,woff,eot,svg,woff2,css}')
   .pipe(gulp.dest(kirbyAssets +'fonts/'));
});


// clean fonts
gulp.task('clean-fonts', function () {
  return gulp.src(kirbyAssets +'fonts/', {read: false})
    .pipe(clean());
});




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////
//////////     SPEED TESTING
//////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



gulp.task('psi-desktop', function (cb) {
    psi.output(site, { nokey: 'true', strategy: 'desktop' }).then(function () {
        cb();
    });
});

gulp.task('psi-mobile', function (cb) {
    psi.output(site, { nokey: 'true', strategy: 'mobile' }).then(function () {
        cb();
    });
});



gulp.task('psi', function (cb) {
  return sequence(
    'php',
    'psi-desktop',
    'psi-mobile',
    cb
  );
});

gulp.task('speedtest', ['psi'], function() {
  process.exit();
})

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////
//////////     WATCH AND BUILD TASKS
//////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

gutil.log(gutil.colors.inverse('––––––––––––––––––––––––––––––––'));
gutil.log(gutil.colors.inverse('Simple Kirby Workflow v0.1'));
gutil.log(gutil.colors.inverse('joachim@ansich.ch and info@florianwachter.com'));
gutil.log(gutil.colors.inverse('Your PHP Server is at:'));
gutil.log(gutil.colors.inverse('http://localhost:' + phpPort));
gutil.log(gutil.colors.inverse('––––––––––––––––––––––––––––––––'));
gutil.log(gutil.colors.inverse('You can use:'));
gutil.log(gutil.colors.inverse('gulp – to run dev server'));
gutil.log(gutil.colors.inverse('gulp speedtest – to get pagespeed scores'));
gutil.log(gutil.colors.inverse('gulp build – to manually build all files from assets'));


// Primary task to watch other tasks
gulp.task('default', function() {

    // LiveReload
    livereload.listen();

    // start PHP server
    gulp.start('php');

    // Watch JS
    gulp.watch(devAssets + 'scripts/*.js', ['uglifyjs']);

    // Watch Vendor JS
    gulp.watch(devAssets + 'scripts/vendor/*.js', ['vendorJS']);

    // Watch Sass
    gulp.watch([devAssets + 'css/**/*.scss'], ['sass']);

    // Watch PHP
    gulp.watch(['app/site/**/*.php'], ['reload']);

    // Watch SVG
    gulp.watch([devAssets + 'svg/**/*.svg'], ['svgcopy']);

    // Watch Fonts
    gulp.watch([devAssets + 'fonts/**/*'], ['copyfonts']);


    gutil.log(gutil.colors.inverse('Gulp is watching...'));
});

// Manually build all
gulp.task('build', function() {
    gulp.start('uglifyjs', 'sass', 'svgcopy', 'copyfonts', 'vendorJS', 'autoprefixer');
});
