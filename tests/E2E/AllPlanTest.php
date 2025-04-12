<?php

namespace App\Tests\E2E;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class AllPlanTest extends ApiTestCase
{
    public function testGetAllPlan(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/v1/plan/all', [
            'json' => [
                'travelLocation' => 'rio de janeiro, brasil',
                'arrivalDate' => '05/05/2025',
                'departureDate' => '08/05/2025',
            ]
        ]);

        $data = $client->getResponse()->toArray(false);

        $this->assertNotEmpty($data['safety'], $data['error'] ?? 'safety not found in json response');
        $this->assertNotEmpty($data['itinerary'], $data['error'] ?? 'itinerary not found in json response');
        $this->assertNotEmpty($data['climate'], $data['error'] ?? 'climate not found in json response');

        $this->assertResponseStatusCodeSame(200);
    }
}
