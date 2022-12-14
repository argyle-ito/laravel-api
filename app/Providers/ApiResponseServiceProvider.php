<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
class ApiResponseServiceProvider extends ServiceProvider
{


     public function boot()
    {
    // Error (4xx, 5xx)
    Response::macro('error', function ($status, $message) {
        return response()->json([
            // 'code' => $status,
            'message' => $message,
            "details" => "string"
        ], $status);
    });
}
}
