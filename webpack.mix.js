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

mix
    // .webpackConfig({
    //     output: {
    //         publicPath: '/public/',
    //         filename: '[name].js',
    //         chunkFilename: 'js/[name].js',
    //     },
    // })
    // .options({
    //     postCss: [
    //         require('autoprefixer'),
    //     ],
    // })
    .copyDirectory('resources/js/assets', 'images')
    .js('resources/js/main.js', '/js')
    .vue()
    .extract(['vue', 'vuex', 'vue-router', 'vue-loader', 'axios', 'bootstrap', 'moment',
        '@fortawesome/vue-fontawesome', '@fortawesome/fontawesome-svg-core', '@fortawesome/free-solid-svg-icons', 'core-js', 'css-loader', '@vue/compiler-sfc'])
    .sass('resources/scss/_app.scss', '/css')
    .options({
        processCssUrls: false
    });

if (mix.inProduction()) {
    // mix.version();
}


