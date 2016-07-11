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
      '../../assets/bower/outdated-browser/outdatedbrowser/outdatedbrowser.min.css',
      '../../assets/bower/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
      '../../assets/bower/jquery-file-upload/css/jquery.fileupload.css',
      '../../assets/bower/cropper/dist/cropper.min.css',
      '../../assets/bower/lightbox2/dist/css/lightbox.css',
      '../../assets/bower/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
      '../../assets/bower/sweetalert2/dist/sweetalert2.css',
      '../../assets/bower/intro.js/introjs.css',
      '../../assets/bower/tether-tooltip/dist/css/tooltip-theme-twipsy.css',
      'app.css',
      '../../assets/bower/font-awesome/css/font-awesome.min.css',
      '../../assets/bower/bootstrap-social/bootstrap-social.css', // Deve vir depois do Font-Awesome e ao fim, conflita em classe com algo
      '../../assets/bower/rangeslider.js/dist/rangeslider.css',
  ], null, 'resources/assets/css');

  // De toda a plataforma
  mix.scripts([
      /* Scripts NPM-BOWER */
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
      '../../assets/bower/instafeed.js/instafeed.min.js',
      '../../assets/bower/tether/dist/js/tether.min.js',
      '../../assets/bower/tether-drop/dist/js/drop.min.js',
      '../../assets/bower/tether-tooltip/dist/js/tooltip.min.js',
      '../../assets/bower/rangeslider.js/dist/rangeslider.min.js',
      /* Bibliotecas prontas não adicionadas por npm/bower */
      '../../assets/js/bibliotecas/jquery.maskmoney.min.js',
      /* Logger antes dos outros */
      '../../assets/js/logger-config.js',
      /* Scripts Vivalá */
      '../../assets/js/outdatedbrowser.js',
      '../../assets/js/comentaPost.js',
      '../../assets/js/createpost.js',
      '../../assets/js/postbarra.js',
      '../../assets/js/edicaofotoperfil.js',
      '../../assets/js/formFeedback.js',
      '../../assets/js/follow.js',
      '../../assets/js/ajaxCalls.js',
      '../../assets/js/notificacoes.js',
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
      '../../assets/js/quimera.js',
      '../../assets/js/clickbus.js',
      '../../assets/js/formContato.js',
      '../../assets/js/ongs.js',
      '../../assets/js/tour.js',
      '../../assets/js/buscaPerfil.js',
      '../../assets/js/menu.js',
      '../../assets/js/mascaraCampos.js',
      '../../assets/js/autocompleteBuscas.js',
      '../../assets/js/cotacaoViagem.js',

      /* Experiências */
      '../../assets/js/fontAwesomeIconsArray.js',
      '../../assets/js/experienciasCropFoto.js',
      '../../assets/js/experienciasCropFotoOwner.js',
      '../../assets/js/experienciasInfoForm.js',
      '../../assets/js/experienciasDataOcorrencia.js',
      '../../assets/js/experienciasCategoria.js',
      '../../assets/js/experienciasInscricoes.js',
      '../../assets/js/experienciasEstado.js',
      '../../assets/js/experiencias.js',
      /* ClickbusPayment Mercado Pago Gateway */
      '../../assets/js/clickbus-payments.js',
	], 'public/js/vendor.js');

  // Apenas da view de Welcome
  mix.scripts([
    /* Scripts NPM-BOWER */
    '../../assets/bower/jquery/dist/jquery.js',
    '../../assets/bower/bootstrap/dist/js/bootstrap.min.js',
    '../../assets/bower/outdated-browser/outdatedbrowser/outdatedbrowser.min.js',
    /* Scripts Vivalá */
    '../../assets/js/welcome.js',
  ], 'public/js/welcome.js');

  // Apenas do Mobile
  mix.scripts([
    /* Scripts NPM-BOWER */
    '../../assets/bower/jquery/dist/jquery.js',
    '../../assets/bower/bootstrap/dist/js/bootstrap.min.js',
    /* Bibliotecas prontas não adicionadas por npm/bower */
    '../../assets/js/bibliotecas/jquery.capslockstate.min.js',
    /* Scripts Vivalá */
    '../../assets/js/mobile.js',
  ], 'public/js/mobile.js');

});
