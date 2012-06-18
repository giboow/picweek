<?php
namespace Picweek\Bundle\MainBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Pagerfanta\Exception\OutOfRangeCurrentPageException;

use Pagerfanta\Adapter\DoctrineORMAdapter;


use Pagerfanta\Pagerfanta;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
/**
 * Main controller
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 * @since  0.1
 */
class PlaceController extends Controller
{


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

        if ($place === null) {
            throw new NotFoundHttpException();
        }

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

    /**
     * Get places list
     * @return array
     * @Route("/list", name="_place_list")
     * @Template()
     */
    public function listAction()
    {
        $em = $this->get('doctrine')->getEntityManager();
        /* @var $em \Doctrine\ORM\EntityManager */
        $query = $em->createQuery('SELECT p FROM PicweekMainBundle:Picnic\Place p');
        $paginator = new Pagerfanta(new DoctrineORMAdapter($query));
        $paginator->setMaxPerPage(10);
        try {
            $request = $this->getRequest();
            $paginator->setCurrentPage($request->query->get('page', 1));
        } catch (OutOfRangeCurrentPageException $e) {
            throw new NotFoundHttpException();
        }


        return array(
            'paginator' => $paginator,
        );
    }

}
