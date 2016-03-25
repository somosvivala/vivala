<?php

namespace app\Repositories;

use Jenssegers\Date\Date;

class ClickBusRepository
{
    public static $apiKey = '$2y$05$32207918184a424e2c8ccujmuryCN3y0j28kj0io2anhvd50ryln6';
    public static $url = 'https://api-evaluation.clickbus.com.br/api/v1';
    public static $FLAG_PAGAMENTO_CONFIRMADO = 'payment_confirmed';
    public static $FLAG_PAGAMENTO_PENDENTE = 'order_finalized_successfully';
    public static $FLAG_PASSAGEM_CANCELADA = 'order_canceled';

    // Função de Tratamento do formato da Data na Busca por Ônibus da ClickBus
    public static function dateFormat($date)
    {
        $date = explode('/', $date);

        return "{$date[2]}-{$date[1]}-{$date[0]}";
    }

    // Função de Tratamento da Busca por Ônibus da ClickBus
    public static function parseData($data)
    {
        $output = [];

        foreach ($data->items as $item) {
            $option = [];
            $option['from'] = $item->from;
            $option['to'] = $item->to;
            $option['part'] = [];
            foreach ($item->parts as $value) {
                $part = [];
                $part['serviceClass'] = $value->bus->serviceClass;
                $part['trip'] = $value->trip_id;
                $part['busCompany'] = (array) $value->busCompany;
                $part['availableSeats'] = $value->availableSeats;
                $part['price'] = self::parcePrice($value->arrival->price);
                $part['id'] = $value->arrival->waypoint->schedule->id;

                $part['duration'] = self::getDuration(
                    $value->arrival->waypoint->schedule->date,
                    $value->arrival->waypoint->schedule->time,
                    $value->departure->waypoint->schedule->date,
                    $value->departure->waypoint->schedule->time
                );

                $part['arrival'] = [];
                $part['arrival']['id'] = $value->arrival->waypoint->id;
                $part['arrival']['city'] = $value->arrival->waypoint->place->city;
                $part['arrival']['time'] = $value->arrival->waypoint->schedule->time;

                $part['departure'] = [];
                $part['departure']['id'] = $value->departure->waypoint->id;
                $part['departure']['city'] = $value->departure->waypoint->place->city;
                $part['departure']['time'] = $value->departure->waypoint->schedule->time;

                array_push($option['part'], $part);
            }
            array_push($output, $option);
        }

        return $output;
    }

    // Função de Tratamento de Erros da ClickBus
    public static function parseError($data)
    {
        if (!isset($data)) {
            $data = new \stdClass();
            $data->error[] = new \stdClass();
            $data->error[0]->code = 'L25';
        }

        // Estou no ambiente de produção (MASTER)
        if (app()->environment('production')) {
            $opt1 = [
                'errors' => trans('clickbus.clickbus_prod-error-'.$data->{'error'}[0]->{'code'}),
            ];

        // Último caso para ambiente de desenvolvimento (DEV) ou local
        } else {
            $opt1 = [
                'errors' => trans('clickbus.clickbus_error-'.$data->{'error'}[0]->{'code'}),
            ];
        }

        for ($i = 1; $i < 10; ++$i) {
            $opt2['errors'.$i] = trans('clickbus.clickbus_misc-error-'.$i);
        }
        // Merge de array MISC com mensagens para o JS + mensagem de erro vinda da CLickBus
        $option = array_merge($opt1, $opt2);

        return $option;
    }

    public static function getPrettyDates($date)
    {
        $date = new Date($date);
        $today = [strtoupper($date->format('d M')), ucfirst($date->format('l')), $date->format('d/m/Y')];

        $date->modify('+1 day');
        $tomorrow = [strtoupper($date->format('d M')), ucfirst($date->format('l')), $date->format('d/m/Y')];

        $date->modify('-2 days');
        $yesterday = [strtoupper($date->format('d M')), ucfirst($date->format('l')), $date->format('d/m/Y')];

        return ['yesterday' => $yesterday, 'today' => $today, 'tomorrow' => $tomorrow];
    }

    private static function parcePrice($price)
    {
        $price /= 100;

        return number_format((float) $price, 2, ',', '');
    }

