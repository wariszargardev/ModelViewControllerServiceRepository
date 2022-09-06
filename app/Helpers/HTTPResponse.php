<?php

use App\Modules\Core\HTTPResponseCodes;
use Illuminate\Http\JsonResponse;


function successResponse($data = [], $message = ''): JsonResponse
{
    return response()->json([
        'status' => HTTPResponseCodes::Success['code'],
        'data' => $data,
        'message' => $message
    ], HTTPResponseCodes::Success['code']);
}

function errorMessage($message = ''): JsonResponse
{
    return response()->json([
        'status' => HTTPResponseCodes::NotFound['code'],
        'message' => $message
    ], HTTPResponseCodes::NotFound['code']);
}
