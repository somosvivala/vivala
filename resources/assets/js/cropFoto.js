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

                               //console.log('preview width -> ' +  $('#preview').width());
                //console.log('height -> ' +  height );
                //console.log($('#preview').height());

                //swal(null, "Foto atualizada com sucesso", 'success');

            }
        });
    });

    // Ativa crop do quiz
    var $image = $('#cropper-quiz > img'),
        cropBoxData,
        canvasData;

    $('#cropper-quiz-modal').on('shown.bs.modal', function () {
        $image.cropper({
            autoCropArea: 1,
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
            }
        });
    }).on('hidden.bs.modal', function () {
        cropBoxData = $image.cropper('getCropBoxData');
        canvasData = $image.cropper('getCanvasData');
        $image.cropper('destroy');
    });

    // Import image
    var $inputImage = $('#input-quiz-foto-perfil');
    var URL = window.URL || window.webkitURL;
    var blobURL;

    if (URL) {
      $inputImage.change(function () {
        var files = this.files;
        var file;

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
