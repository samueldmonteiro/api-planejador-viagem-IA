<?php

namespace App\Services;

use GeminiAPI\Resources\Parts\TextPart;
use GeminiAPI\Client;
use GeminiAPI\Responses\GenerateContentResponse;

class GeminiApiService
{
    private Client $geminiClient;

    public function __construct()
    {
        $this->geminiClient = new Client(env('API_GEMINI_KEY'));
    }

    public function request(string $prompt): GenerateContentResponse
    {
        return $this->geminiClient->geminiPro()->generateContent(
            new TextPart($prompt)
        );
    }
}