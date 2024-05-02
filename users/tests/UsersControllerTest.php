<?php

namespace App\Tests;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase as TestApiTestCase;

class UsersControllerTest extends TestApiTestCase
{
    public function testCreateUser(): void
    {
        $client = self::createClient();

        $client->request('POST', '/users', [], [], [], json_encode([
            'email' => 'test@test.com',
            'first_name' => 'Muhammad',
            'last_name' => 'Sajid'
        ]));

        $this->assertResponseStatusCodeSame(200);
    }
}
