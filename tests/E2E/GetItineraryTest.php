<?php

namespace App\Tests\E2E;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class GetItineraryTest extends ApiTestCase
{
    public function testGetItinerary(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/v1/plan/itinerary', [
            'json' => [
                'travelLocation' => 'rio de janeiro, brasil',
                'arrivalDate' => '05/05/2025',
                'departureDate' => '08/05/2025',
            ]
        ]);

        $data = $client->getResponse()->toArray(false);

        $this->assertNotEmpty($data['content'], $data['error'] ?? 'content not found in json response');
        $this->assertResponseStatusCodeSame(200);
    }
}
