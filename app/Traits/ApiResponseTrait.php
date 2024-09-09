<?php

namespace App\Traits;

trait ApiResponseTrait
{
    /**
     * Format the API response.
     *
     * @param bool $status
     * @param string $message
     * @param array|object|null $data
     * @param array $errors
     * @param bool $genericMessage
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiResponse($status, $message = '', $data = null, $errors = [], $genericMessage = false)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'errors' => $errors,
            'genericMessage' => $genericMessage,
        ]);
    }
}
