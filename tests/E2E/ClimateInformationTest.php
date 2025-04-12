<?php

namespace App\Tests\E2E;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class ClimateInformationTest extends ApiTestCase
{
    public function testGetClimateInformation(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/v1/information/climate', [
            'json' => [
                'travelLocation' => 'rio de janeiro, brasil',
                'arrivalDate' => '05/05/2025',
            ]
        ]);

        $data = $client->getResponse()->toArray(false);

        $this->assertNotEmpty($data['content'], 'content not found in json response');

        $this->assertResponseStatusCodeSame(200);
    }
}
