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
    mix.less('admin.less', 'public/assets/css/admin.css')
        .less('styles.less', 'public/assets/css/styles.css')
        .scripts([
        'scripts.js',
        'ajax.js',
        'monolog.js',
        'ui.js'
    ], 'public/assets/js/admin/scripts.js');
});
