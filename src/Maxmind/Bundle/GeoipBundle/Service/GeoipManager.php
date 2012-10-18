<?php

namespace Maxmind\Bundle\GeoipBundle\Service;

use Maxmind\lib\GeoIp;

class GeoipManager
{
    protected $geoip = null;

    public function __construct($kernel)
    {
        $bundlePath = $kernel->getBundle('MaxmindGeoipBundle')->getPath();
        $filePath = sprintf('%s/%s',
            $bundlePath.'/../../../../data',
            'GeoLiteCity.dat'
        );
        $this->geoip = new GeoIp($filePath);
    }

    public function getCountry($ip)
    {
        return $this->geoip->geoip_country_name_by_addr($ip);
    }

    public function getCountryId($ip)
    {
        return $this->geoip->geoip_country_id_by_addr($ip);
    }

    public function getCountryIsoCode($ip)
    {
        return $this->geoip->geoip_country_code_by_addr($ip);
    }

    public function getRegion($ip)
    {
        return $this->geoip->_get_region($ip);
    }

    public function getCity($ip)
    {
        return $this->geoip->geoip_name_by_addr($ip);
    }
}
