$(function() {
    console.log($("a.desativado"));
    $("a.desativado").on("click", function (e) {
        e.preventDefault();
        location.href = "/paginas/financiamentocoletivo";
    });
});
