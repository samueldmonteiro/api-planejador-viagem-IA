<?php

namespace App\UseCase\TravelPlan;

use App\Service\GeminiApiService;

class FetchClimateData
{
    public function __construct(
        private GeminiApiService $client
    ) {}

    public function execute(string $travelLocation): array
    {
        $prompt =  "Estou viajando para {$travelLocation}, como é o clima lá nessa época do ano?";

        return $this->client->request($prompt)->candidates;
    }
}
