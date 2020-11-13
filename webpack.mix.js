let mix = require('laravel-mix'),
    res = 'resources/';

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

mix
    .scripts([
        './vendor/laravel/nova/public/manifest.js',
        './vendor/laravel/nova/public/vendor.js',
        './vendor/laravel/nova/public/app.js'
    ], 'public/js/nova.js')

    .js(res + 'js/admin/bootstrap.js', 'public/js/admin.js')
    // .sass(res + 'sass/app.scss', 'public/css/common.css')
    .options({
        processCssUrls: false
    })
    // .copy(res + 'images', 'public/images')
    .version();
