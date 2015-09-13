/*
  Funções de comentário dos Posts.
  Envia o comentario por ajax e atualiza o conteúdo da div,
  com todos os comentários do post.
*/



var bindaLikeComentario = function() {
    //ajax para like do comentario
    $(".like-btn-comentario").click(function(){
        var href = $(this).prop("hash"),
            link = href.substr(1),
            urlArray = link.split('/'),
            idComentario = urlArray[2];

        console.log(link);
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
          $("#barra-comentario-"+idComentario).find(".like-btn-comentario+span.qtd-likes").html(msgQtdCurtidas);
        })
        .fail(function(data) {
                 console.log('Erro no ajax de like');
        });
    });
};

var commentPost = function(idPost) {
    $.ajax({
      url: "/postajax/"+idPost+"/comentarios"
    })
    .done(function(data) {
      var comentariosWrapper = $('li.post[data-id="'+idPost+'"] div.comentarios').parent();
      console.log('li.post[data-id="'+idPost+'"]');
      comentariosWrapper.html(data);
      bindaLikeComentario();
    });
};

$(function() {
    bindaLikeComentario();
});
