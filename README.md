# Maxmind GeoIp Library #

To install this library please follow the next steps:

First add the dependencie to your `composer.json` file:

    "require": {
        ...
        "maxmind/geoip": "dev-master"
    },

Then install the bundle with the command:

    php composer update

Enable bundle in the kernel:

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

Declare the GeoipManager service in your 'config.yml' like this:

    # Services
    services:
        geoip:
            class:        Maxmind\Bundle\GeoipBundle\Service\GeoipManager

Now can use the Maxmind GeoIp Library everywhere in your Symfony2 app.

The following exemples are available if you are in a controller

To retrieve the country:

    $this->get('geoip')->getCountry(%IP_ADDR%);

To retrieve the country ISO code:

    $this->get('geoip')->getCountryIsoCode(%IP_ADDR%);

To retrieve the region:

    $this->get('geoip')->getRegion(%IP_ADDR%);

To retrieve the city:

    $this->get('geoip')->getCity(%IP_ADDR%);


This library is an import of Maxmind GeoIp Free Library, you can find at http://www.maxmind.com/
