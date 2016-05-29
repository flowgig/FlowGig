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
});

elixir(function(mix) {
    mix.scripts(config.paths.js);
});

elixir(function(mix) {
    mix.copy(config.paths.fonts, 'public/fonts');
});