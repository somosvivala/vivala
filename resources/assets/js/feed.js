
var bindaLoadMore = function() {
    //ajax para like do comentario
    $("#load-more-posts").click(function(){
        var pagina = $(this).data("pagina");

        $.ajax({
            url: '/feed/posts/'+pagina
        })
        .done(function(data) {
          $(".wrapper-loadmore").addClass('liked');
          $("ul.lista-posts").parent().append(data);
        })
        .fail(function(data) {
                 console.log('Sem posts. ');
        });
    });
};

$(function() {
    bindaLoadMore();
});
