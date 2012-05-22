# Maxmind GeoIp Library #

To install this library please follow the next steps:

First add the repo to your `deps` file:

    [Maxmind]
        git=https://github.com/aferrandini/PHPQRCode.git
        target=/maxmind

Then install the library with the command:

    ./bin/vendors install

Now the library is installed so, now we need to load in the `autoload.php`

Open the file `./app/autoload.php` and add this line:

    $loader->registerPrefixes(array(
        // ...
        'Maxmind' => __DIR__.'/../vendor/maxmind/src',
        // ...
    ));

Now you can use the Maxmind GeoIp Library everywhere in your Symfony2 app!

This library is an import of Maxmind GeoIp Free Library, you can find at http://www.maxmind.com/
