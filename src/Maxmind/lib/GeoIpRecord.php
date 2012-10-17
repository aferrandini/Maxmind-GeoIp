<?php

namespace Maxmind\lib;

class GeoIpRecord
{
    var $country_code;
    var $country_code3;
    var $country_name;
    var $region;
    var $city;
    var $postal_code;
    var $latitude;
    var $longitude;
    var $area_code;
    var $dma_code;   # metro and dma code are the same. use metro_code
    var $metro_code;
    var $continent_code;
}
