// Troca os icones de like/dislike do POST se o user já tiver dado like/dislike antes
var trocaLikes = function (){
  var btn = document.getElementsByClassName('like-btn-post');

  if($(btn).hasClass("liked")){
    $(btn).children().removeClass('fa-heart-o').addClass('fa-heart');
  }
}

$(document).ready(function() {
  // Troca os icones de like/dislike do POST se o user já tiver dado like/dislike antes de tudo
  trocaLikes();

  var linguaAtiva = $("meta[name=language]").attr("content"),
      arrayLingua = [];

  // Tradução
  switch(linguaAtiva){
      case 'en':
          arrayLingua[0] = ' Likes';
          arrayLingua[1] = ' Like';
          arrayLingua[2] = ' Like';
          arrayLingua[3] = 'Do you want to share this post?',
          arrayLingua[4] = 'Yes, wanna share!',
          arrayLingua[5] = 'No',
          arrayLingua[6] = "Ops!",
          arrayLingua[7] = "You can't share your own post!"
      break;
      case 'pt':
          arrayLingua[0] = ' Curtidas';
          arrayLingua[1] = ' Curtida';
          arrayLingua[2] = ' Curtir';
          arrayLingua[3] = 'Você quer compartilhar esse post?',
          arrayLingua[4] = 'Sim, compartilhar!',
          arrayLingua[5] = 'Não',
          arrayLingua[6] = "Opa!",
          arrayLingua[7] = "Você não pode compartilhar seu próprio post!"
      break;
      default:
          arrayLingua[0] = ' Curtidas';
          arrayLingua[1] = ' Curtida';
          arrayLingua[2] = ' Curtir';
          arrayLingua[3] = 'Você quer compartilhar esse post?',
          arrayLingua[4] = 'Sim, compartilhar!',
          arrayLingua[5] = 'Não',
          arrayLingua[6] = "Opa!",
          arrayLingua[7] = "Você não pode compartilhar seu próprio post!"
  }

  //Like
  $(".like-btn-post").click(function() {
    var href = $(this).prop("hash"),
      link = href.substr(1),
      urlArray = link.split('/'),
      idPost = urlArray[2];

    $.ajax({
        url: '/'+link,
        type: 'GET',
        dataType: "json"
      })
      .done(function(data) {
        var msgQtdCurtidas,
          qtdLikes = data.qtdLikes,
          tipoLikeUser = data.tipoLikeUser;
        // TESTE - Mostro no log se deu certo
        console.log($("#barra-post-" + idPost).find(".like-btn-post+span.qtd-likes"));

        //testar se like/unlike e settar o icone correto
         if(tipoLikeUser){
           $("#barra-post-" + idPost + " .like-btn-post").addClass('liked');
           $("#barra-post-" + idPost + " .like-btn-post i").removeClass('fa-heart-o').addClass('fa-heart');
         }
         else{
           $("#barra-post-" + idPost + " .like-btn-post").removeClass('liked');
           $("#barra-post-" + idPost + " .like-btn-post i").removeClass('fa-heart').addClass('fa-heart-o');
        }
        if (qtdLikes > 1)
          msgQtdCurtidas = qtdLikes + arrayLingua[0];
        else if (qtdLikes == 1)
          msgQtdCurtidas = qtdLikes + arrayLingua[1];
        else
          msgQtdCurtidas = arrayLingua[3];

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
                      title: arrayLingua[3],
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#14CC74",
                      confirmButtonText: arrayLingua[4],
                      cancelButtonText: arrayLingua[5],
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
                                  title: arrayLingua[6],
                                  text: arrayLingua[7],
                                  type: "error",
                                  confirmButtonColor: "#DD6B55",
                                  confirmButtonText: "OK"
                              });
                          });

                          }
                  });
    });
  });
