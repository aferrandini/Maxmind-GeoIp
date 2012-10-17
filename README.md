# Maxmind GeoIp Library #

To install this library please follow the next steps:

First add the dependencie to your `composer.json` file:

    "require": {
        ...
        "maxmind/geoip": "dev-master"
    },

Then install the bundle with the command:

    php composer update

Finally, enable bundle in the kernel:

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
You can use the Maxmind GeoIp Library everywhere in your Symfony2 app!

This library is an import of Maxmind GeoIp Free Library, you can find at http://www.maxmind.com/
