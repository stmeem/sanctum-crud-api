<?php
namespace App\Traits;

trait ApiResponse
{
    public function sendResponse($data, $message)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ]);
    }

    public function sendError($message, $code)
    {
        return response()->json(['success' => 'false','message' => $message], $code);

    }

}
