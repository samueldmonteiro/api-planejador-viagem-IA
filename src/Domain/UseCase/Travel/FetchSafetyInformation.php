<?php

namespace App\Domain\UseCase\Travel;

use App\Domain\Service\AiServiceInterface;

class FetchSafetyInformation
{
    public function __construct(private AIServiceInterface $client) {}

    public function execute(string $travelLocation): string
    {
        $prompt = "Estou viajando para {$travelLocation}. Como é a violência neste lugar, lugares para não ir ou ter cuidado.";
        
        return $this->client->request($prompt);
    }

}
