<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($data = [], $message = 'success')
    {
        return response()->json([
            'ok' => true,
            'message' => $message,
            'data' => $data
        ], 200);
    }

    public static function fail($message = 'fail', $code = 500)
    {
        return response()->json([
            'ok' => false,
            'message' => $message,
            'status_code' => $code
        ], $code);
    }
}
