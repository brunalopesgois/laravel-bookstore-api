<?php

namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    public function __construct(string $entityName, int $entityId)
    {
        parent::__construct("{$entityName} with id {$entityId} not found");
    }
}
