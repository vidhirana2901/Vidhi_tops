<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use OpenAI;
use Throwable;

class PlaylistAIController extends Controller
{
    // Display the form used to submit a playlist description for summarization.
    public function showSummaryForm(): View
    {
        return view('ai_summary');
    }

    // Ask OpenAI to summarize a playlist description and return the generated text.
    public function generatePlaylistDescription(Request $request): JsonResponse|View|RedirectResponse
    {
        $validated = $request->validate([
            'playlist_description' => ['required', 'string', 'max:1000'],
        ]);

        $playlistDescription = $validated['playlist_description'];

        try {
            $client = OpenAI::client((string) config('services.openai.api_key'));
            $response = $client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => "Summarize this playlist: {$playlistDescription}",
                    ],
                ],
            ]);

            $summary = $response->choices[0]->message->content;

            if (! $request->expectsJson()) {
                return view('ai_summary', compact('playlistDescription', 'summary'));
            }

            return response()->json([
                'summary' => $summary,
            ]);
        } catch (Throwable $exception) {
            report($exception);

            $error = 'We could not generate a summary right now. Please check your API configuration and try again.';

            if (! $request->expectsJson()) {
                return view('ai_summary', compact('playlistDescription', 'error'));
            }

            return response()->json([
                'message' => $error,
            ], 500);
        }
    }
}