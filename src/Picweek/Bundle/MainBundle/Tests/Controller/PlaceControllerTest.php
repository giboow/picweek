<?php
namespace Picweek\Bundle\MainBundle\Tests\Controller;

use Picweek\Bundle\MainBundle\Entity\Picnic\Place;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Picweek/Bundle/MainBundle/PlaceController testcase
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 * @since  0.1
 */
class PlaceControllerTest extends WebTestCase
{
    /**
     * Test place action
     */
    public function testPlace()
    {
        $client = static::createClient();


        $place = new \Picweek\Bundle\MainBundle\Entity\Picnic\Place();
        $place->setName("name");
        $place->setAddress("address");
        $place->setInfo("infos");
        $place->setLatitude(1);
        $place->setLongitude(1);
        $place->setParking(true);

        $placeFinder = \Mockery::mock(
            '\Picweek\Bundle\MainBundle\Entity\Picnic\PlaceRepository',
            array('find' => $place, 'count' => 1)
        );

        $repo =  \Mockery::mock(
            $client->getContainer()->get('doctrine'),
            array('getRepository' => $placeFinder)
        );

        $container = $client->getContainer()->set('doctrine', $repo);
        $crawler = $client->request('GET', '/place/get/2');
        $response = $client->getResponse();
        $this->assertEquals("200", $response->getStatusCode());
    }
}
