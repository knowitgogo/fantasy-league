<?php

namespace App\Http\Controllers;
use App\Models\Tournament_model;
use App\Models\Teams_model;
use App\Models\Players_model;
use App\Models\Matches_model;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
