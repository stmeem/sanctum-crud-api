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

    public function sendError($error, $message, $code)
    {
        $response = [
            'success' => 'false',
            'message' => $error
        ];

        if(!empty($message)){
            $response['data'] = $message;
        }
        return response()->json($response, $code);

    }

}
