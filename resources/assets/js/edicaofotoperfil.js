/* Trocar essa merda de função por jquery */
  function verificaRecorteImagem(evt) {

    if(
      jQuery('#wJcropPerfil').val() == 0 ||
      jQuery('#hJcropPerfil').val() == 0
      )
    {
      alert('Ops, nada para recortar, voce delimitou uma area dentro da nova imagem?');
      return false;
    }
  };
$(function(){

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
    // Pega arquivo que foi selecionado
    var oFile = $('#image_file_upload')[0].files[0];
    console.log(oFile);
    // Esconde o div de erros
    $('.erros').hide();
    // Filtra imagens que não são png ou jpg
    var rFilter = /^(image\/jpeg|image\/png)$/i;
    if (! rFilter.test(oFile.type)) {
      $('.erros').html('Por favor selecione um formato válido (jpg ou png).').show();
      return;
    }

    // Tamanho max = 2MB
    if (oFile.size > 2048 * 1024) {
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
          $('#preview').width(oImage.naturalWidth);
          $('#preview').height(oImage.naturalHeight);
        }

        // Seta o JCrop pra imagem
        $('#preview').Jcrop({
          aspectRatio: 1,
          minSize: [ 100, 100 ],
          onSelect: updateCoords,
          onSelect: updateCoords,
          bgFade: true,
          bgOpacity: .3,
          trueSize: [oImage.naturalWidth,oImage.naturalHeight]
        }, function(){
          // Store the Jcrop API in the jcrop_api variable
          jcrop_api = this;
        });

      };
    };

    // read selected file as DataURL
    oReader.readAsDataURL(oFile);
  };


  $( "#image_file_upload" ).change(function() {
    fotoUploadHandler();
  });

});
