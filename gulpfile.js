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

elixir(function(mix) {
    mix.sass('app.scss','resources/assets/css')
        // .copy('public/css/bootstrap.css','resources/assets/css/bootstrap.css')
        // .copy('public/css/main.css','resources/assets/css/main.css')
        // .copy('public/css/responsive.css','resources/assets/css/responsive.css')
        // .copy('public/css/blog.css','resources/assets/css/blog.css')
        // .copy('public/css/mystyle.css','resources/assets/css/mystyle.css')
        // .copy('public/css/colors/color1.css','resources/assets/css/color1.css')
        // .copy('public/js/common.js','resources/assets/js/common.js')
        // .copy('public/js/myScript.js','resources/assets/js/myScript.js')
        .styles(['bootstrap.css','main.css','responsive.css','blog.css','prism.css','mystyle.css','color1.css'],'public/css/article.css')
        .scripts(['myScript.js','common.js','prism.js'],'public/js/article.js');

});