$(function() {

    // Função que pergunta se tem notificacoes de follow
    var temNovasNotificacoesFollow = function() {
        $.ajax({
           url: '/notificacoes/checarnovas/seguidor'
        }).done(function (data){
            var qtdNovas = data;
            // Puxa o html das novas notificacoes
            $.ajax({
                url: '/notificacoes/notificacoesfollow'
            }).done(function (data) {
                // Atualiza a caixa de notificações (html)
                $("div.notificacoes-follow").html(data);
                // Atualiza a quantidade de notificações
                $("button#notificacoes-follow").attr("data-unread", qtdNovas);
            });
        });
    },

    // Função que pergunta se tem notificacoes gerais
    temNovasNotificacoesGeral = function() {
        $.ajax({
           url: '/notificacoes/checarnovas/'
        }).done(function (data){
            var qtdNovas = data;
            // Puxa o html das novas notificacoes
            $.ajax({
                url: '/notificacoes/notificacoesgeral'
            }).done(function (data) {
                // Atualiza a caixa de notificações (html)
                $("div.notificacoes-geral").html(data);
                // Atualiza a quantidade de notificações
                $("button#notificacoes-geral").attr("data-unread", qtdNovas);
            });
        });
    },

    // Executa todas as funções de notificacao
    temNotificacoes = function() {
        temNovasNotificacoesFollow();
        temNovasNotificacoesGeral();
    };
    temNotificacoes();

    // Verifica se tem novas notificacoes a cada minuto
    setInterval(temNotificacoes, (60000*3));

    // binda o clique dos botões de notificação para mark all as read
    $("button#notificacoes-follow").click(function() {
        $.ajax({
            url: '/notificacoes/marcartodascomolidas/seguidor'
        }).done(function (data) {
            $("button#notificacoes-follow").attr("data-unread", 0);
        });
    });

    // binda o clique dos botões de notificação para mark all as read
    $("button#notificacoes-geral").click(function() {
        $.ajax({
            url: '/notificacoes/marcartodascomolidas/'
        }).done(function (data) {
            $("button#notificacoes-geral").attr("data-unread", 0);
        });
    });
});
