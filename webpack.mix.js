const { mix } = require('laravel-mix');

mix.browserSync({
    proxy: 'zakappje.test'
})

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
