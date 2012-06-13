<?php

namespace Picweek\Bundle\MainBundle\Tests\Controller;

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

        $this->assertTrue($crawler->filter('html:contains("Welcome")')->count() > 0);
    }
}
