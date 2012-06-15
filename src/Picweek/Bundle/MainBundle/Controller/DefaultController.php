<?php

namespace Picweek\Bundle\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
/**
 * Main controller
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 * @since  0.1
 */
class DefaultController extends Controller
{

    /**
     * Render main page
     *
     * @Route("/")
     * @Template()
     * @return array
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * Render place page
     * @param integer $id
     *
     * @return array
     * @Route("/get/{id}", name="_place")
     * @Template()
     */
    public function placeAction($id)
    {
        $place = $this->getDoctrine()
                        ->getRepository('PicweekMainBundle:Picnic\Place')->find($id);

        return array("place" => $place);
    }

    /**
     * Get number of picnic places
     *
     * @return array
     * @Route("/count", name="_places_count")
     * @Template()
     */
    public function countAction()
    {
        $count = $this->getDoctrine()
                        ->getRepository('PicweekMainBundle:Picnic\Place')->count();

        return array('count' => $count);
    }
}
