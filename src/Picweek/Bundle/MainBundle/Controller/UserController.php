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
     * @Route("/join", name="_user_join")
     * @Template()
     * @return array
     */
    public function joinAction()
    {
        $request = $this->getRequest();
        if ($request->isXmlHttpRequest()) {
            return $this->render('PicweekMainBundle:User:join.ajax.twig', array());
        }

        return array();
    }
}
