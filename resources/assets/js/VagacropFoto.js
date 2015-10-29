$(function() {

    //token do laravel para ajax
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

    /** Funcões para Upload */
    $('#vaga_foto_form').submit(function (ev) {
   // console.log('entrou submit form!!!');
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
                //console.log("Sucess do ajax");

                //Settando o tamanho do container para o tamanho da nova imagem
                var tipo = $('#tipo_foto');
                if (tipo && tipo.val() == 'capa') {
                    $('#uploadedFoto').val(data.id);
                    $('.vaga-foto-atual').attr('src',data.path).width('80%');
                    var height = $('.vaga-foto-atual').width()*0.5625;
                    $('.vaga-foto-atual').height(height);

                } else {
                    $('#uploadedFoto').val(data.id);
                    $('.vaga-foto-atual').attr('src',data.path).width('50%');
                    var height = $('.vaga-foto-atual').width();
                    $('.vaga-foto-atual').height(height);
                    $('.vaga-foto-atual').width(height);
                }   

                //console.log('vaga-foto-atual width -> ' +  $('#vaga-foto-atual').width());
                //console.log('height -> ' +  height );
                //console.log($('#vaga-foto-atual').height());

               swal('Sucesso', "Foto recortada", 'success');
               $('#cropper-vaga-modal').modal('hide');


            }
        });
    });

    // Ativa crop da vaga 
    var $image = $('#cropper-vaga > img'),
        cropBoxData,
        canvasData;

    var ativaFoto = function (){
        $image.cropper({
            aspectRatio: 16 / 9,
            built: function () {
                // Strict mode: set crop box data first
                $image.cropper('setCropBoxData', cropBoxData);
                $image.cropper('setCanvasData', canvasData);
            },
            guides: false,
            crop: function(e) {
                $("#x-vaga-perfil").val(Math.round(e.x));
                $("#y-vaga-perfil").val(Math.round(e.y));
                $("#h-vaga-perfil").val(Math.round(e.height));
                $("#w-vaga-perfil").val(Math.round(e.width));
                $("#r-vaga-perfil").val(e.rotate);
                console.log(e);
            },
            built: function() {
                $(this).cropper('crop');
            }
        });
    };

    //destroi o cropper quando fecha a modal
    $('#cropper-vaga-modal').on('shown.bs.modal', function () {
    }).on('hidden.bs.modal', function () {
        cropBoxData = $image.cropper('getCropBoxData');
        canvasData = $image.cropper('getCanvasData');
        $image.cropper('destroy');
    });

    //quando clica no botao de subir foto constroi o cropper
    $('#btn-upload-img-vaga').on('click', function () {
        ativaFoto();
        $('#btn-crop-photo').show();
    });

    // Import image
    var $inputImage = $('#input-vaga-foto-perfil');
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
