<?php

namespace Tests\Feature;

use Tests\TestCase;

class PlaylistTest extends TestCase
{
    public function test_create_playlist_form_contains_a_csrf_token(): void
    {
        $response = $this->get('/playlists/create');

        $response
            ->assertOk()
            ->assertSee('name="_token"', false);
    }

    public function test_playlist_submission_without_a_csrf_token_is_rejected(): void
    {
        $response = $this->post('/playlists', [
            'name' => 'Tokenless Playlist',
        ]);

        $response->assertStatus(419);
    }
}
