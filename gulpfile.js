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
        'welcome.less',
    ], 'resources/assets/css/');

    mix.styles([
        '../../assets/bower/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
        '../../assets/bower/jquery-file-upload/css/jquery.fileupload.css',
        '*.css'
    ], null, 'resources/assets/css');

    mix.scripts([
	    '../../assets/bower/jquery/dist/jquery.js',
        '../../assets/bower/bootstrap/dist/js/bootstrap.js',
        /*
        '../../assets/bower/moment/min/moment-with-locales.min.js',
        '../../assets/bower/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
        */
	    '../../assets/bower/Jcrop/js/jquery.Jcrop.min.js',

	    '../../assets/bower/jquery-file-upload/js/vendor/jquery.ui.widget.js',

	    '../../assets/bower/jquery-file-upload/js/jquery.fileupload.js',
	    '../../assets/bower/jquery-file-upload/js/jquery.fileupload-process.js',

        '../../assets/js/comentaPost.js',
        '../../assets/js/createpost.js',
        '../../assets/js/postbarra.js',
        '../../assets/js/edicaofotoperfil.js',
        '../../assets/js/ajaxCalls.js',
        '../../assets/js/desativalinks.js'
	    //'../../assets/js/welcome.js'
	], 'public/js/vendor.js');
});
