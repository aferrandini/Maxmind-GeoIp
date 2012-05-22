#!/usr/bin/php -q
<?php

// This code demonstrates how to lookup the country, region, city,
// postal code, latitude, and longitude by IP Address.
// It is designed to work with GeoIP/GeoLite City

// Note that you must download the New Format of GeoIP City (GEO-133).
// The old format (GEO-132) will not work.

require_once "../src/GeoIp.php";
require_once "../src/GeoIpRegionVars.php";
require_once "../src/GeoIpRecord.php";
require_once "../src/GeoIpDNSRecord.php";

// uncomment for Shared Memory support
// geoip_load_shared_mem("/usr/local/share/GeoIP/GeoIPCity.dat");
// $gi = geoip_open("/usr/local/share/GeoIP/GeoIPCity.dat",GEOIP_SHARED_MEMORY);

//$gi = geoip_open("/usr/local/share/GeoIP/GeoIPCity.dat",GEOIP_STANDARD);
$gi = new \Maxmind\GeoIP("../data/GeoLiteCity.dat");

$record = $gi->geoip_record_by_addr($argv[1]);

//print utf8_encode($record->country_code . " " . $record->country_code3 . " " . $record->country_name . "\n");
//if(isset(\Maxmind\GeoIpRegionVars::$GEOIP_REGION_NAME[$record->country_code][$record->region])) {
//    print utf8_encode($record->region . " " . \Maxmind\GeoIpRegionVars::$GEOIP_REGION_NAME[$record->country_code][$record->region] . "\n");
//}
print utf8_encode($record->city . "\n");
//print utf8_encode($record->postal_code . "\n");
//print utf8_encode($record->latitude . "\n");
//print utf8_encode($record->longitude . "\n");
//print utf8_encode($record->metro_code . "\n");
//print utf8_encode($record->area_code . "\n");
//print utf8_encode($record->continent_code . "\n");

$gi->geoip_close();