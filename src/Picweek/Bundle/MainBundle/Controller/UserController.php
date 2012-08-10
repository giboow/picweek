<?php

namespace Picweek\Bundle\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
/**
 * User controller
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 * @since  0.1
 */
class UserController extends Controller
{

    /**
     * Render main page
     *
     * @Route("/join")
     * @Template()
     * @return array
     */
    public function joinAction()
    {
        return array();
    }
}
