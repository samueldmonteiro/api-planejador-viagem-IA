<?php

namespace App\Domain\UseCase\Travel;

use App\Domain\Service\AIServiceInterface;

class GenerateItinerary
{
    public function __construct(private AIServiceInterface $client) {}

    public function execute(string $travelLocation, string $arrivalDate, string $departureDate): string
    {
        $prompt = "Estou viajando para {$travelLocation}, para ficar durante os dias {$arrivalDate}, até {$departureDate}. Por favor me sugira um roteiro de viagem para cada dia. No final me apresente quanto gastarei na totalidade dos dias";

        return $this->client->request($prompt);
    }
}
