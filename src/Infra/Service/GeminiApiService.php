<?php

namespace App\Infra\Service;

use App\Domain\Exception\AIIntegrationErrorException;
use App\Domain\Service\AIServiceInterface;
use Exception;
use GeminiAPI\Resources\Parts\TextPart;
use GeminiAPI\Client;
use GeminiAPI\Resources\ModelName;

class GeminiApiService implements AIServiceInterface
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client($_ENV['API_GEMINI_KEY']);
    }

    public function request(string $prompt): ?string
    {
        try {
            $response = $this->client->generativeModel(ModelName::GEMINI_1_5_FLASH_002)->generateContent(
                new TextPart($prompt),
            );

            return $response->text();

        } catch (Exception $e) {
            throw new AIIntegrationErrorException($e->getMessage());
        }
    }
}
