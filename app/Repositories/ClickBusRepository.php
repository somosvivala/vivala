<?php namespace App\Repositories;

class ClickBusRepository {

    public static function dateFormat($date)
    {
        $date = explode("/", $date);
        return "{$date[2]}-{$date[1]}-{$date[0]}";
    }
}