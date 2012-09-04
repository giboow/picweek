<?php

namespace Picweek\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Default admin controller
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 * @since  0.1
 */
class DefaultController extends Controller
{

    /**
     * Index action
     * @param string $name name
     *
     * @Route("/hello/{name}")
     * @Template()
     *
     * @return array
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
}
