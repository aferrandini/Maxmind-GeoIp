<?php

namespace Maxmind\Bundle\GeoipBundle\Service;

use Symfony\Component\HttpKernel\Kernel;

use Maxmind\lib\GeoIp;
use Maxmind\lib\GeoIpRegionVars;

class GeoipManager
{
    protected $geoip = null;

    protected $record = null;

    public function __construct(Kernel $kernel)
    {
    	$filePath = $kernel->getContainer()->getParameter('maxmind_geoip_data_file_path');
        $this->geoip = new GeoIp($filePath);
    }

    public function lookup($ip)
    {
        $this->record = $this->geoip->geoip_record_by_addr($ip);

        if ($this->record)
            return $this;

        return false;
    }

    public function getCountryCode($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        if ($this->record)
            return $this->record->country_code;

        return $this->record;
    }

    public function getCountryCode3($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        if ($this->record)
            return $this->record->country_code3;

        return $this->record;
    }

    public function getCountryName($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        if ($this->record)
            return $this->record->country_name;

        return $this->record;
    }

    public function getRegionCode($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        if ($this->record)
          return $this->record->region;

        return $this->record;
    }

    public function getRegion($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        if ($this->record
                && $this->record->country_code
                && $this->record->region
        )
          return GeoIpRegionVars::$GEOIP_REGION_NAME
            [$this->record->country_code]
            [$this->record->region]
          ;

        return null;
    }

    public function getCity($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        if ($this->record)
            return $this->record->city;

        return $this->record;
    }

    public function getPostalCode($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        if ($this->record)
            return $this->record->postal_code;

        return $this->record;
    }

    public function getLatitude($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        if ($this->record)
            return $this->record->latitude;

        return $this->record;
    }

    public function getLongitude($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        if ($this->record)
            return $this->record->longitude;

        return $this->record;
    }

    public function getAreaCode($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        if ($this->record)
            return $this->record->area_code;

        return $this->record;
    }

    public function getMetroCode($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        if ($this->record)
            return $this->record->metro_code;

        return $this->record;
    }

    public function getContinentCode($ip = null)
    {
        if ($ip)
            $this->lookup($ip);

        if ($this->record)
            return $this->record->continent_code;

        return $this->record;
    }
}
