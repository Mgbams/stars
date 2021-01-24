const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/stars-index.js", "public/js")
    .js("resources/js/role.js", "public/js")
    .js("resources/js/create-star.js", "public/js")
    .js("resources/js/edit-star.js", "public/js")
    .js("resources/js/create-user.js", "public/js")
    .js("resources/js/edit-user.js", "public/js")
    .sass("resources/sass/stars.scss", "public/css")
    .sass("resources/sass/role.scss", "public/css")
    .sass("resources/sass/app.scss", "public/css");
