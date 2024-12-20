<?php

namespace App\UseCase\TravelPlan;

use App\Service\GeminiApiService;

class FetchSafetyInformation
{
    public function __construct(
        private GeminiApiService $client
    ) {}

    public function execute(string $travelLocation): array
    {
        $prompt = "Estou viajando para {$travelLocation}. Como é a violência neste lugar, lugares para não ir ou ter cuidado.";
        
        return $this->client->request($prompt)->candidates;
    }

}
