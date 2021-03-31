const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);

mix.sass('resources/sass/color.scss', 'public/css')
    .sass('resources/sass/index.scss', 'public/css')
    .sass('resources/sass/register.scss', 'public/css/auth')
    .sass('resources/sass/main.scss', 'public/css')
    .sass('resources/sass/show.scss', 'public/css')
    .sass('resources/sass/saved.scss', 'public/css')
    .sass('resources/sass/nav.scss', 'public/css')
    .sass('resources/sass/profile.scss', 'public/css')
    .sass('resources/sass/forward/forward.scss', 'public/css')
    .sass('resources/sass/mixin/_mixin.scss', 'public/css')
    .sass('resources/sass/room.scss', 'public/css/auth');


// mix.js('resources/js/rooms.js', 'public/js/rooms');