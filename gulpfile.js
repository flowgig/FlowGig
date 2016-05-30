var elixir = require('laravel-elixir');
var config = require('./gulp-config.json');

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

elixir(function(mix) {
    mix.sass(config.paths.css);
    mix.scripts(config.paths.js);
    mix.copy(config.paths.fonts, 'public/fonts');
    mix.copy(config.paths.images, 'public/images');
});