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
            $option['from'] = $item->from;
            $option['to']   = $item->to;
            $option['part'] = [];
            foreach ($item->parts as $value) {
                $part = [];
                $part['serviceClass']   = $value->bus->serviceClass;
                $part['trip']           = $value->trip_id;
                $part['busCompany']     = (array)$value->busCompany;
                $part['availableSeats'] = $value->availableSeats;
                $part['price']          = self::parcePrice($value->arrival->price);
                $part['id']             = $value->arrival->waypoint->schedule->id;

                $part['duration'] = self::getDuration(
                    $value->arrival->waypoint->schedule->date,
                    $value->arrival->waypoint->schedule->time,
                    $value->departure->waypoint->schedule->date,
                    $value->departure->waypoint->schedule->time
                );

                $part['arrival'] = [];
                $part['arrival']['id']   = $value->arrival->waypoint->id;
                $part['arrival']['city'] = $value->arrival->waypoint->place->city;
                $part['arrival']['time'] = $value->arrival->waypoint->schedule->time;

                $part['departure'] = [];
                $part['departure']['id']   = $value->departure->waypoint->id;
                $part['departure']['city'] = $value->departure->waypoint->place->city;
                $part['departure']['time'] = $value->departure->waypoint->schedule->time;

                array_push($option['part'], $part);
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

    private static function parcePrice($price)
    {
        $price /= 100;
        return number_format((float)$price, 2, ',', ''); 
    }

    private static function getDuration($arrivalDate, $arrivalTime, $departureDate, $departureTime)
    {
        $departure = new Date("{$departureDate} {$departureTime}:00");
        $arrival   = new Date("{$arrivalDate} {$arrivalTime}:00");
        $interval  = $departure->diff($arrival);

        return [$interval->h, $interval->i];
    }
}