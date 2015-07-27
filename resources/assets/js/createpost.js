$( document ).ready(function() {
    $('#fileupload').fileupload({
        dataType: 'json',
        add: function (e, data) {
            data.context = $('<p/>').text('Uploading...').appendTo(document.body);
            data.submit();
        },
        done: function (e, data) {
            data.context.text('Upload finished.');

            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo(document.body);
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress-photo-upload .bar').css(
                'width',
                progress + '%'
            );
        }
    });

    // Bind de clique dos radio buttons
    // Exibe o campo de adicionar fotos quando clica em Adicionar Foto
    $('.tipo-post-criar input:radio[name="tipoPost"]').change(function(){
        if ($(this).val() == 'foto') {
            $('.adicionar-foto-container').show();
        }
        else {
            $('.adicionar-foto-container').hide();
        }
    });
});
