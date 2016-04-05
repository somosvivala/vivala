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
        '../../assets/bower/outdated-browser/outdatedbrowser/outdatedbrowser.css',
        '../../assets/bower/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
        '../../assets/bower/jquery-file-upload/css/jquery.fileupload.css',
        '../../assets/bower/cropper/dist/cropper.min.css',
        '../../assets/bower/lightbox2/dist/css/lightbox.css',
        '../../assets/bower/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
        '../../assets/bower/sweetalert2/dist/sweetalert2.css',
        '../../assets/bower/intro.js/introjs.css',
        'app.css',
        'font-awesome.min.css',
        '../../assets/bower/bootstrap-social/bootstrap-social.css',
    ], null, 'resources/assets/css');

    mix.scripts([
        '../../assets/bower/jquery/dist/jquery.js',
      '../../assets/bower/bootstrap/dist/js/bootstrap.min.js',
        '../../assets/bower/outdated-browser/outdatedbrowser/outdatedbrowser.min.js',
      '../../assets/bower/Jcrop/js/jquery.Jcrop.min.js',
      '../../assets/bower/jquery-file-upload/js/vendor/jquery.ui.widget.js',
      '../../assets/bower/jquery-file-upload/js/jquery.fileupload.js',
      '../../assets/bower/jquery-file-upload/js/jquery.fileupload-process.js',
      '../../assets/bower/outdated-browser/outdatedbrowser/outdatedbrowser.min.js',
      '../../assets/bower/cropper/dist/cropper.min.js',
      '../../assets/bower/bootstrap-datepicker/js/bootstrap-datepicker.js',
      '../../assets/bower/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js',
      '../../assets/bower/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js',
      '../../assets/bower/jQuery-Mask-Plugin/src/jquery.mask.js',
      '../../assets/bower/sweetalert2/dist/sweetalert2.min.js',
      '../../assets/bower/intro.js/minified/intro.min.js',
      '../../assets/bower/js-cookie/src/js.cookie.js',

      /* Scripts Vivalá */
      '../../assets/js/comentaPost.js',
      '../../assets/js/createpost.js',
      '../../assets/js/postbarra.js',
      '../../assets/js/edicaofotoperfil.js',
      '../../assets/js/formFeedback.js',
      '../../assets/js/follow.js',
      '../../assets/js/ajaxCalls.js',
      '../../assets/js/notificacoes.js',
      '../../assets/js/welcome.js',
      '../../assets/js/rodoviario.js',
      '../../assets/js/viajar.js',
      '../../assets/js/search.js',
      '../../assets/js/cropFoto.js',
      '../../assets/js/OngcropFoto.js',
      '../../assets/js/PerfilcropFoto.js',
      '../../assets/js/VagacropFoto.js',
      '../../assets/js/chefsclub.js',
      '../../assets/js/uploadFoto.js',
      '../../assets/js/feed.js',
      '../../assets/js/notificacoes.js',
      '../../assets/js/welcome.js',
      '../../assets/js/quimera.js',
      '../../assets/js/clickbus.js',
      '../../assets/js/formContato.js',
      '../../assets/js/ongs.js',
      '../../assets/js/tour.js',
      '../../assets/js/menu.js',
      '../../assets/js/mascaraCampos.js',

      /* ClickbusPayment Mercado Pago Gateway*/
      '../../assets/js/clickbus-payments.js',


	], 'public/js/vendor.js');
});
