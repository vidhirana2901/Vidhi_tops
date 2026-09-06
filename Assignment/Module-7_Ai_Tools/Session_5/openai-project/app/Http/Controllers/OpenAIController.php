<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use OpenAI\Client;

class OpenAIController extends Controller
{
    // Verify that Composer can autoload the OpenAI PHP client package.
    public function packageStatus(): JsonResponse
    {
        return response()->json([
            'package' => 'openai-php/client',
            'installed' => class_exists(Client::class),
        ]);
    }
}