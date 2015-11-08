/* Trocar essa merda de função por jquery */
function verificaRecorteImagem(evt) {

    if(
        jQuery('#wJcropPerfil').val() == 0 ||
        jQuery('#hJcropPerfil').val() == 0
    )
    {
        //Nao mais verificando agora que o ja vem com area selecionada.
    }
};

$(function(){

    $('#preview').click(function (ev) {
        var subiuImagem = $('#image_file_upload').val() != "";

        if (!subiuImagem) {
            $('#image_file_upload').click();
        }
    });


    /**
     * Bindando crop da foto do quiz, usando do sweetAlert para mensagem
     * amigavel
     */
    $('#quiz_foto_form').submit(function (ev) {
        ev.preventDefault();

        var frm = $(this),
            dataForm = new FormData(this),
            callbackFunction = frm.data('callback'),
            redirect = frm.data('redirect'),
            loading = frm.data('loading');

            var subiuImagem = $('#image_file_upload').val() != "";

            console.log('loading -> ' + loading);
            if (!subiuImagem) {

                swal({
                    title: "Nenhum arquivo selecionado",
                    text: "Continuar sem adicionar uma foto de perfil?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Não",
                    cancelButtonText: "Sim, próxima etapa!",
                    closeOnConfirm: true,
                    closeOnCancel: false 
                }, function(isConfirm) {
                    if (isConfirm) {

                        return false;
                    } else {
                        // Redireciona para outra pagina
                        if(redirect) {
                            window.location = redirect;
                        }
                    } 
                }    
                    );

                    //Caso tenha subido imagem, entao dispara ajax para
                    //foto/cropandsave
            } else {
                if (loading && loading != "") {
                    $(frm).find('input:submit').hide();
                    $(frm).find('#'+loading).show();
                }

                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: dataForm,
                    contentType: false, //file
                    processData: false,  //file
                    success: function (data) {
                        // Executa uma função de javascript
                        if(callbackFunction) {
                            eval(callbackFunction);
                        }
                        // Redireciona para outra pagina
                        if(redirect) {
                            window.location = redirect;
                        }
                    },
                    error: function (data) {
                        //Se tiver loading e tiver dado erro, voltar botao
                        if (loading && loading != "") {
                            $(frm).find('#'+loading).hide();
                            $(frm).find('input:submit').show();
                        }
                    }
                });
            }

    });

    function updateCoords(c) {
        jQuery('input[name=x]').val(c.x);
        jQuery('input[name=y]').val(c.y);
        jQuery('input[name=w]').val(c.w);
        jQuery('input[name=h]').val(c.h);
    };

    // Create variables (in this scope) to hold the Jcrop API and image size
    var jcrop_api, boundx, boundy;

    /**
     * Handler para quando uma foto é adicionada
     * @return {?} [description]
     */
    function fotoUploadHandler() {
        var inputFile = $('#image_file_upload'),
            // Pega arquivo que foi selecionado
            oFile = inputFile[0].files[0],
                // Proporção da foto
                imgRatio = inputFile.data("ratio");
                if(!imgRatio) imgRatio = 1;
                // Esconde o div de erros
                $('.erros').hide();
                // Filtra imagens que não são png ou jpg
                var rFilter = /^(image\/jpeg|image\/png)$/i;
                if (! rFilter.test(oFile.type)) {
                    $('.erros').html('Por favor selecione um formato válido (jpg ou png).').show();
                    return;
                }

                // Tamanho max = 2MB
                if ( oFile.size > 2048 * 1024) {
                    $('.erros').html('Arquivo muito grande, selecione um arquivo de até 2Mb.').show();
                    return;
                }

                // Mostra foto selecionada
                var oImage = document.getElementById('preview');

                // prepare HTML5 FileReader
                var oReader = new FileReader();
                oReader.onload = function(e) {

                    // e.target.result contains the DataURL which we can use as a source of the image
                    oImage.src = e.target.result;
                    oImage.onload = function () { // onload event handler

                        // Esconde foto atual e mostra a nova
                        $('#foto-atual-display').fadeOut(300);
                        $('#foto-edit-display').removeClass('hide').fadeIn(500);

                        // destroy Jcrop if it is existed
                        if (typeof jcrop_api != 'undefined') {
                            jcrop_api.destroy();
                            jcrop_api = null;
                        }

                        var imgWidth =  oImage.naturalWidth;
                        var imgHeight = oImage.naturalHeight;

                        var x1, x2, y1, y2 = 0;

                        if (imgWidth > imgHeight) {
                            y1 = 0;
                            x1 = (imgWidth - imgHeight)/2;
                            y2 = imgHeight;
                            x2 = x1 + imgHeight;

                        } else {
                            x1 = 0;
                            y1 =  (imgHeight - imgWidth )/2;
                            x2 = imgWidth;
                            y2 = y1 + imgWidth;

                        }

                        var jaFezUpload = $('#uploadedFoto').val();

                        if (!jaFezUpload) {

                            // Seta o JCrop pra imagem
                            $('#preview').Jcrop({
                                aspectRatio: imgRatio,
                                minSize: [ 100, 100 ],
                                onSelect: updateCoords,
                                onSelect: updateCoords,
                                setSelect: [x1,y1,x2,y2],
                                bgFade: true,
                                bgOpacity: .3,
                                trueSize: [oImage.naturalWidth,oImage.naturalHeight]
                            }, function(){
                                // Store the Jcrop API in the jcrop_api variable
                                jcrop_api = this;
                            });
                        }
                    };
                };

                // read selected file as DataURL
                oReader.readAsDataURL(oFile);
    };


    $( "#image_file_upload" ).change(function() {
        fotoUploadHandler();

    });



    var submitBtn = $('#perfil-btn-submit input:submit'),
        loading = submitBtn.next();

        //Escutando click no submit para mostrar o loading
        $(submitBtn).on('click', function() {
            console.log('click submit');
            if (loading && loading != "") {
                $(submitBtn).hide();
                $(loading).show();
            }

        });




});
