$( document ).ready(function() {
    $('.fileupload-container #fileupload').fileupload({
        dataType: 'json',
        add: function (e, data) {
            console.log(data);
            data.submit();
        },
        done: function (e, data) {
            var idFoto = data.result.id;
            console.log(data.result.id);
            $(".fileupload-container #fotos").val(data.result.id);
            /*
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo(document.body);
            });*/
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress-photo-upload .bar').css(
                'width',
                progress + '%'
            );
        }
    });

});
