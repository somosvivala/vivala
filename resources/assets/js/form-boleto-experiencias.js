$(function () {
    //disparando funcao para checar os inputs disabled
    checaDisabledFormBoletoExperiencia();
    bindaSubmitFormAjax();
});

/**
 * Funcao para bindar submit de forms que contenham a classe 'form-por-ajax'.
 * Obtendo as informacoes necessarias do elemento form (data-callback, data-loading, data-errors)
 *
 * Se der erro insere o html ja formatado no container de erros, se der tudo certo executa a funcao de callback
 */
function bindaSubmitFormAjax() {
     $(".form-por-ajax").submit(function(event) {
         event.preventDefault()

         var target = $(event.target);
         var callbackFunction = target.data('callback');
         var loadingElement = target.data('loading');
         var errorContainer = target.data('errors');

         //token do laravel para ajax
         $.ajaxSetup({
             headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
         });

         $.ajax({
             url: target.attr('action'),
             type: target.attr('method'),
             dataType: 'json',
             data: $.param( target.serializeArray() ),
             beforeSend: function() {

                 /** Antes de enviar o ajax, limpamos os erros, escondemos o botao e mostramos o loading **/
                 $(errorContainer).html('');
                 $(loadingElement).toggleClass('hidden');
                 target.find('input[type=submit]').toggleClass('hidden');
             },
             complete: function (jqXHR, textStatus) {

                 /** Escondendo o loading e voltando o botao de submit **/
                 $(loadingElement).toggleClass('hidden');
                 target.find('input[type=submit]').toggleClass('hidden');
             },
             success: function (data, textStatus, jqXHR) {

                 /** Se tiver ocorrido tudo certo, verificar se existe um callback **/
                 if ( data.success ) {

                     /** Chamando funcao de callback caso exista uma **/
                     if ( callbackFunction ) {
                         eval(callbackFunction);
                     }
                 }
             },
             error: function (jqXHR, textStatus, errorThrown) {
                 var arrayErros = [];
                 /** Iterando sob o objeto que contem os erros **/
                 $.each(jqXHR.responseJSON, function (Objkey, campoErro) {

                     /** Iterando sob cada indice do objeto de erros que contem as mensagens de erro */
                     $.each(campoErro, function(key, mensagem) {

                         /** Formatando erros para inserilos no container **/
                         arrayErros.push("<div class='form-mobile-error'>" + mensagem + "</div>");
                     });
                 });

                 /** Gerando/Inserindo string com o html dos erros **/
                 var htmlErros = arrayErros.join("");
                 $(errorContainer).html(htmlErros);
             }
         });
     });
}



/**
 * Funcao para ser executada caso um boleto seja gerado com sucesso
 */
function callbackSucessoGeracaoBoletoExperiencias(data) {
    window.open(data.linkboleto, '_blank');

    swal({
        type: "success",
        html: '<h4>Boleto gerado com sucesso</h4> <br><p>Se o download nao começar automaticamente, acesse o <a href="'+data.linkboleto+'" target="_blank" class="laranja laranja-hover texto-negrito"> link para 2º via </a></p><br><br>',
        showCancelButton: false,
        confirmButtonText: "VER MAIS EXPERIÊNCIAS",
        confirmButtonClass: "texto-negrito",
        confirmButtonColor: "#27a493"
    },
    function() {
        window.location.href = "/experiencias";
    });
}


/**
 * Funcao para remover o disabled do form se o user ja tiver fornecido esses dados em outra vez
 */
var checaDisabledFormBoletoExperiencia = function() {
    //iterando sob os inputs, se tiverem valor retiro o disabled
    $.each($('form.gerar-boleto-experiencia input'), function(key,value) {
        if ($(value).val()) {
            $(value).removeAttr('disabled');
        }
    });
}
