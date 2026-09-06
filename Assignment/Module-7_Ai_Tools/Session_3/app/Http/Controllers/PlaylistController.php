<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaylistController extends Controller
{
    // create API endpoint to add a song to user’s playlist
    public function addSong(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'playlist_id' => ['required', 'integer', 'exists:playlists,id'],
            'song_id' => ['required', 'integer', 'exists:songs,id'],
        ]);

        $added = DB::table('playlist_song')->insertOrIgnore([
            'user_id' => $validated['user_id'],
            'playlist_id' => $validated['playlist_id'],
            'song_id' => $validated['song_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($added === 0) {
            return response()->json([
                'message' => 'Song is already in the playlist.',
            ], 409);
        }

        return response()->json([
            'message' => 'Song added to the playlist successfully.',
        ], 201);
    }
}