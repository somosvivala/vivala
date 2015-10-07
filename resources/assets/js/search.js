$(document).on('change', '#estado_select', function (e) {

        // empty the select with previous cities if we have.
        $('#cidade_select').empty();            

        $.ajax({
                type: "GET",
                dataType: "json",
                // actions is a controller
                // cities is a method of actions controller
                url : "/busca/cidadesestado/" + $('#estado_select').val(),
                //here we set the data for the post based in our form 
                success:function(data){                    
                        if(data.error === 0 ){ // all was ok                                


                            $('#cidade_select').append("<option value='0'>Selecione uma cidade</option>");
                        for (var i = 0; i < data.cidades.length; i++) { 
                            $('#cidade_select').append("<option value='"+data.cidades[i].id+"'>"+data.cidades[i].nome+"</option>");
                        }

                        $('#cidade_select').removeAttr('disabled');

                        }else{
                            alert(data);
                        }
                },
                timeout:10000
        });                         
    });






