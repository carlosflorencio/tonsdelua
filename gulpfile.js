process.env.DISABLE_NOTIFIER = true;

var elixir = require('laravel-elixir');
require('laravel-elixir-browser-sync-simple');

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

elixir(function (mix) {
    mix.less('app.less')
        .copy('./node_modules/bootstrap-less/fonts', 'public/fonts')
        .scripts(['vendor/*.js', 'app.js'])
        .version(['css/app.css', 'js/all.js'])
        .browserSync({
            proxy: 'tonsdelua.dev',
            notify: true,
            browser: "google-chrome-stable"

        });
});

