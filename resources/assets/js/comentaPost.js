var commentPost = function() {
    console.log (' /comentario/ultimoscomentarios/$idPost ');
    alert('comentario criado');
};


$(function() {
  //ajax para like do comentario
  $(".like-btn-comentario").click(function(){
    var href = $(this).prop("hash"),
        link = href.substr(1),
        urlArray = link.split('/'),
        idComentario = urlArray[2];
    $.ajax({
	    url: link
    })
    .done(function(data) {
      var msgQtdCurtidas,
          qtdLikes = data;
      $("#barra-comentario-"+idComentario+" .like-btn-comentario").addClass('liked');
	    if(qtdLikes > 1)
        msgQtdCurtidas = qtdLikes+' Curtidas';
    	else if(qtdLikes == 1)
        msgQtdCurtidas = qtdLikes+' Curtida';
    	else
        msgQtdCurtidas = 'Curtir';
      //Atualiza a quantidade de likes no span logo depois
      $("#barra-comentario-"+idComentario).find("span.qtd-likes").html(msgQtdCurtidas);
    })
    .fail(function(data) {
	     console.log('Erro no ajax de like');
    });
  });
});
