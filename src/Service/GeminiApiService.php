<?php

namespace App\Service;

use GeminiAPI\Resources\Parts\TextPart;
use GeminiAPI\Client;
use GeminiAPI\Responses\GenerateContentResponse;

class GeminiApiService
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client($_ENV['API_GEMINI_KEY']);
    }

    public function request(string $prompt): GenerateContentResponse
    {
        return $this->client->geminiPro()->generateContent(
            new TextPart($prompt)
        );
    }
}
