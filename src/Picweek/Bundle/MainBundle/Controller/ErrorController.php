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
class ErrorController extends Controller
{

    /**
     * Error main
     *
     * @Template()
     * @return array
     */
    public function errorAction()
    {
        return array();
    }
}
