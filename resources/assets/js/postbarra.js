$( document ).ready(function() {
    $(".like-btn").click(function(){
        var href = $(this).prop("hash"),
            link = href.substr(1),
            urlArray = link.split('/'),
            idPost = urlArray[2];


        $.ajax({
    		url: link
    	})
    	.done(function(data) {
            var msgQtdCurtidas,
                qtdLikes = data;
            $("#barra-post-"+idPost).find("i").addClass('liked');
    	    if(qtdLikes > 1)
    			msgQtdCurtidas = qtdLikes+' Curtidas';
        	else if(qtdLikes == 1)
    			msgQtdCurtidas = qtdLikes+' Curtida';
        	else
                msgQtdCurtidas = 'Curtir';
            //Atualiza a quantidade de likes no span logo depois
            $("#barra-post-"+idPost).find("span.qtd-likes").html(msgQtdCurtidas);
    	})
    	.fail(function(data) {
    	  console.log('Erro no ajax de like');
        });


    });
});
