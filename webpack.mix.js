const { mix } = require('laravel-mix');

mix.browserSync({
    proxy: 'homestead.test'
})

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
