var logaAcao = function(strTipo, strDesc, strUrl="", strExtra="") {
    var data = {
        strTipo : strTipo,
        strDesc : strDesc,
        strUrl : strUrl,
        strExtra : strExtra
    };

    $.ajax({
        url: '/logger/logaction',
        type: 'POST',
        data: data,
        complete: function (jqXHR, textStatus) {
            // callback
            console.log('complete')
        },
        success: function (data, textStatus, jqXHR) {
            // success callback
            console.log('success')
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // error callback
            console.log('error')
        }
    });
};
