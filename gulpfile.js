var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
elixir.config.sourcemaps = false;
elixir(function(mix) {
    mix
        //.copy('public/css/bootstrap.css','resources/assets/css/bootstrap.css')
        //.copy('public/css/normalize.css','resources/assets/css/normalize.css')
        //.copy('public/libs/materialize/css/materialize.min.css','resources/assets/css/materialize.min.css')
        //.copy('public/css/animate.css','resources/assets/css/animate.css')
        //.copy('public/libs/owl-carousel/owl.carousel.min.css','resources/assets/css/owl.carousel.min.css')
        //.copy('public/libs/owl-carousel/owl.theme.default.min.css','resources/assets/css/owl.theme.default.min.css')
        //.copy('public/css/main.css','resources/assets/css/main.css')
        //.copy('public/css/responsive.css','resources/assets/css/responsive.css')
        //.copy('public/css/blog.css','resources/assets/css/blog.css')
        //.copy('public/css/mystyle.css','resources/assets/css/mystyle.css')
        //.copy('public/css/colors/color1.css','resources/assets/css/color1.css')
        //.copy('public/js/common.js','resources/assets/js/common.js')
        //.copy('public/js/main.js','resources/assets/js/main.js')
        //.copy('public/js/waypoints.min.js','resources/assets/js/waypoints.min.js')
        //.copy('public/libs/owl-carousel/owl.carousel.min.js','resources/assets/js/owl.carousel.min.js')
        //.copy('public/libs/materialize/js/materialize.min.js','resources/assets/js/materialize.min.js')
        //.copy('public/js/myScript.js','resources/assets/js/myScript.js')
        .copy('node_modules/sweetalert/dist/sweetalert.min.js','resources/assets/js/sweetalert.min.js')
        .styles([
            'bootstrap.css',
            'main.css',
            'responsive.css',
            'blog.css',
            'prism.css',
            'mystyle.css',
            'color1.css'
        ],'public/css/article.css')

        .styles([
            'normalize.css',
            'bootstrap.css',
            'animate.css',
            'owl.carousel.min.css',
            'owl.theme.default.min.css',
            'main.css',
            'responsive.css',
            'mystyle.css',
            'color1.css'
        ],'public/css/index-all.css')

        .scripts([
            'myScript.js',
            'common.js',
            'prism.js'
        ],'public/js/article.js')

        .scripts([
            'waypoints.min.js',
            'owl.carousel.min.js',
            'materialize.min.js',
            'common.js',
            'sweetalert.min.js',
            'main.js',
            'myScript.js'
        ],'public/js/index-all.js')
        .version(['css/index-all.css','js/index-all.js'], 'public');
});