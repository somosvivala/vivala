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
            case 'hotel':
                return 'https://www.e-agencias.com.br/jano-hotels/api/search';
            case 'hotelDetail':
                return 'https://www.e-agencias.com.br/jano-hotels/api/details/hotel';
            case 'hotelAvaiability':
                return 'https://www.e-agencias.com.br/jano-hotels/api/details/availability';
        }
    }

    public static function processResponse($response, $type)
    {
        switch ($type) {
            case 'autocomplete':
                return self::_processAutocomplete($response);
            case 'trip':
                return self::_tripToHTML($response);
            case 'hotelscomplete':
                return self::_processHotelsComplete($response);
            case 'hotel':
                return self::_hotelToHTML($response);
            case 'autocompleteCars':
                return self::_processCarsComplete($response);
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
        return array(
            'data'  => json_decode($data)->items,
            'blade' => 'quimera._trips'
        );
    }

    private static function _processAutocomplete($data)
    {
        $cities   = array();
        $airports = array();

        $autocomplete = json_decode($data)->autocomplete;
        
        foreach ($autocomplete as $value) {
            if (strcasecmp($value->type, 'CITY') == 0) {
                array_push($cities, $value);
            } else {
                array_push($airports, $value);
            }
        }

        return array('data' => compact('airports', 'cities'), 'blade' => 'quimera._listAutocomplete');
    }

    private static function _processHotelsComplete($data)
    {
        $cities = array();
        $hotels = array();

        $autocomplete = json_decode($data);

        foreach ($autocomplete as $value) {
            if (strcasecmp($value->facet, 'CITY') == 0) {
                array_push($cities, $value);
            } else {
                array_push($hotels, $value);
            }   
        }

        return array('data' => compact('hotels', 'cities'), 'blade' => 'quimera._listAutocompleteHotels');
    }

    private static function _processCarsComplete($data)
    {
       $cities   = array();
        $airports = array();

        $autocomplete = json_decode($data)->autocomplete;
        
        foreach ($autocomplete as $value) {
            if (strcasecmp($value->type, 'city') == 0) {
                array_push($cities, $value);
            } else {
                array_push($airports, $value);
            }
        }

        return array('data' => compact('airports', 'cities'), 'blade' => 'quimera._listAutocompleteCars');
    }

    private static function _hotelToHTML($data)
    {
        return array(
            'data'  => json_decode($data)->items,
            'blade' => 'quimera._hotels'
        );
    }
}