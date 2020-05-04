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
    .sass('resources/sass/frontend/index.scss', 'public/css')
    .sass('resources/sass/single_page.scss', 'public/css')
    .sass('resources/sass/frontend/chat/show.scss', 'public/css/chat')
    .sass('resources/sass/post_view.scss','public/css');
