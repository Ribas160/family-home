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

// Override mix internal webpack output configuration
mix.webpackConfig({
    output: {
        chunkFilename: 'js/[name].js',
        publicPath: '/projects/tmp/family-home/public/', // local
        // publicPath: '/family-home/', // prod
    },
});
mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
