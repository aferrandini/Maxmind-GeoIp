<?php

namespace Maxmind\Bundle\GeoipBundle\Service;

use Maxmind\lib\GeoIp;
use Maxmind\lib\GeoIpRegionVars;

class GeoipManager
{
    protected $geoip = null;

    protected $record = null;

    public function __construct($kernel)
    {
        $bundlePath = $kernel->getBundle('MaxmindGeoipBundle')->getPath();
        $filePath = sprintf('%s/%s',
            $bundlePath.'/../../../../data',
            'GeoLiteCity.dat'
        );
        $this->geoip = new GeoIp($filePath);
    }

    public function lookup($ip)
    {
        $this->record = $this->geoip->geoip_record_by_addr($ip);

        return $this;
    }

    public function getCountryCode($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        return $this->record->country_code;
    }

    public function getCountryCode3($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        return $this->record->country_code3;
    }

    public function getCountryName($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        return $this->record->country_name;
    }

    public function getRegion($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        return GeoIpRegionVars::$GEOIP_REGION_NAME
          [$this->record->country_code]
          [$this->record->region]
        ;
    }

    public function getCity($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        return $this->record->city;
    }

    public function getPostalCode($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        return $this->record->postal_code;
    }

    public function getLatitude($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        return $this->record->latitude;
    }

    public function getLongitude($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        return $this->record->latitude;
    }

    public function getAreaCode($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        return $this->record->area_code;
    }

    public function getMetroCode($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        return $this->record->metro_code;
    }

    public function getContinentCode($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        return $this->record->continent_code;
    }
}
