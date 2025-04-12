<?php

namespace App\Tests\Feature;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class SafetyInformationTest extends ApiTestCase
{
    public function testGetSafetyInformation(): void {
        $client = static::createClient();
        $client->request('POST', '/api/v1/information/safety', [
            'json' => [
                'travelLocation' => 'rio de janeiro, brasil',
            ]
        ]);

        $data = $client->getResponse()->toArray(false);

        $this->assertNotEmpty($data['content'], 'content not found in json response');

        $this->assertResponseStatusCodeSame(200);
    }

    public function testRequiredFields(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/v1/information/safety', [
            'json' => [
                'name' => 'João',
            ]
        ]);

        $this->assertResponseStatusCodeSame(400);
        $this->assertJsonContains(['error' => 'Preencha todos os campos corretamente']);
    }
}
