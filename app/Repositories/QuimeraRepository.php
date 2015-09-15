<?php namespace App\Repositories;

class QuimeraRepository {

    public static function paramsToGet($params)
    {
        $output = '';
        foreach ($params as $key => $value) {
            if (is_array($value)) {
                $output .= self::paramsToGet($value);
            }
            else if (isset($value) && $value != '') {
                $output .= "{$key}={$value}&";
            }
        }
        $output = trim($output, '&');
        return $output;
    }
}