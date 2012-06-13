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
     */
    public function indexAction()
    {
        return array();
    }
}
