<?php

namespace App\Http\Controllers;

use App\Models\Leaderboards_model;
use App\Models\Matches_model;

class UserLeaderboardController extends Controller
{
    public function index($matchId)
    {
        $match = Matches_model::with([

            'team1',
            'team2'

        ])->findOrFail($matchId);

        $leaderboards = Leaderboards_model::with('user')

            ->where('match_id', $matchId)

            ->orderBy('rank')

            ->get();

        return view(

            'user.leaderboards.index',

            compact(
                'match',
                'leaderboards'
            )
        );
    }
}