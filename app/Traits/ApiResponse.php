<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    public function sendResponse($data, $message): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ]);
    }

    public function sendError($message): JsonResponse
    {
        return response()->json(['success' => 'false', 'message' => $message]);

    }

}
