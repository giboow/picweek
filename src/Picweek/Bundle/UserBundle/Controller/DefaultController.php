<?php

namespace Picweek\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Default user controller
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 * @since  0.1
 */
class DefaultController extends Controller
{
    /**
     * Render main page
     *
     * @Route("/", name="_user_home")
     * @Template()
     * @return array
     */
    public function indexAction()
    {
        return array();
    }
}
