<?php

namespace App\Http\Controllers;

use App\Models\Matches_model;
use App\Models\FantasyTeams_model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Enums\MatchStatus;
use App\Services\TournamentStatusService;
use App\Services\MatchStatusService;
class UserDashboardController extends Controller
{
    private TournamentStatusService $statusService;

    private MatchStatusService $matchStatusService;

    public function __construct(
        TournamentStatusService $statusService,
        MatchStatusService $matchStatusService
    ) {
        $this->statusService = $statusService;

        $this->matchStatusService = $matchStatusService;
    }
    
    public function index()
    {
        $this->statusService->updateStatuses();
        $this->matchStatusService->updateStatuses();
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

        // $upcomingMatch = Matches_model::with([
        //     'team1',
        //     'team2'
        // ])
        //     ->where('status', 'Upcoming')
        //     ->orderBy('match_date')
        //     ->first();
        // $upcomingMatches = Matches_model::with([
        //     'team1',
        //     'team2'
        // ])
        //     ->where('status', 'Upcoming')
        //     ->orderBy('match_date')
        //     ->take(5)
        //     ->get();

        $upcomingMatches = Matches_model::with([
            'team1',
            'team2'
        ])
            ->where('status', MatchStatus::UPCOMING->value)
            ->orderBy('match_date')
            ->take(5)
            ->get();

        $upcomingMatch = $upcomingMatches->first();

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

        $liveMatches = Matches_model::with([
            'team1',
            'team2'
        ])
            ->where('status', MatchStatus::LIVE->value)
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

        
    }

    public function dashboardApi()
    {
        $this->statusService->updateStatuses();
        $this->matchStatusService->updateStatuses();
        $user = Auth::user();
        $myTeams = FantasyTeams_model::where(
            'user_id',
            $user->id
        )->count();

        $matchesJoined = FantasyTeams_model::where(
            'user_id',
            $user->id
        )
        ->distinct('match_id')
        ->count();

        $upcomingMatches = Matches_model::with([
            'team1',
            'team2'
        ])
        ->where(
            'status',
            MatchStatus::UPCOMING->value
        )
        ->orderBy('match_date')
        ->take(5)
        ->get();

        $upcomingMatch =
            $upcomingMatches->first();

        $leaderboard = User::where(
            'role',
            'user'
        )
        ->orderByDesc('fantasy_points')
        ->get();

        $rank = $leaderboard
            ->search(function ($item)
            use ($user) {

                return $item->id ==
                    $user->id;
            }) + 1;

        $liveMatches = Matches_model::with([
            'team1',
            'team2'
        ])
        ->where(
            'status',
            MatchStatus::LIVE->value
        )
        ->orderBy('match_date')
        ->get();

        return response()->json([
            'myTeams' => $myTeams,
            'matchesJoined' => $matchesJoined,
            'rank' => $rank,

            'upcomingMatch' => $upcomingMatch,

            'upcomingMatches' =>
                $upcomingMatches,

            'liveMatches' =>
                $liveMatches
        ]);
    }

    public function profileApi()
    {
        $user = Auth::user(); 

        return response()->json([

            'name' => $user->name,

            'email' => $user->email,

            'wallet_balance' => $user->wallet_balance,

            'fantasy_points' => $user->fantasy_points

        ]);
    }
    
}
