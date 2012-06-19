<?php
namespace Picweek\Bundle\MainBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Pagerfanta\Exception\NotValidCurrentPageException;
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
     * @Route("/get/{id}", name="_place_get")
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
        $qb = $em->createQueryBuilder();
        $qb->select("p")->from("PicweekMainBundle:Picnic\Place", "p");
        $paginator = new Pagerfanta(new DoctrineORMAdapter($qb->getQuery()));
        $paginator->setMaxPerPage(10);
        try {
            $request = $this->getRequest();
            $paginator->setCurrentPage($request->query->get('page', 1));
        } catch (NotValidCurrentPageException $e) {
            throw new NotFoundHttpException();
        }


        return array(
            'paginator' => $paginator,
        );
    }

    /**
     * map places list
     * @return array
     * @Route("/map", name="_place_map")
     * @Template()
     */
    public function mapAction()
    {
        $request = $this->getRequest();
        $lat = $request->get('lat', 48.869232);//47.661457;
        $long = $request->get('long', 2.356453);//-2.864399;
        $radius = $request->get('radius', 0);//600;
        $datasNear = $this->getDoctrine()
            ->getRepository('PicweekMainBundle:Picnic\Place')->searchNear($lat, $long, $radius);

        return array(
            'dists' => $datasNear['dists'],
            'places' => $datasNear['places'],
            'latitude' => $lat,
            'longitude' => $long,
            'radius' => $radius,
        );
    }

}
