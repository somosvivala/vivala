'use strict';

jQuery(document).ready(function($) {
    $(window).capslockstate();
    var init = function() {
        $('.conheca-popup').on('click', function() {
            $('#conheca-vivala').addClass('ativo');
        });

        $('.link-voltar').on('click', function() {
            window.history.back();
        });

        $('.desativa-conheca').on('click', function(e) {
            $('#conheca-vivala').removeClass('ativo');
        });

        $("input.form-mobile[name='password_confirmation']").on('change', function(e) {
            validatePassword();
        });
        $("input.form-mobile[name='password']").on('change', function(e) {
            validatePassword();
        });
        $("input.form-mobile[name='password']").focus(function(e){
          capsLockPassword();
        });
    };
    init();

    var validatePassword = function(){
        var pass2=$("input.form-mobile[name='password_confirmation']").val();
        var pass1=$("input.form-mobile[name='password']").val();
        if(pass1!=pass2 && pass2.length>2)
            $("#senhas-nao-coincidem").removeClass("hide");
        else
            $("#senhas-nao-coincidem").addClass("hide");
    }
    var capsLockPassword = function(){
      $(window).bind("capsOn", function(event) {
        $("#capslock-ligado").removeClass("hide");
      });
      $(window).bind("capsOff capsUnknown", function(event) {
        $("#capslock-ligado").addClass("hide");
      });
    }
});
