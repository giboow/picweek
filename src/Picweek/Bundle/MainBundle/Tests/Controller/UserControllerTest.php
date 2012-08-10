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
class UserControllerTest extends WebTestCase
{

    /**
     * Test Index action
     */
    public function testJoin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user/join');
        $response = $client->getResponse();
        $this->assertEquals("200", $response->getStatusCode());

        $this->assertTrue($crawler->filter('html:contains("Join Picnic-Break")')->count() > 0);
        $this->assertTrue(
            $crawler->filter(
                'html:contains("By signing up you agree to our Terms of Service and Policy.")'
            )->count() > 0
        );
    }
}
