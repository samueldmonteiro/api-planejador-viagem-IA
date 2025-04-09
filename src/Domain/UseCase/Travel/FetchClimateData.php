<?php

namespace App\Domain\UseCase\Travel;

use App\Domain\Service\AiServiceInterface;

class FetchClimateData
{
    public function __construct(private AIServiceInterface $client) {}

    public function execute(string $travelLocation, string $arrivalDate): string
    {
        $prompt =  "Estou viajando para {$travelLocation}, como é o clima lá nessa época do ano? Data de viagem: {$arrivalDate}";

        return $this->client->request($prompt);
    }
}
