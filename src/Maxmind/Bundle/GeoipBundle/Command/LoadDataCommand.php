<?php

namespace Maxmind\Bundle\GeoipBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Finder\Finder;

class LoadDataCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('maxmind:geoip:update-data')
            ->setDescription('Update the maxmind geoip data')
            ->addArgument(
                'source',
                InputArgument::REQUIRED,
                'The url source file to download and unzip')
            ->setHelp(<<<EOT
The <info>%command.name%</info> command download and install the maxmind geoip data source

To install the GeoLiteCountry:
<info>php %command.full_name% http://geolite.maxmind.com/download/geoip/database/GeoLiteCountry/GeoIP.dat.gz</info>

To install the GeoLite Country IPv6:
<info>php %command.full_name% http://geolite.maxmind.com/download/geoip/database/GeoIPv6.dat.gz</info>

To install the GeoLite City:
<info>php %command.full_name% http://geolite.maxmind.com/download/geoip/database/GeoLiteCity.dat.gz</info>

To install the GeoLite City IPv6 (Beta):
<info>php %command.full_name% http://geolite.maxmind.com/download/geoip/database/GeoLiteCityv6-beta/GeoLiteCityv6.dat.gz</info>

more information here: http://dev.maxmind.com/geoip/geolite

EOT
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $source = $input->getArgument('source');

        $bundlePath = $this->getApplication()->getKernel()->getBundle('MaxmindGeoipBundle')->getPath();
        $dataDir = sprintf('%s', $bundlePath.'/../../../../data/');
        $filename = basename($source);
        $destination = sprintf('%s/%s', $dataDir, $filename);
        $output->writeln(sprintf('Start downloading %s', $source));
        $output->writeln('...');
        if (!copy($source, $destination)) {
            $output->writeln('<error>Error during file download occured</error>');

            return false;
        }
        $output->writeln('<info>Download completed</info>');
        $output->writeln('Unzip the downloading data');
        $output->writeln('...');
        system('gunzip -f '.$destination);
        $output->writeln('<info>Unzip completed</info>');

        return true;
    }
}
