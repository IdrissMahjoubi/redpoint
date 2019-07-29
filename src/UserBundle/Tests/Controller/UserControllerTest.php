<?php

namespace UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testShowprofile()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showProfile');
    }

    public function testEditprofile()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/editProfile');
    }

}
