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
    .vue()
    .sass('resources/sass/app.scss', 'public/css');



// trouble: mix(app.js)- wrong path

// solution - {{ url(mix(app.js)) }}
// taken here: https://github.com/laravel-mix/laravel-mix/issues/1026

    // let mix = require('laravel-mix');

    // /*
    //  |--------------------------------------------------------------------------
    //  | Mix Asset Management
    //  |--------------------------------------------------------------------------
    //  |
    //  | Mix provides a clean, fluent API for defining some Webpack build steps
    //  | for your Laravel application. By default, we are compiling the Sass
    //  | file for the application as well as bundling up all the JS files.
    //  |
    //  */
    
    // mix.js('resources/assets/js/app.js', 'public/assets/js')
    //     .sass('resources/assets/sass/app.scss', 'public/assets/css')
    //     .sass('resources/assets/sass/header.scss', 'public/assets/css')
    //     .setResourceRoot('/manpower/public/');
    
