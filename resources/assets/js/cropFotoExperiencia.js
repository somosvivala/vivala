$(function() {

    //token do laravel para ajax
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

    //Bindando o submit do form contido na modal de trocar foto
    $('#experiencia_foto_form').submit(function (ev) {
        ev.preventDefault();
        var frm = $(this),
            dataForm = new FormData(this),
            callbackFunction = frm.data('callback'),
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

                //se tiver dado certo
                if (data.success) {

                    var foto = data.foto;
                    //Settando o tamanho do container para o tamanho da nova imagem
                    $('#experiencia-foto-id').val(foto.id);
                    $('.experiencia-foto-atual').attr('src',foto.path);

                    $('.experiencia-foto-atual').height('100px');
                    $('.experiencia-foto-atual').width('100px');

                    swal('Sucesso', "Foto recortada", 'success');
                    $('#cropper-experiencia-modal').modal('hide');
                }


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

    // Ativa crop da experiencia 
    var $image = $('#cropper-experiencia > img'),
        cropBoxData,
        canvasData;

    var ativaFotoExperiencia = function (){
        $image.cropper({
            aspectRatio: 1,
            built: function () {
                // Strict mode: set crop box data first
                $image.cropper('setCropBoxData', cropBoxData);
                $image.cropper('setCanvasData', canvasData);
            },
            guides: false,
            crop: function(e) {
                $("#x-experiencia-perfil").val(Math.round(e.x));
                $("#y-experiencia-perfil").val(Math.round(e.y));
                $("#h-experiencia-perfil").val(Math.round(e.height));
                $("#w-experiencia-perfil").val(Math.round(e.width));
                $("#r-experiencia-perfil").val(e.rotate);
                console.log(e);
            },
            built: function() {
                $(this).cropper('crop');
            }
        });
    };

    //destroi o cropper quando fecha a modal
    $('#cropper-experiencia-modal').on('shown.bs.modal', function () {
    }).on('hidden.bs.modal', function () {
        cropBoxData = $image.cropper('getCropBoxData');
        canvasData = $image.cropper('getCanvasData');
        $image.cropper('destroy');
    });

    //quando clica no botao de subir foto constroi o cropper
    $('#btn-upload-img-experiencia').on('click', function () {
        console.log('clicou upload foto owner exp');
        ativaFotoExperiencia();
        $('#btn-crop-photo-experiencia').show();
    });

    // Import image
    var $inputImage = $('#input-experiencia-foto-perfil');
    var URL = window.URL || window.webkitURL;
    var blobURL;

    if (URL) {
      $inputImage.change(function () {
        var files = this.files;
        var file;
        ativaFotoExperiencia();

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



    var submitBtn = $('#experiencia-btn-submit input:submit'),
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
