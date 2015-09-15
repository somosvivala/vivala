<?php namespace App\Repositories;

class QuimeraRepository {

    public static function serializeParams($params, $prefix = null)
    {
        $output = '';
        foreach ($params as $key => $value) {
            if (is_array($value)) {
                $output .= self::serializeParams($value, $key);
            }
            else if (isset($value) && $value != '') {
                $output .= (isset($prefix)) ? "{$prefix}.{$key}={$value}&" : "{$key}={$value}&";
            }
        }
        $output = trim($output, '&');
        return $output;
    }

    public static function urlDecoder($type)
    {
        switch ($type) {
            case 'autocomplete':
                return 'https://www.e-agencias.com.br/jano-flights/api/autocomplete/cities_airports';
            case 'hotelscomplete':
                return 'https://www.e-agencias.com.br/jano-hotels/autocomplete';
            case 'trip':
                return 'https://www.e-agencias.com.br/jano-flights/api/flights';
        }
    }

    public static function processResponse($response, $type)
    {
        switch ($type) {
            case 'autocomplete':
                return self::_processAutocomplete($response);
            case 'trip':
                return self::_tripToHTML($response);
        }
    } 

    public static function createHeader($method, $headers)
    {
        $output = '';
        foreach ($headers as $key => $value) {
            $output .= "{$key}: {$value}\r\n";
        }
        $options = array(
            'http'=>array(
                'method'=> strtoupper($method),
                'header'=> $output
            )
        );

        return stream_context_create($options);
    }

    private static function _tripToHTML($data)
    {
        $data = json_decode($data);
        return json_encode($data->items);
    }

    private static function _processAutocomplete($data)
    {
        return json_encode(json_decode($data)->autocomplete);
    }
}