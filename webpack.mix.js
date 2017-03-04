let mix = require('laravel-mix');
let path = require('path');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */


//var ExtractTextPlugin = require('extract-text-webpack-plugin');
/*

 const sassLoader = ExtractTextPlugin.extract({
 loader: 'css-loader!sass-loader'
 });
 */
mix.webpackConfig({
    module: {
        rules: [
            /*        {
             test: /\.scss$/,
             loader: sassLoader,
             exclude: '/node_modules/'
             },*/
            {
                test: /\.ts(x?)$/,
               // exclude: [/node_modules(?!\/quark-gui)/, /vendor/],

                loader: 'babel-loader!ts-loader'
            }
        ]
    }
});

//                exclude: /(node_modules|vendor)\/(?!(quark-gui)\/).*/,


/*
module.exports.resolve = {
    extensions:  ['.webpack.js', '.web.js', '.ts', '.tsx', '.js']
};*/

//mix.webpackConfig({})


/*   plugins: [
 new ExtractTextPlugin('css/app.css')
 ]
 });*/

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')

// Full API
// mix.js(src, output);
// mix.react(src, output); <-- Identical to mix.js(), but registers React Babel compilation.
// mix.extract(vendorLibs);
// mix.sass(src, output);
// mix.less(src, output);
// mix.stylus(src, output);
// mix.browserSync('my-site.dev');
// mix.combine(files, destination);
// mix.babel(files, destination); <-- Identical to mix.combine(), but also includes Babel compilation.
// mix.copy(from, to);
// mix.minify(file);
// mix.sourceMaps(); // Enable sourcemaps
// mix.version(); // Enable versioning.
// mix.disableNotifications();
// mix.setPublicPath('path/to/public');
// mix.setResourceRoot('prefix/for/resource/locators');
// mix.autoload({}); <-- Will be passed to Webpack's ProvidePlugin.
// mix.webpackConfig({}); <-- Override webpack.config.js, without editing the file directly.
// mix.then(function () {}) <-- Will be triggered each time Webpack finishes building.
// mix.options({
//   extractVueStyles: false, // Extract .vue component styling to file, rather than inline.
//   processCssUrls: true, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
//   uglify: {}, // Uglify-specific options. https://webpack.github.io/docs/list-of-plugins.html#uglifyjsplugin
//   postCss: [] // Post-CSS options: https://github.com/postcss/postcss/blob/master/docs/plugins.md
// });
