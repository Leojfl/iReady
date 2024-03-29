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


 mix.less('resources/less/admin.less', 'css/admin.css');




mix.js('resources/js/vue-config.js', 'js/vue-config.js');

mix.js('resources/js/store/product/startForm.js', 'js/store/product/startForm.js').vue();

mix.js('resources/js/store/boart/startBoart.js', 'js/store/boart/startBoart.js').vue();
