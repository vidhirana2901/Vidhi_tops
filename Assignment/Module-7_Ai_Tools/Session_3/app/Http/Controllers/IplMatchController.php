<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class IplMatchController extends Controller
{
    /**
     * Fetch all upcoming IPL matches for the mobile app or web client.
     *
     * Only matches scheduled for the current time or later are returned.
     * Results are sorted chronologically so the next match appears first.
     * When the database has no upcoming matches, the endpoint returns a
     * helpful JSON message instead of an empty, ambiguous success response.
     */
    public function upcomingMatches(): JsonResponse
    {
        $matches = DB::table('ipl_matches')
            ->where('match_date', '>=', now())
            ->orderBy('match_date')
            ->get();

        if ($matches->isEmpty()) {
            return response()->json([
                'message' => 'No upcoming IPL matches found.',
            ], 404);
        }

        return response()->json([
            'message' => 'Upcoming IPL matches fetched successfully.',
            'matches' => $matches,
        ]);
    }
}
