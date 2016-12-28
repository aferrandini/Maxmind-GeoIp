<?php

namespace Maxmind\lib;

class GeoIpRecord
{
    public $country_code;
    public $country_code3;
    public $country_name;
    public $region;
    public $city;
    public $postal_code;
    public $latitude;
    public $longitude;
    public $area_code;
    public $dma_code;   // metro and dma code are the same. use metro_code
    public $metro_code;
    public $continent_code;
}
