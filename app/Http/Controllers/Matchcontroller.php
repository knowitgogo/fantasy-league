<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matches_model;
use App\Models\Tournament_model;
use App\Models\Teams_model;
use App\Models\Players_model;
use App\Models\MatchPlayers_model;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     // $matches = Matches_model::with([

    //     //     'tournament',
    //     //     'team1',
    //     //     'team2'

    //     // ])->get();

    //     // $tournaments = Tournament_model::select(

    //     //     'id',
    //     //     'name'

    //     // )->get();

    //     // $teams = Teams_model::select(

    //     //     'id',
    //     //     'team_name'

    //     // )->get();

    //     // return view(

    //     //     'admin.matches.index',

    //     //     compact(
    //     //         'matches',
    //     //         'tournaments',
    //     //         'teams'
    //     //     )

    //     // );
    // }

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
        $request->validate([

            'tournament_id' => 'required|exists:tournaments,id',

            'team1_id' => 'required|exists:teams,id',

            'team2_id' => 'required|exists:teams,id',

            'match_date' => 'required|date',

            'status' => 'required|in:Upcoming,Completed,Live',

        ]);

        // PREVENT SAME TEAM MATCH

        if ($request->team1_id == $request->team2_id) {
            return back()->withErrors([

                'team2_id' => 'Both teams cannot be same.'

            ]);
        }

        Matches_model::create([

            'tournament_id' => $request->tournament_id,

            'team1_id' => $request->team1_id,

            'team2_id' => $request->team2_id,

            'match_date' => $request->match_date,

            'status' => $request->status,

        ]);

        return redirect()->back()
            ->with(
                'success',
                'Match Created Successfully'
            );
    }


    public function storeTournamentMatch(
        Request $request,
        $tournamentId
    ) {
        $request->validate([

            'team1_id' => 'required|exists:teams,id',

            'team2_id' => 'required|exists:teams,id',

            'match_date' => 'required|date',

            'status' => 'required|in:Upcoming,Completed,Live'

        ]);

        if ($request->team1_id == $request->team2_id) {
            return back()->withErrors([

                'team2_id' => 'Both teams cannot be same.'

            ]);
        }

        Matches_model::create([

            'tournament_id' => $tournamentId,

            'team1_id' => $request->team1_id,

            'team2_id' => $request->team2_id,

            'match_date' => $request->match_date,

            'status' => $request->status

        ]);

        return redirect()->back()
            ->with(
                'success',
                'Match Created Successfully'
            );
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
        $request->validate([

            'tournament_id' => 'required|exists:tournaments,id',

            'team1_id' => 'required|exists:teams,id',

            'team2_id' => 'required|exists:teams,id',

            'match_date' => 'required|date',

            'status' => 'required|in:Upcoming,Completed,Live',

        ]);

        // PREVENT SAME TEAM MATCH

        if ($request->team1_id == $request->team2_id) {
            return back()->withErrors([

                'team2_id' => 'Both teams cannot be same.'

            ]);
        }

        $match = Matches_model::findOrFail($id);

        $match->update([

            'tournament_id' => $request->tournament_id,

            'team1_id' => $request->team1_id,

            'team2_id' => $request->team2_id,

            'match_date' => $request->match_date,

            'status' => $request->status,

        ]);

        return redirect()->back()
            ->with(
                'success',
                'Match Updated Successfully'
            );
    }

    /**
     * Remove the specified resource from storage.
     */


    public function managePlayers($matchId)
    {
        $match = Matches_model::with([
            'team1',
            'team2'
        ])->findOrFail($matchId);

        // TEAM 1 PLAYERS

        $team1Players = Players_model::where(
            'team_id',
            $match->team1_id
        )->get();

        // TEAM 2 PLAYERS

        $team2Players = Players_model::where(
            'team_id',
            $match->team2_id
        )->get();

        // ALREADY SELECTED PLAYERS

        $selectedPlayers = MatchPlayers_model::where(
            'match_id',
            $matchId
        )->pluck('player_id')->toArray();

        return view(

            'admin.matches.players',

            compact(
                'match',
                'team1Players',
                'team2Players',
                'selectedPlayers'
            )
        );
    }


    public function savePlayers(Request $request, $matchId)
    {
        $request->validate([

            'players' => 'required|array|min:11|max:11'

        ]);

        MatchPlayers_model::where(
            'match_id',
            $matchId
        )->delete();

        foreach ($request->players as $playerId) {
            MatchPlayers_model::create([

                'match_id' => $matchId,

                'player_id' => $playerId

            ]);
        }

        return redirect()->back()
            ->with(
                'success',
                'Playing players Updated Successfully'
            );
    }
    public function destroy(string $id)
    {
        $match = Matches_model::findOrFail($id);

        $match->delete();

        return redirect()->back()
            ->with(
                'success',
                'Match Deleted Successfully'
            );
    }
}
