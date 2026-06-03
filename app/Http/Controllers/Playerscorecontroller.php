<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playerscore_model;
use App\Models\Matches_model;
use App\Models\Players_model;

class PlayerscoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playerScores = Playerscore_model::with([
            'match',
            'player'
        ])->get();



        $players = Players_model::select(
            'id',
            'player_name',
            'team_name'
        )->get();

        return view(
            'admin.player_scores.index',
            compact(
                'playerScores',
                'players'
            )
        );
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
        $request->validate([

            'match_id' => 'required',
            'player_id' => 'required',
            'fantasy_points' => 'required',

        ]);

        Playerscore_model::create([

            'match_id' => $request->match_id,
            'player_id' => $request->player_id,
            'fantasy_points' => $request->fantasy_points,

        ]);

        return redirect()->back()
            ->with('success', 'Player Score Added');
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

            'match_id' => 'required|exists:matchess,id',

            'player_id' => 'required|exists:players,id',

            'fantasy_points' => 'required|integer|min:0'

        ]);

        $playerScore = Playerscore_model::findOrFail($id);

        $playerScore->update([

            'match_id' => $request->match_id,

            'player_id' => $request->player_id,

            'fantasy_points' => $request->fantasy_points,

        ]);

        return redirect()->back()
            ->with('success', 'Player Score Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $playerScore = Playerscore_model::findOrFail($id);

        $playerScore->delete();

        return redirect()->back()
            ->with('success', 'Player Score Deleted');
    }


    public function manageScores($matchId)
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

        return view(

            'admin.playerscores.manage',

            compact(
                'match',
                'team1Players',
                'team2Players'
            )
        );
    }

    public function saveScores(Request $request, $matchId)
    {
        $request->validate([

            'scores' => 'required|array',

            'scores.*' => 'required|integer|min:0'

        ]);

        foreach ($request->scores as $playerId => $score) {
            Playerscore_model::updateOrCreate(

                [
                    'match_id' => $matchId,
                    'player_id' => $playerId
                ],

                [
                    'fantasy_points' => $score
                ]

            );
        }

        return redirect()->back()
            ->with('success', 'Scores Updated Successfully');
    }
}
