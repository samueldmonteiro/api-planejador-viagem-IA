<?php

namespace App\Domain\Service;

use App\Domain\Exception\AIIntegrationErrorException;

interface AIServiceInterface
{
    /**
     * @throws AIIntegrationErrorException
     */
    public function request(string $prompt): ?string;
}