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

mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.min.js');
mix.copy('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'public/js/bootstrap.bundle.min.js');
mix.js('resources/js/app.js', 'public/js');
mix.js('resources/js/register.js', 'public/js');
// mix.copy('node_modules/@fontawesome/css/all.min.css', 'public/css/fontawesome.min.css');
mix.sass('resources/sass/app.scss', 'public/css');
