$( document ).ready(function() {
    $(".like-btn").click(function(){
    console.log( $(this).prop("hash"));
        var href = $(this).prop("hash");
        var link = href.substr(1);

        $.ajax({
    		url: link
    	})
    	.done(function(data) {
            $(this).find("i").addClass('liked');
    	})
    	.fail(function(data) {
    	  console.log('Erro no ajax de like');
        });


    });
});
