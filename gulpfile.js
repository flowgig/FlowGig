const elixir = require('laravel-elixir');
var config = require('./gulp-config.json');
require('laravel-elixir-vue');


/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass(config.paths.css)
    .webpack('app.js');
    mix.scripts(config.paths.js);
    mix.copy(config.paths.fonts, 'public/fonts');
    mix.copy(config.paths.images, 'public/images');
});

/*
elixir(function (mix) {
    mix.sass(config.paths.css);
    mix.scripts(config.paths.js);
    mix.copy(config.paths.fonts, 'public/fonts');
    mix.copy(config.paths.images, 'public/images');
});
*/
var gulp = require('gulp');

// Favicons:

var realFavicon = require('gulp-real-favicon');
var fs = require('fs');

// File where the favicon markups are stored
var FAVICON_DATA_FILE = 'faviconData.json';

// Generate the icons. This task takes a few seconds to complete.
// You should run it at least once to create the icons. Then,
// you should run it whenever RealFaviconGenerator updates its
// package (see the check-for-favicon-update task below).
gulp.task('generate-favicon', function (done) {
    realFavicon.generateFavicon({
        masterPicture: './resources/assets/images/svg/flowgig-logo-black-vertical.svg',
        dest: './public/images/favicon',
        iconsPath: '/images/favicon',
        design: {
            ios: {
                pictureAspect: 'backgroundAndMargin',
                backgroundColor: '#ffffff',
                margin: '25%',
                appName: 'FlowGig'
            },
            desktopBrowser: {},
            windows: {
                pictureAspect: 'whiteSilhouette',
                backgroundColor: '#c32a22',
                onConflict: 'override',
                appName: 'FlowGig'
            },
            androidChrome: {
                pictureAspect: 'backgroundAndMargin',
                margin: '15%',
                backgroundColor: '#ffffff',
                themeColor: '#ffffff',
                manifest: {
                    name: 'FlowGig',
                    display: 'browser',
                    orientation: 'notSet',
                    onConflict: 'override',
                    declared: true
                }
            },
            safariPinnedTab: {
                pictureAspect: 'silhouette',
                themeColor: '#c32a22'
            }
        },
        settings: {
            scalingAlgorithm: 'Lanczos',
            errorOnImageTooSmall: false
        },
        markupFile: FAVICON_DATA_FILE
    }, function () {
        done();
    });
});

// Inject the favicon markups in your HTML pages. You should run
// this task whenever you modify a page. You can keep this task
// as is or refactor your existing HTML pipeline.
gulp.task('inject-favicon-markups', function () {
    gulp.src(['./resources/views/layouts/master.blade.php'])
        .pipe(realFavicon.injectFaviconMarkups(JSON.parse(fs.readFileSync(FAVICON_DATA_FILE)).favicon.html_code))
        .pipe(gulp.dest('./resources/views/layouts'));
});

// Check for updates on RealFaviconGenerator (think: Apple has just
// released a new Touch icon along with the latest version of iOS).
// Run this task from time to time. Ideally, make it part of your
// continuous integration system.
gulp.task('check-for-favicon-update', function (done) {
    var currentVersion = JSON.parse(fs.readFileSync(FAVICON_DATA_FILE)).version;
    realFavicon.checkForUpdates(currentVersion, function (err) {
        if (err) {
            throw err;
        }
    });
});