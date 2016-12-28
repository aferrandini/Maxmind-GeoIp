#!/usr/bin/php -q
<?php

include 'geoip.inc';

$gi = geoip_open('/usr/local/share/GeoIP/GeoIPNetSpeed.dat', GEOIP_STANDARD);

$netspeed = geoip_country_id_by_addr($gi, '24.24.24.24');

//print $n . "\n";
if ($netspeed == GEOIP_UNKNOWN_SPEED) {
    echo "Unknown\n";
} elseif ($netspeed == GEOIP_DIALUP_SPEED) {
    echo "Dailup\n";
} elseif ($netspeed == GEOIP_CABLEDSL_SPEED) {
    echo "Cable/DSL\n";
} elseif ($netspeed == GEOIP_CORPORATE_SPEED) {
    echo "Corporate\n";
}

geoip_close($gi);

?>
