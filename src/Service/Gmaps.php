<?php

namespace App\Service;

class Gmaps
{
    const STREET_NUMBER_KEY = 'street_number';
    const ROUTE_KEY = 'route';
    const CITY_KEY = 'locality';
    const AREA_KEY = 'administrative_area_level_1';
    const COUNTRY_KEY = 'country';
    const ZIPCODE_KEY = 'postal_code';

    const PLACE_KEYS = [self::STREET_NUMBER_KEY => 'short_name',
        self::ROUTE_KEY => 'long_name',
        self::CITY_KEY => 'long_name',
        self::AREA_KEY => 'short_name',
        self::COUNTRY_KEY => 'long_name',
        self::ZIPCODE_KEY => 'short_name', ];

    public static function cleanPlaceResult($placeResult)
    {
        $address = [];
        foreach ($placeResult as $a) {
            if (in_array($a['types'][0], array_keys(self::PLACE_KEYS))) {
                $address[$a['types'][0]] = $a['short_name'];
            }
        }

        return $address;
    }
}
