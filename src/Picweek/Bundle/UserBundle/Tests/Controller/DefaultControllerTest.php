<?php

namespace Picweek\Bundle\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Default user controller test
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 * @since  0.1
 */
class DefaultControllerTest extends WebTestCase
{
    /**
     * Index action test
     *
     */
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user/');

        $this->assertTrue($crawler->filter('html:contains("hi")')->count() > 0);
    }
}
