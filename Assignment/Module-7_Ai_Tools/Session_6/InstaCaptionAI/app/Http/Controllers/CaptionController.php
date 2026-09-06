<?php

namespace App\Http\Controllers;

use App\Services\OpenAIService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

class CaptionController extends Controller
{
    public function generateCaption(Request $request, OpenAIService $openAIService): View|RedirectResponse
    {
        $validated = $request->validate([
            'topic' => ['required', 'string', 'max:255'],
            'keywords' => ['required', 'string'],
        ]);

        $keywords = collect(explode(',', $validated['keywords']))
            ->map(fn (string $keyword) => trim($keyword))
            ->filter()
            ->values();

        if ($keywords->count() < 3 || $keywords->count() > 5) {
            return back()
                ->withInput()
                ->withErrors(['keywords' => 'Enter between 3 and 5 comma-separated keywords.']);
        }

        try {
            $caption = $openAIService->generateCaption($validated['topic'], $keywords->all());

            return view('ai_caption', [
                'submitted' => true,
                'topic' => $validated['topic'],
                'keywords' => $keywords->all(),
                'caption' => $caption,
                'formattedCaption' => $this->formatCaption($caption, $validated['topic']),
            ]);
        } catch (Throwable $exception) {
            report($exception);

            return back()
                ->withInput()
                ->withErrors(['caption' => 'We could not generate a caption right now. Please try again.']);
        }
    }

    private function formatCaption(string $caption, string $topic): string
    {
        $safeCaption = nl2br(htmlspecialchars($caption, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'));
        $safeTopic = htmlspecialchars($topic, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

        if ($safeTopic !== '') {
            $safeCaption = preg_replace(
                '/' . preg_quote($safeTopic, '/') . '/iu',
                '<b>$0</b>',
                $safeCaption
            ) ?? $safeCaption;
        }

        return preg_replace(
            '/#[\p{L}\p{N}_]+/u',
            '<span class="hashtag">$0</span>',
            $safeCaption
        ) ?? $safeCaption;
    }
}