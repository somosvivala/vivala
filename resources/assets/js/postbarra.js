$(document).ready(function() {

  //Like
  $( ".like-btn-post").click(function() {
    var href = $(this).prop("hash"),
      link = href.substr(1),
      urlArray = link.split('/'),
      idPost = urlArray[2];

    $.ajax({
        url: '/'+link
      })
      .done(function(data) {

        console.log($("#barra-post-" + idPost).find(".like-btn-post+span.qtd-likes"));
        var msgQtdCurtidas,
          qtdLikes = data;
        $("#barra-post-" + idPost + " .like-btn-post").addClass('liked');
        if (qtdLikes > 1)
          msgQtdCurtidas = qtdLikes + ' Curtidas';
        else if (qtdLikes == 1)
          msgQtdCurtidas = qtdLikes + ' Curtida';
        else
          msgQtdCurtidas = 'Curtir';
        //Atualiza a quantidade de likes no span logo depois
        $("#barra-post-" + idPost).find(".like-btn-post+span.qtd-likes").html(msgQtdCurtidas);
      })
      .fail(function(data) {
        console.log('Erro no ajax de like');
      });
  });


  //Share
  $(".share-btn").click(function() {
      var href = $(this).prop("hash"),
          link = href.substr(1),
              urlArray = link.split('/'),
                  idPost = urlArray[2];

                  swal({   
                      title: "Você quer compartilhar esse post?",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#14CC74",
                      confirmButtonText: "Sim, compartilhar!",
                      cancelButtonText: "Não",
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
                                  title: "Ops!",
                                  text: "Você não pode compartilhar seu próprio post!",
                                  type: "error",
                                  confirmButtonColor: "#DD6B55",
                                  confirmButtonText: "OK"
                              });
                          });

                          }
                  });
    });
  });
