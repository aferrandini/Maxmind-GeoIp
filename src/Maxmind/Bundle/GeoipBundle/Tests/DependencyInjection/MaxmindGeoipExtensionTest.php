<?php
namespace Maxmind\Bundle\GeoipBundle\Tests\DependencyInjection;

use Maxmind\Bundle\GeoipBundle\DependencyInjection\MaxmindGeoipExtension;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Yaml\Parser;

class MaxmindGeoipExtensionTest extends \PHPUnit_Framework_TestCase{
	/** @var ContainerBuilder */
	protected $configuration;

	/**
	 * This should not throw an exception
	 */
	public function testMinimalConfig(){
		$this->configuration = new ContainerBuilder();
		$loader = new MaxmindGeoipExtension();
		$config = $this->getMinimalConfig();
		$loader->load(array($config), $this->configuration);

		$datFilePath = $this->configuration->getParameter('maxmind_geoip_data_file_path');
		$configuredFolder = realpath(substr($datFilePath, 0, strrpos($datFilePath, "/")));
		$expectedFolder = realpath(__DIR__."/../../../../../../data/");

		$this->assertEquals($expectedFolder, $configuredFolder, "Unexpected file path.");
	}

	/**
	 * This should not throw an exception
	 */
	public function testFullConfig(){
		$this->configuration = new ContainerBuilder();
		$loader = new MaxmindGeoipExtension();
		$config = $this->getFullConfig();
		$loader->load(array($config), $this->configuration);

		$datFilePath = $this->configuration->getParameter('maxmind_geoip_data_file_path');

		$this->assertEquals("%kernel.root_dir%/../vendor/maxmind/geoip/src/Maxmind/Bundle/Test/DependencyInjection/GeoIPCity.dat", $datFilePath, "Unexpected file path.");
	}

	/**
	 * Get the minimal config
	 * @return array
	 */
	protected function getMinimalConfig(){
		$yaml = <<<EOF
EOF;
		$parser = new Parser();

		return $parser->parse($yaml);
	}


	/**
	 * Get a full config for this bundle
	 */
	protected function getFullConfig(){
		$yaml = <<<EOF
data_file_path:  "%kernel.root_dir%/../vendor/maxmind/geoip/src/Maxmind/Bundle/Test/DependencyInjection/GeoIPCity.dat"
EOF;
		$parser = new Parser();

		return $parser->parse($yaml);
	}

	/**
	 * @param mixed  $value
	 * @param string $key
	 */
	private function assertParameter($value, $key){
		$this->assertEquals($value, $this->configuration->getParameter($key), sprintf('%s parameter is correct', $key));
	}

	protected function tearDown(){
		unset($this->configuration);
	}
}
