const mix = require('laravel-mix');
require('laravel-mix-copy-watched');

mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.min.js');
mix.copy('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'public/js/bootstrap.bundle.min.js');
mix.js('resources/js/admin.js', 'public/js');
mix.js('resources/js/register.js', 'public/js');
mix.js('resources/js/editform.js', 'public/js');
mix.sass('resources/sass/admin.scss', 'public/css');
mix.copy('resources/fonts', 'public/fonts');
mix.copyWatched('resources/img/**/*.{jpg,jpeg,png,gif}', 'public/img',
  { base: 'resources/img' }
);

mix.react('resources/react/app.js', 'public/js');
mix.sass('resources/react/assets/sass/app.scss', 'public/css');

mix.browserSync('localhost:8000');
