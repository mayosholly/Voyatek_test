<?php

namespace App\Traits;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

trait ApiResponse
{
    public function successResponse(mixed $data = null, string $message = 'ok', int $status = 200)
    {
        if ($data instanceof  AnonymousResourceCollection) {
            return $data->additional([
                'message' => $message
            ]);
        }

        return response()->json([
            'data' => $data,
            'message' => $message
        ], $status);
    }

    public function errorResponse(string $message, int $status)
    {
        return response()->json([
            'message' => $message
        ], $status);
    }
}
