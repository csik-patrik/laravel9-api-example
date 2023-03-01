<?php

namespace App\Traits;

trait HttpResponses{
    public static function success($message, $data, $code = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public static function error($message, $error, $code): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'error' => $error
        ], $code);
    }
}
