<?php namespace App\Repositories;

use Jenssegers\Date\Date;

class ClickBusRepository {

    public static function dateFormat($date)
    {
        $date = explode("/", $date);
        return "{$date[2]}-{$date[1]}-{$date[0]}";
    }

    public static function parseData($data)
    {
        $output = [];

        foreach ($data->items as $item) {
            $option = [];
            foreach ($item->parts as $value) {
                $part = [];
                $part['serviceClass']   = $value->bus->serviceClass;
                $part['trip']           = $value->trip_id;
                $part['busCompany']     = $value->busCompany;
                $part['availableSeats'] = $value->availableSeats;
                $part['price']          = ($value->arrival->price) / 10;

                $part['arrival'] = [];
                $part['arrival']['id']   = $value->arrival->waypoint->id;
                $part['arrival']['city'] = $value->arrival->waypoint->place->id;

                $part['departure'] = [];
                $part['departure']['id']   = $value->arrival->waypoint->id;
                $part['departure']['city'] = $value->arrival->waypoint->place->id;

                array_push($option, $part);
            }
            array_push($output, $option);
        }

        return $output;
    }

    public static function getPrettyDates($date)
    {
        $date = new Date($date);
        $today = [strtoupper($date->format('d M')), ucfirst($date->format('l'))];

        $date->modify('+1 day');
        $tomorrow = [strtoupper($date->format('d M')), ucfirst($date->format('l'))];

        $date->modify('-2 days');
        $yesterday = [strtoupper($date->format('d M')), ucfirst($date->format('l'))];

        return ['yesterday' => $yesterday, 'today' => $today, 'tomorrow' => $tomorrow];
    }
}