    private static function getDuration($arrivalDate, $arrivalTime, $departureDate, $departureTime)
    {
        $departure = new Date("{$departureDate} {$departureTime}:00");
        $arrival = new Date("{$arrivalDate} {$arrivalTime}:00");
        $interval = $departure->diff($arrival);

        return [$interval->h, $interval->i];
    }

    /**
     * Bate no endpoint de /order e retorna os dados do pedido.
     *
     * @param $idOrder - uuid da ClickBus que identifica a Order
     * @return O objeto "content" da resposta da clickbus
     */
    public static function getOrder($idOrder)
    {
        $context = [
            'http' => [
                'ignore_errors' => true,
                'method' => 'GET',
                'header' => 'X-API-KEY:'.self::$apiKey,
                ],
        ];

        $context = stream_context_create($context);
        $result = file_get_contents(self::$url.'/order/'.$idOrder, false, $context);
        $decoded = json_decode($result);

        return $decoded->content;
    }

    /**
     * Metodo para validar se o pagamento foi confirmado
     *
     * @param $obj - O objeto retornado pelo ClickBusRepository::getOrders($idOrder)
     * @return boolean - se o pagamento foi confirmado
     */
    public static function confirmaPagamentoFinalizado($obj)
    {
        $pagamentoFoiConfirmado = $obj->{"status"} == self::$FLAG_PAGAMENTO_CONFIRMADO;
        return $pagamentoFoiConfirmado;
    }

    /**
     * Metodo para validar se a passagem foi cancelada
     *
     * @param $obj - O objeto retornado pelo ClickBusRepository::getOrders($idOrder)
     * @return boolean - se a passagem foi cancelada
     */
    public static function confirmaPassagemCancelada($obj)
    {
        $passagemFoiCancelada = $obj->{"status"} == self::$FLAG_PASSAGEM_CANCELADA;
        return $passagemFoiCancelada;
    }

    /*
     * Metodo para retornar todas as orders da clickbus
     * a partir de $pagination (ver http://docs.clickbus.com.br/#order-details-get-order-list)
     *
     * @param $pagination - identifica a pagina para se começar
     */
    public static function getOrders($pagination=1)
    {
        $context = [
            'http' => [
                'ignore_errors' => true,
                'method' => 'GET',
                'header' => 'X-API-KEY:'.self::$apiKey,
                ],
        ];

        $context = stream_context_create($context);
        $result = file_get_contents(self::$url.'/order'."?page=".$pagination, false, $context);

        $decoded = json_decode($result);

        return $decoded->{"items"};
    }

    /**
     * Metodo para alimentar a tabela de relatórios com todas as compras realizadas
     *
     * @return boolean - se as compras foram inseridas com sucesso
     */
    public static function gerarRelatorioCompras()
    {
        $existemCompras = true;
        $indice = 0;
        while ($existemCompras) {
            $orders = self::getOrders(++$indice);
            $existemCompras = (count($orders) > 0);

            //iterando sob as orders para persisti-las
            foreach ($orders as $ordem) {

                //pegando valores para persistir no bd
                $localizer = $ordem->{'localizer'};
                $rota_origem = $ordem->{'rota_origem'};
                $rota_destino = $ordem->{'rota_destino'};
                $buyer_firstname = $ordem->{'buyer_firstname'};
                $buyer_lastname = $ordem->{'buyer_lastname'};
                $buyer_email = $ordem->{'buyer_email'};
                $payment_method = $ordem->{'payment_method'};
                $order_created_at = $ordem->{'order_created_at'};
                $order_updated_at = $ordem->{'order_updated_at'};
                $clickbus_order_id = $ordem->{'clickbus_order_id'};
                $quantidade_bilhete = $ordem->{'quantidade_bilhetes'};

                RelatorioCompraClickbus::create([
                    'localizer' => $localizer,
                    'rota_origem' => $rota_origem,
                    'rota_destino' => $rota_destino,
                    'buyer_firstname' => $buyer_firstname,
                    'buyer_lastname' => $buyer_lastname,
                    'buyer_email' => $buyer_email,
                    'payment_method' => $payment_method,
                    'order_created_at' => $order_created_at,
                    'order_updated_at' => $order_updated_at,
                    'clickbus_order_id' => $clickbus_order_id,
                    'quantidade_bilhetes' => $quantidade_bilhetes
                ]);
            }
        }
    }
}

