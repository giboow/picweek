<?php
namespace Picweek\Bundle\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Picweek/Bundle/MainBundle/ErrorController testcase
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 * @since  0.1
 */
class ErrorControllerTest extends WebTestCase
{

    /**
     * Test Index action
     */
    public function testError()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/error');
        $response = $client->getResponse();
        $this->assertEquals("200", $response->getStatusCode());

        $this->assertTrue($crawler->filter('html:contains("Error!")')->count() > 0);
    }
}
