$(function() {

    //token do laravel para ajax
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

    /** Funcões para Upload */
    $('#owner-experiencia_foto_form').submit(function (ev) {
        ev.preventDefault();
        var frm = $(this),
            dataForm = new FormData(this),
            callbackFunction = frm.data('callback'),
            redirect = frm.data('redirect'),
            loading = frm.data('loading');

        if (loading && loading != "") {
            $(this).find('input:submit').hide();
            $(this).find('#'+loading).show();
        }

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: dataForm,
            contentType: false, //file
            processData: false,  //file
            success: function (data) {
                console.log("voltou do cropfotoexperiencia data:");
                console.log(data);

                //Settando o tamanho do container para o tamanho da nova imagem
                $('#uploadedFoto').val(data.id);
                $('.owner-experiencia-foto-atual').attr('src',data.path).width('50%');
                var height = $('.owner-experiencia-foto-atual').width();
                $('.owner-experiencia-foto-atual').height(height);
                $('.owner-experiencia-foto-atual').width(height);

               swal('Sucesso', "Foto recortada", 'success');
               $('#cropper-owner-experiencia-modal').modal('hide');


            },
            complete: function (data) {

                //Caso tenha o loading icon, esconde-lo e voltar botão
                if (loading && loading != "") {
                    $(frm).find('input:submit').show();
                    $(frm).find('#'+loading).hide();
                }
            }
        });
    });

    // Ativa crop da owner-experiencia 
    var $image = $('#cropper-owner-experiencia > img'),
        cropBoxData,
        canvasData;

    var ativaFotoOwnerExperiencia = function (){
        $image.cropper({
            aspectRatio: 1,
            built: function () {
                // Strict mode: set crop box data first
                $image.cropper('setCropBoxData', cropBoxData);
                $image.cropper('setCanvasData', canvasData);
            },
            guides: false,
            crop: function(e) {
                $("#x-owner-experiencia-perfil").val(Math.round(e.x));
                $("#y-owner-experiencia-perfil").val(Math.round(e.y));
                $("#h-owner-experiencia-perfil").val(Math.round(e.height));
                $("#w-owner-experiencia-perfil").val(Math.round(e.width));
                $("#r-owner-experiencia-perfil").val(e.rotate);
                console.log(e);
            },
            built: function() {
                $(this).cropper('crop');
            }
        });
    };

    //destroi o cropper quando fecha a modal
    $('#cropper-owner-experiencia-modal').on('shown.bs.modal', function () {
    }).on('hidden.bs.modal', function () {
        cropBoxData = $image.cropper('getCropBoxData');
        canvasData = $image.cropper('getCanvasData');
        $image.cropper('destroy');
    });

    //quando clica no botao de subir foto constroi o cropper
    $('#btn-upload-img-owner-experiencia').on('click', function () {
        console.log('clicou upload foto owner exp');
        ativaFotoOwnerExperiencia();
        $('#btn-crop-photo').show();
    });

    // Import image
    var $inputImage = $('#input-owner-experiencia-foto-perfil');
    var URL = window.URL || window.webkitURL;
    var blobURL;

    if (URL) {
      $inputImage.change(function () {
        var files = this.files;
        var file;
        ativaFotoOwnerExperiencia();

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
          } else {
            $body.tooltip('Please choose an image file.', 'warning');
          }
        }
      });
    } else {
      $inputImage.prop('disabled', true).parent().addClass('disabled');
    }



    var submitBtn = $('#owner-experiencia-btn-submit input:submit'),
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
