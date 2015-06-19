var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less([
        'app.less',
        'user.less',
        'welcome.less',
        '../../assets/bower/bootstrap/less/bootstrap.less'
    ], 'resources/assets/css/');

    mix.styles([
        '*.css'
    ], null, 'resources/assets/css');
    
    mix.scripts([
	    '../../assets/bower/jquery/dist/jquery.js',
	    '../../assets/bower/bootstrap/dist/js/bootstrap.js',
	    '../../assets/bower/Jcrop/js/jquery.Jcrop.min.js',
        '../../assets/js/edicaofotoperfil.js',
	    '../../assets/js/welcome.js'
	], 'public/js/vendor.js');	
});
