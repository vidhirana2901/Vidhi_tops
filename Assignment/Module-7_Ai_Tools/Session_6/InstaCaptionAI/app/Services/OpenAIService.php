<?php

namespace App\Services;

use OpenAI;

class OpenAIService
{
    public function generateCaption(string $topic, array $keywords): string
    {
        $response = OpenAI::client((string) config('services.openai.api_key'))
            ->chat()
            ->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [[
                    'role' => 'user',
                    'content' => sprintf(
                        'Write a concise Instagram caption about "%s" using these keywords: %s. Include relevant hashtags.',
                        $topic,
                        implode(', ', $keywords)
                    ),
                ]],
            ]);

        return trim($response->choices[0]->message->content ?? '');
    }
}