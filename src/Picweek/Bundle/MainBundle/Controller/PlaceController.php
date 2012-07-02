<?php
namespace Picweek\Bundle\MainBundle\Controller;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\BrowserKit\Request;
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

        return array();
    }


    /**
     * Ajax
     *
     * @return Response the response to return
     * @Route("/all/format/ajax", name="_place_map_ajax")
     */
    public function mapAjaxAction()
    {
        $request = $this->getRequest();

        if ($request->isXmlHttpRequest()) {

            $request = $this->getRequest();
            $lat = $request->get('lat');
            $long = $request->get('long');
            $radius = $request->get('radius', 30);

            if ($address = $request->get('address')) {
                $url = "http://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($address) . "&sensor=false";
                $datas = json_decode($this->get('anchovy.curl')->setURL($url)->execute());
                if ($datas->status === 'OK') {
                    $result = $datas->results[0];
                    $location = $result->geometry->location;
                    $lat = $location->lat;
                    $long = $location->lng;
                }
            }

            if (empty($lat) || empty($long) || empty($radius)) {
                throw new NotFoundHttpException();
            }

            $datasNear = $this->getDoctrine()
                ->getRepository('PicweekMainBundle:Picnic\Place')
                ->searchNear($lat, $long, $radius);

            $datas = array(
                    'dists' => $datasNear['dists'],
                    'places' => $datasNear['places'],
                    'latitude' => $lat,
                    'longitude' => $long,
                    'radius' => $radius,
            );
            $response = new Response(json_encode($datas));

            return $response;
        } else {
            throw new NotFoundHttpException();
        }
    }

}
