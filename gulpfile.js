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
    mix.less('app.less');
    mix.scripts([
	    '../../assets/bower/jquery/dist/jquery.js',
	    '../../assets/bower/bootstrap/dist/js/bootstrap.js',
	    '../../assets/bower/dropzone/dist/min/dropzone.min.js',

	    '../../assets/js/dropzoneconfig.js'
	], 'public/js/vendor.js');
});
