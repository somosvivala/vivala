<?php

/**
 * Arquivo para guardar constantes que serao usadas pelo Logger,
 * por enquanto as informacoes que utilizamos para cada tipo de evento a ser registrado sao:
 *
 * @TIPO - string para identificar qual acao e posteriormente filtrar atraves dela.
 * @DESCRICAO - string para descrever a acao que ocorreu (usada na listagem da tela admin)
 */


return [
    /*** CLICKBUS ***/
        //constante para quando ocorre uma busca na clickbus
        'clickbus_tipo_busca' => 'clickbus_busca',
        'clickbus_desc_busca' => ' fez uma busca de passagem rodoviaria',

        //constante para quando alguem chega até a tela de checkout de uma passagem rodoviaria
        'clickbus_tipo_checkout' => 'clickbus_checkout',
        'clickbus_desc_checkout' => ' chegou até a tela de checkout da clickbus',

        //constante para quando alguem finaliza uma compra da clickbus
        'clickbus_tipo_compra' => 'clickbus_compra',
        'clickbus_desc_compra' => ' fechou uma compra de passagem rodoviaria',

    /*** BARRA LATERAL ***/
        //constante para quando alguem clica na barra lateral em passagens aereas
        'barralateral_tipo_voos' => 'barralateral_voos',
        'barralateral_desc_voos' => ' clicou em passagens aéreas na barra lateral ',

        //constante para quando alguem clica na barra lateral em hospedagem
        'barralateral_tipo_hospedagem' => 'barralateral_hospedagem',
        'barralateral_desc_hospedagem' => ' clicou em hospedagem na barra lateral ',

        //constante para quando alguem clica na barra lateral em pacotes
        'barralateral_tipo_pacotes' => 'barralateral_pacotes',
        'barralateral_desc_pacotes' => ' clicou em pacotes na barra lateral ',

        //constante para quando alguem clica na barra lateral em restaurantes
        'barralateral_tipo_restaurantes' => 'barralateral_restaurantes',
        'barralateral_desc_restaurantes' => ' clicou em restaurantes na barra lateral ',
];
