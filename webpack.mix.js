const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copy('resources/css/style.css', 'public/css/style.css')
    .copy('resources/css/style2.css', 'public/css/style2.css')
    .copy('resources/icons', 'public/icons')
    .copy('resources/images', 'public/images')
    .copy('resources/plugins', 'public/plugins')
    .copy('resources/js/theme', 'public/js/theme');
