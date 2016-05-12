<?php

/**
 * Arquivo para guardar constantes que serao usadas pelo Logger,
 * por enquanto as informacoes que utilizamos para cada tipo de evento a ser registrado sao:
 *
 * @TIPO - string para identificar qual acao e posteriormente filtrar atraves dela.
 * @DESCRICAO - string para descrever a acao que ocorreu (usada na listagem da tela admin)
 */


return [
    //constante para quando ocorre uma busca na clickbus
    'clickbus_tipo_busca' => 'clickbus_busca',
    'clickbus_desc_busca' => ' fez uma busca de passagem rodoviaria',

    //constante para quando alguem chega até a tela de checkout de uma passagem rodoviaria
    'clickbus_tipo_checkout' => 'clickbus_checkout',
    'clickbus_desc_checkout' => ' chegou até a tela de checkout da clickbus',

    //constante para quando alguem finaliza uma compra da clickbus
    'clickbus_tipo_compra' => 'clickbus_compra',
    'clickbus_desc_compra' => ' fechou uma compra de passagem rodoviaria',

];
