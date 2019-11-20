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
mix.copy('resources/fonts', 'public/fonts');
mix.js('resources/js/admin.js', 'public/js');
mix.js('resources/js/register.js', 'public/js');
mix.js('resources/js/editform.js', 'public/js');
mix.sass('resources/sass/admin.scss', 'public/css');

mix.react('resources/react/app.js', 'public/js');
mix.sass('resources/react/assets/sass/app.scss', 'public/css');
mix.browserSync('localhost:8000');
