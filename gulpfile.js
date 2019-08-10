/* Load all required plugins */
var browserSync = require('browser-sync').create();
var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var cleancss = require('gulp-clean-css');
var fs = require('fs');
var ignore = require('gulp-ignore');
var imagemin = require('gulp-imagemin');
var newer = require('gulp-newer');
var rimraf = require('gulp-rimraf');
var scss = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
var yaml = require('js-yaml');
var gulpSequence = require('gulp-sequence');

/* Load settings from browsersync.yml */

/*
browsersync.yml powninen zawierac
PORT: 8000
PROXY: "localhost/starter"
*/

var _browsersyncConfig = browsersync_config(),
    PROXY = _browsersyncConfig.PROXY,
    PORT = _browsersyncConfig.PORT;

function browsersync_config() {
    var ymlFile = fs.readFileSync('browsersync.yml', 'utf8');
    return yaml.load(ymlFile);
}

/* Load settings from config.yml */
var _loadConfig = loadConfig(),
    COMPATIBILITY = _loadConfig.COMPATIBILITY,
    PATHS = _loadConfig.PATHS;

function loadConfig() {
    var ymlFile = fs.readFileSync('config.yml', 'utf8');
    return yaml.load(ymlFile);
}

/* Remove production directory contents */
gulp.task('clean', function () {
    return gulp.src('./' + PATHS.dist + '/*', {
            read: false
        })
        .pipe(ignore('node_modules/**'))
        .pipe(rimraf());
});

/* Process custom scss files */
gulp.task('scss-custom', function () {
    return gulp.src(PATHS.scss.custom)
        .pipe(sourcemaps.init({largeFile: true}))
        .pipe(scss().on('error', scss.logError))
        .pipe(autoprefixer({
            browsers: COMPATIBILITY
        }))
        .pipe(concat('style.css'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(PATHS.dist))
        .pipe(browserSync.stream());
});

/* Process scss libraries */
gulp.task('scss-lib', function () {
    return gulp.src(PATHS.scss.lib)
        .pipe(scss().on('error', scss.logError))
        .pipe(autoprefixer({
            browsers: COMPATIBILITY
        }))
        .pipe(concat('lib.css'))
        .pipe(gulp.dest(PATHS.dist))
        .pipe(browserSync.stream());
});

/* Process & merge scss libraries & custom files */
gulp.task('scss-bundle', function () {
    return gulp.src(PATHS.scss.lib.concat(PATHS.scss.custom))
        .pipe(scss().on('error', scss.logError))
        .pipe(autoprefixer({
            browsers: COMPATIBILITY
        }))
        .pipe(concat('style.css'))
        .pipe(cleancss({compatibility: 'ie8'}))
        .pipe(gulp.dest(PATHS.dist));
});

/* Process custom javascript files */
gulp.task('scripts-custom', function () {
    return gulp.src(PATHS.scripts.custom)
        .pipe(sourcemaps.init({largeFile: true}))
        .pipe(concat('app.js'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(PATHS.dist));
});

/* Process javascript libraries */
gulp.task('scripts-lib', function () {
    return gulp.src(PATHS.scripts.lib)
        .pipe(concat('lib.js'))
        .pipe(gulp.dest(PATHS.dist));
});

/* Process & merge javascript libraries & custom files */
gulp.task('scripts-bundle', function () {
    return gulp.src(PATHS.scripts.lib.concat(PATHS.scripts.custom))
        .pipe(concat('bundle.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(PATHS.dist));
});

/* Compress & copy images */
gulp.task('images', function () {
    return gulp.src(PATHS.images)
        .pipe(newer(PATHS.dist + '/images'))
        .pipe(imagemin())
        .pipe(gulp.dest(PATHS.dist + '/images'));
});

/* Copy fonts */
gulp.task('fonts', function () {
    return gulp.src(PATHS.fonts)
        .pipe(newer(PATHS.dist + '/fonts'))
        .pipe(gulp.dest(PATHS.dist + '/fonts'));
});

gulp.task('php', function() {
    return gulp.src(PATHS.php)
        .pipe(newer(PATHS.dist))
        .pipe(gulp.dest(PATHS.dist))
});

/* Start BrowserSync server */
gulp.task('server', function () {
    browserSync.init({
        proxy: PROXY,
        port: PORT,
        open: false
    });
});

/* Watch scss, & JavaScript files for changes */
gulp.task('watch', function () {
    gulp.watch(PATHS.scss.custom, ['scss-custom']);
    gulp.watch(PATHS.scss.lib, ['scss-lib']);
    gulp.watch(PATHS.scripts.custom, ['scripts-custom']).on('change', browserSync.reload);
    gulp.watch(PATHS.scripts.lib, ['scripts-lib']).on('change', browserSync.reload);
    gulp.watch(PATHS.images, ['images']).on('change', browserSync.reload);
    gulp.watch(PATHS.fonts, ['fonts']).on('change', browserSync.reload);
    gulp.watch(PATHS.php, ['php']).on('change', browserSync.reload);
});

/* Use if you only want to make production-ready build*/
gulp.task('build', gulpSequence('clean', ['fonts', 'images', 'scripts-bundle', 'scss-bundle'], 'php'));

/* Run a developement environment */
gulp.task('develop', gulpSequence('clean', ['fonts', 'images', 'scripts-lib', 'scripts-custom', 'scss-lib', 'scss-custom'], 'php'));

/* Run a developement environment */
gulp.task('default', gulpSequence('clean', ['fonts', 'images', 'scripts-lib', 'scripts-custom', 'scss-lib', 'scss-custom'], 'php', 'server', 'watch'));