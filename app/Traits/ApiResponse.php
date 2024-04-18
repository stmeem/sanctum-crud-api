<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    public function sendResponse($data, $message): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ]);
    }

    public function sendError($message, $code): JsonResponse
    {
        return response()->json(['success' => 'false', 'message' => $message], $code);

    }

}
