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
        '../../assets/bower/lightbox2/dist/css/lightbox.css',
        '../../assets/bower/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
        '../../../node_modules/sweetalert/dist/sweetalert.css',
        'app.css',
        'font-awesome.min.css',
    ], null, 'resources/assets/css');

    mix.scripts([
	    '../../assets/bower/jquery/dist/jquery.js',
      '../../assets/bower/bootstrap/dist/js/bootstrap.min.js',
      '../../assets/bower/Jcrop/js/jquery.Jcrop.min.js',
      '../../assets/bower/jquery-file-upload/js/vendor/jquery.ui.widget.js',
      '../../assets/bower/jquery-file-upload/js/jquery.fileupload.js',
      '../../assets/bower/jquery-file-upload/js/jquery.fileupload-process.js',
      '../../assets/bower/bootstrap-datepicker/js/bootstrap-datepicker.js',
      '../../assets/js/comentaPost.js',
      '../../assets/js/createpost.js',
      '../../assets/js/postbarra.js',
      '../../assets/js/edicaofotoperfil.js',
      '../../assets/js/follow.js',
      '../../assets/js/ajaxCalls.js',
      '../../assets/js/desativalinks.js',
      '../../assets/bower/jQuery-Mask-Plugin/src/jquery.mask.js',
      '../../assets/js/uploadFoto.js',
      '../../assets/js/notificacoes.js',
      '../../assets/js/welcome.js',
      '../../assets/js/quimera.js',
      '../../assets/js/viajar.js',
      '../../assets/js/search.js',
      '../../assets/js/cropFoto.js',
      '../../assets/js/chefsclub.js',
      '../../../node_modules/sweetalert/dist/sweetalert.min.js',
      '../../assets/js/ongs.js'
	], 'public/js/vendor.js');
});
