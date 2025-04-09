<?php

namespace App\Domain\Exception;

use Exception;

class AIIntegrationErrorException extends Exception
{
    public function __construct(string $msg, int $code = 422)
    {
        parent::__construct($msg, $code);
    }
}
