<?php

namespace App\Tests\Integration\Infra\Service;

use App\Infra\Service\GeminiApiService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class GeminiApiServiceTest extends KernelTestCase
{
    private GeminiApiService $gemini;

    public function setUp(): void
    {
        parent::setUp();
        $this->gemini = static::getContainer()->get(GeminiApiService::class);
    }

    public function testRequestMethod(): void
    {
        $reponse = $this->gemini->request('This is a test to verify the connection to the Gemini API. please send a response containing ONLY the following string: everything ok');

        $this->assertStringContainsString('everything ok', $reponse);
    }
}
