
var bindaLoadMore = function() {
    //ajax para like do comentario
    $("#load-more-posts").click(function(){
        var pagina = $(this).data("pagina");

        $.ajax({
            url: '/feed/posts/'+pagina
        })
        .done(function(data) {
          $(".wrapper-loadmore").remove();
          $("ul.lista-posts").parent().append(data);
          bindaLoadMore();
        })
        .fail(function(data) {
                 console.log('Sem posts. ');
        });
    });
};

$(function() {
    bindaLoadMore();
});
