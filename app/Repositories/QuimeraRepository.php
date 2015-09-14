<?php namespace App\Repositories;

class QuimeraRepository {

    public static function paramsToGet($params)
    {
        $output = '';
        foreach ($params as $key => $value) {
            $output .= "{$key}={$value}";
        }
        return $output;
    }
}