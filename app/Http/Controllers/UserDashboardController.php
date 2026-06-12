<?php

namespace App\Http\Controllers;

use App\Models\Matches_model;
use App\Models\FantasyTeams_model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $myTeams = FantasyTeams_model::where(
            'user_id',
            $user->id
        )->count();

        $matchesJoined = FantasyTeams_model::where(
            'user_id',
            $user->id
        )->distinct('match_id')
            ->count();

        $upcomingMatch = Matches_model::with([
            'team1',
            'team2'
        ])
            ->where('status', 'Upcoming')
            ->orderBy('match_date')
            ->first();

        $leaderboard = User::where(
            'role',
            'user'
        )
            ->orderByDesc('fantasy_points')
            ->get();

        $rank = $leaderboard
            ->search(function ($item) use ($user) {

                return $item->id == $user->id;
            }) + 1;

        $upcomingMatches = Matches_model::with([
            'team1',
            'team2'
        ])
            ->where('status', 'Upcoming')
            ->orderBy('match_date')
            ->take(5)
            ->get();

        $liveMatches = Matches_model::with([
            'team1',
            'team2'
        ])
            ->where('status', 'Live')
            ->orderBy('match_date')
            ->get();

        return view(
            'user.dashboard',
            compact(
                'myTeams',
                'matchesJoined',
                'upcomingMatch',
                'rank',
                'upcomingMatches',
                'liveMatches'
            )
        );

        // return response()->json([
        //     'myTeams' => $myTeams,
        //     'matchesJoined' => $matchesJoined,
        //     'upcomingMatch' => $upcomingMatch,
        //     'rank' => $rank,
        //     'upcomingMatches' => $upcomingMatches,
        //     'liveMatches' => $liveMatches,
        // ]);
    }
    
}
