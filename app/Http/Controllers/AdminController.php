<?php

namespace App\Http\Controllers;
use App\Models\Tournament_model;
use App\Models\Teams_model;
use App\Models\Players_model;
use App\Models\Matches_model;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\TournamentStatusService;
use App\Services\MatchStatusService;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
class AdminController extends Controller
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->matchStatusService->updateStatuses();
            $totalTournaments = Tournament_model::count();

            $totalTeams = Teams_model::count();

            $totalPlayers = Players_model::count();

            $totalMatches = Matches_model::count();

            $totalUsers = User::count();

            return view('admin.dashboard', compact(

                'totalTournaments',
                'totalTeams',
                'totalPlayers',
                'totalMatches',
                'totalUsers'

            ));     
    }

    //api
    
    public function dashboardApi()
    {
        $this->matchStatusService->updateStatuses();
        $this->statusService->updateStatuses();
        // ONE QUERY FOR MATCHES

        $matches = Matches_model::with([
            'team1',
            'team2'
        ])
        ->whereIn('status', [
            'Upcoming',
            'Live',
            'Completed'
        ])
        ->orderBy('match_date')
        ->get();

        return response()->json([

            // DASHBOARD COUNTS

            'totalUsers' => User::where(
                'role',
                'user'
            )->count(),

            'totalTournaments' => Tournament_model::count(),

            'totalTeams' => Teams_model::count(),

            'totalPlayers' => Players_model::count(),

            'totalMatches' => Matches_model::count(),

            // MATCH COUNTS (FROM COLLECTION)

            'liveMatches' => $matches
                ->where('status', 'Live')
                ->count(),

            'upcomingMatches' => $matches
                ->where('status', 'Upcoming')
                ->count(),

            'completedMatches' => $matches
                ->where('status', 'Completed')
                ->count(),

            // MATCH LISTS

            'liveMatchesList' => $matches
                ->where('status', 'Live')
                ->take(5)
                ->values(),

            'upcomingMatchesList' => $matches
                ->where('status', 'Upcoming')
                ->take(5)
                ->values()

        ]);
    }
    
    
    
    //practice --sample data from api
    public function externalUsers()
    {
        try {

            $response = Http::get(
                'https://jsonplaceholder.typicode.com/users'
            );

            return response()->json(
                $response->json()
            );

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Unable to fetch users.'
            ], 500);

        }
    }
}
