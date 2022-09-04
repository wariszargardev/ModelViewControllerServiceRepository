<?php

declare(strict_types= 1);

namespace App\Modules\Sanctum;

use InvalidArgumentException;

class SanctumValidator
{
    public function validateIssueToken(array $rawData): void
    {
        $validator = \validator($rawData, [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'device' => 'required|string',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException(json_encode($validator->errors()->all()));
        }
    }
}
