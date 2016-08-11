$(document).ready(function() {
  //Like
  $(".like-btn-post").click(function() {
    var href = $(this).prop("hash"),
      link = href.substr(1),
      urlArray = link.split('/'),
      idPost = urlArray[2];

    $.ajax({
        url: '/'+link,
        type: 'GET',
        dataType: 'json'
      })
      .done(function(data) {
        var msgQtdCurtidas,
          qtdLikes = data.qtdLikes,
          tipoLikeUser = data.tipoLikeUser;

        // Testar se like/unlike e settar o icone correto
         if(tipoLikeUser){
           $("#barra-post-"+idPost+" .like-btn-post").addClass('liked');
           $("#barra-post-"+idPost+" .like-btn-post i").removeClass('fa-heart-o').addClass('fa-heart');
         }
         else{
           $("#barra-post-"+idPost+" .like-btn-post").removeClass('liked');
           $("#barra-post-"+idPost+" .like-btn-post i").removeClass('fa-heart').addClass('fa-heart-o');
        }
        if (qtdLikes > 1)
          msgQtdCurtidas = qtdLikes + lingua[0];
        else if (qtdLikes == 1)
          msgQtdCurtidas = qtdLikes + lingua[1];
        else
          msgQtdCurtidas = lingua[2];
        //Atualiza a quantidade de likes no span logo depois
        $("#barra-post-"+idPost).find(".like-btn-post+span.qtd-likes").html(msgQtdCurtidas);
      })
      .fail(function(data) {
        console.log('[ERRO] Erro no ajax de like-post');
      });
  });


  //Share
  $(".share-btn").click(function() {
      var href = $(this).prop("hash"),
          link = href.substr(1),
              urlArray = link.split('/'),
                  idPost = urlArray[2];

                  swal({
                    title: lingua[23],
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: corAmareloPrimario,
                    confirmButtonText: lingua[24],
                    cancelButtonText: lingua[25],
                    closeOnConfirm: true,
                    closeOnCancel: true
                  },
                  function(isConfirm){
                      if (isConfirm) {

                          $.ajax({
                              url: '/'+link
                          })
                           .done(function(data) {
                              location.reload();
                          })
                           .fail(function(data) {
                               swal({
                                  title: lingua[26],
                                  text: lingua[27],
                                  type: 'error',
                                  confirmButtonColor: corVermelhoPrimario,
                                  confirmButtonText: 'OK'
                              });
                          });

                          }
                  });
    });
  });
