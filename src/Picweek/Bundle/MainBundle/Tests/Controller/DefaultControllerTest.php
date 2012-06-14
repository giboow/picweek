<?php

namespace Picweek\Bundle\MainBundle\Tests\Controller;

use Picweek\Bundle\MainBundle\Entity\Picnic\Place;

use Doctrine\ORM\EntityManager;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Picweek/Bundle/MainBundle/DefaultController testcase
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 * @since  0.1
 */
class DefaultControllerTest extends WebTestCase
{

    /**
     * Test Index action
     */
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
        $response = $client->getResponse();
        $this->assertEquals("200", $response->getStatusCode());

        $this->assertTrue($crawler->filter('html:contains("Welcome")')->count() > 0);
    }

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
            '\Doctrine\ORM\EntityRepository',
            array('find' => $place)
        );

        $repo =  \Mockery::mock(
            $client->getContainer()->get('doctrine'),
            array(
                'getRepository' => $placeFinder
            )
        );

        $container = $client->getContainer()->set('doctrine', $repo);
        $crawler = $client->request('GET', '/place/get/2');
        $response = $client->getResponse();
        $this->assertEquals("200", $response->getStatusCode());
    }

}
