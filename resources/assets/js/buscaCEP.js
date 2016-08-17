/**
 * Funcao para pegar as informacoes de um CEP
 */
var ajaxBuscaCEP = function(cep, target) {

    // Mostra o icone de loading
    $(target).siblings('i.fa').toggleClass('soft-hide');
    $.ajax({
        url: '/busca/cep',
        type: 'GET',
        data: {
            stringCEP: $(target).val()
        }
    })
    .complete(function() {
        // Esconde o loading
        $(target).siblings('i.fa').toggleClass('soft-hide');
    })
    .done(function(data) {

        //Se nao obtivermos informações do CEP
        if (data.errorMsg) {
            //mostrar feedback de erro?
        }

        //Se tiver rolado tudo certo
        else {
            console.log(data);
            var data = JSON.parse(data);

            //removendo disable e settando valor
            $('#endereco_localidade').removeAttr('disabled').val(data.localidade);
            $('#endereco_uf').removeAttr('disabled').val(data.uf);
            $('#endereco_logradouro').removeAttr('disabled').val(data.logradouro);
            $('#endereco_bairro').removeAttr('disabled').val(data.bairro);
            $('#endereco_complemento').removeAttr('disabled').val(data.complemento);
        }


    });
};

// Shorthand for $( document ).ready()
$(function() {

    var buscaCepTimeout,
        origemVal = '';

        $('.busca-cep-ativo').bind('keypress blur', function(e) {

            if ($(this).val().length >= 4) {
                if ($(this).val() !== origemVal) {
                    if (buscaCepTimeout!== undefined && buscaCepTimeout > 0) {
                        clearTimeout(buscaCepTimeout);
                    }
                    buscaCepTimeout = setTimeout(ajaxBuscaCEP, 500, origemVal, this);
                }
            }
            origemVal = $(this).val();
        });
});



