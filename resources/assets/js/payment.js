'use strict';

$.ajaxSetup({
    headers: { 
        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value'),
        'Access-Control-Allow-Headers': '*'
    }
});

var ajax,

    bindaAbas = function() {
    
        $('#abas-pagamento a').click(function (e) {
          e.preventDefault();
          $(this).tab('show');
        })
    };

