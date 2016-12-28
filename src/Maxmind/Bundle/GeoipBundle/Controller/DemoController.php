<?php

namespace Maxmind\Bundle\GeoipBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DemoController extends Controller
{
    /**
     * @Route("/geoip", name="_demo_geoip")
     * @Template()
     */
    public function indexAction()
    {
        $geoip = $this->get('geoip')->lookup('74.125.230.215');

        return array('geoip' => $geoip);
    }
}
