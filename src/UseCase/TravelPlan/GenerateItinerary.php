<?php

namespace App\UseCase\TravelPlan;

use App\Service\GeminiApiService;

class GenerateItinerary
{
    public function __construct(
        private GeminiApiService $client
    ) {}

    public function execute(string $travelLocation, string $arrivalDate, string $departureDate): array
    {
        $prompt = "Estou viajando para {$travelLocation}, para ficar durante os dias {$arrivalDate}, até {$departureDate}. Por favor me sugira um roteiro de viagem para cada dia. No final me apresente quanto gastarei na totalidade dos dias";

        return $this->client->request($prompt)->candidates;
    }
}
