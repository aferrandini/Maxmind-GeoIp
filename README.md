# Maxmind GeoIp Library #

To install this library please follow the next steps:

First add the dependencie to your `composer.json` file:

    "require": {
        ...
        "maxmind/geoip": "dev-master"
    },

Then install the bundle with the command:

    php composer update

Enable the bundle in your application kernel:

    <?php
    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Maxmind\Bundle\GeoipBundle\MaxmindGeoipBundle(),
        );
    }

Now the library is installed.

To get the maxmind data source file (in '.dat' format), you can choose between 
one of the two following purposed methods:

You can go on the maxmind free download data page:
http://dev.maxmind.com/geoip/geolite
And get the needed version. Then you have to unzip the downloaded file in the data
directory located in 'vendor/maxmind/geoip/data'.

Or you can simply execute this command:

    php app/console maxmind:geoip:update-data %url-data-source%

Replace %url-data-source% with the url of the needed data source.
ex: http://geolite.maxmind.com/download/geoip/database/GeoLiteCity.dat.gz

Now can use the Maxmind GeoIp Library everywhere in your Symfony2 application.

The following exemples are available if you are in a controller

    $geoip = $this->get('maxmind.geoip')->lookup(%IP_ADDR%);

    $geoip->getCountryCode();
    $geoip->getCountryCode3();
    $geoip->getCountryName();
    $geoip->getRegion();
    $geoip->getCity();
    $geoip->getPostalCode();
    $geoip->getLatitude();
    $geoip->getLongitude();
    $geoip->getAreaCode();
    $geoip->getMetroCode();
    $geoip->getContinentCode();

You can add a demo route in your 'routing_dev' to get an exemple on how
this bundle work for exemple:

    _maxmind_geoip:
        resource: "@MaxmindGeoipBundle/Controller/DemoController.php"
        type:     annotation
        prefix:   /demo

Get a lookup at /demo/geoip

This library is an import of Maxmind GeoIp Free Library,
you can find at http://www.maxmind.com/
