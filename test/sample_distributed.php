#!/usr/bin/php -q
<?php

include 'geoipcity.inc';
include 'Net/DNS.php';

// replace LICENSE_KEY_HERE with your license key
$l = 'LICENSE_KEY_HERE';
$ip = '24.24.24.24';

if ($l == 'LICENSE_KEY_HERE') {
    echo "Error, must edit sample_distributed.php to replace LICENSE_KEY_HERE\n";
    exit;
}

$str = getdnsattributes($l, $ip);
$r = getrecordwithdnsservice($str);
echo 'country code: '.$r->country_code."\n";
echo 'country code3: '.$r->country_code3."\n";
echo 'country name: '.$r->country_name."\n";
echo 'city: '.$r->city."\n";
echo 'region: '.$r->region."\n";
echo 'region name: '.$r->regionname."\n";
echo 'postal_code: '.$r->postal_code."\n";
echo 'latitude: '.$r->latitude."\n";
echo 'longitude: '.$r->longitude."\n";
echo 'area code: '.$r->areacode."\n";
echo 'dma code: '.$r->dmacode."\n";
echo 'isp: '.$r->isp."\n";
echo 'org: '.$r->org."\n";
?>
