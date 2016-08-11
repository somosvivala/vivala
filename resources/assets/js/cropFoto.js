$(function() {

    //token do laravel para ajax
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

    /** Funcões para Upload */
    $('.cropfoto-ajax').submit(function (ev) {
        ev.preventDefault();
        var frm = $(this),
            dataForm = new FormData(this),
            callbackFunction = frm.data('callback'),
            redirect = frm.data('redirect');

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: dataForm,
            contentType: false, //file
            processData: false,  //file
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);

                swal({
                    title: lingua[26],
                    html: "<p>"+lingua[38]+"</p>",
                    type: "error",
                    confirmButtonColor: corLaranjaPrimario,
                    confirmButtonText: 'OK',
                    closeOnConfirm: true,
                });
            },
            success: function (data) {
                // Executa uma função de javascript
                //console.log(data);

                //Settando o tamanho do container para o tamanho da nova imagem
                var tipo = $('#tipo_foto');
                if (tipo && tipo.val() == 'capa') {
                    $('#uploadedFoto').val(data.id);
                    $('#preview').attr('src',data.path).width('80%');
                    var height = $('#preview').width();
                    $('#preview').height(height/2);
                    $('#preview').width(height);

                } else {
                    $('#uploadedFoto').val(data.id);
                    $('#preview').attr('src',data.path).width('50%');
                    var height = $('#preview').width();
                    $('#preview').height(height);
                    $('#preview').width(height);
                }

            }

        });
    });

    // Ativa crop do quiz
    var $image = $('#cropper-quiz > img'),
        cropBoxData,
        canvasData;

    var ativaFoto = function (){
        $image.cropper({
            aspectRatio: 1,
            built: function () {
                // Strict mode: set crop box data first
                $image.cropper('setCropBoxData', cropBoxData);
                $image.cropper('setCanvasData', canvasData);
            },
            guides: false,
            crop: function(e) {
                $("#x-quiz-perfil").val(Math.round(e.x));
                $("#y-quiz-perfil").val(Math.round(e.y));
                $("#h-quiz-perfil").val(Math.round(e.height));
                $("#w-quiz-perfil").val(Math.round(e.width));
                $("#r-quiz-perfil").val(e.rotate);
                console.log(e);
            },
            built: function() {
                $(this).cropper('crop');
            }
        });
    };

    //destroi o cropper quando fecha a modal
    $('#cropper-quiz-modal').on('shown.bs.modal', function () {
    }).on('hidden.bs.modal', function () {
        cropBoxData = $image.cropper('getCropBoxData');
        canvasData = $image.cropper('getCanvasData');
        $image.cropper('destroy');
    });

    //quando clica no botao de subir foto constroi o cropper
    $('#btn-upload-img-quiz').on('click', function () {
        ativaFoto();
        $('#btn-crop-photo').show();
    });

    // Import image
    var $inputImage = $('#input-quiz-foto-perfil');
    var URL = window.URL || window.webkitURL;
    var blobURL;

    if (URL) {
      $inputImage.change(function () {
        var files = this.files;
        var file;
        ativaFoto();

        if (!$image.data('cropper')) {
          return;
        }

        if (files && files.length) {
          file = files[0];

          if (/^image\/\w+$/.test(file.type)) {
            blobURL = URL.createObjectURL(file);
            $image.one('built.cropper', function () {
              URL.revokeObjectURL(blobURL); // Revoke when load complete
            }).cropper('reset').cropper('replace', blobURL);
//            $inputImage.val('');
          } else {
            $body.tooltip('Please choose an image file.', 'warning');
          }
        }
      });
    } else {
      $inputImage.prop('disabled', true).parent().addClass('disabled');
    }

});
