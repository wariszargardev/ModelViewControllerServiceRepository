<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Modules\Core\HTTPResponseCodes;
use App\Modules\Sanctum\SanctumService;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class SanctumController
{
    private $service;

    public function __construct(SanctumService $sanctumService)
    {
        $this->service = $sanctumService;
    }

    public function issueToken(Request $request): Response
    {
        $rawData = $request->all();
        try {
            return new Response(
                $this->service->issueToken($rawData),
                HTTPResponseCodes::Success['code']
            );
        } catch (Exception $exception){
           return new Response([
               'exception' => get_class($exception),
               'error'=> $exception->getMessage(),
           ],HTTPResponseCodes::BadRequest['code']);
       }
    }
}
