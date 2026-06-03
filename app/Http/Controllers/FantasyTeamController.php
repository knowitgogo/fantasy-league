<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Matches_model;
use App\Models\MatchPlayers_model;
use App\Models\FantasyTeams_model;
use App\Models\FantasyTeamPlayers_model;


class FantasyTeamController extends Controller
{
    public function create($matchId)
    {
        $match = Matches_model::with([

            'team1',
            'team2'

        ])->findOrFail($matchId);

        // PLAYING XI ONLY

        $players = MatchPlayers_model::with('player')

            ->where('match_id', $matchId)

            ->get();

        return view(

            'user.fantasy.create',

            compact(
                'match',
                'players'
            )
        );
    }

    public function store(Request $request, $matchId)
    {
        $request->validate([

            'team_name' => 'required',

            'players' => 'required|array|min:1'

        ]);

        // CREATE FANTASY TEAM

        $fantasyTeam = FantasyTeams_model::create([

            'user_id' => Auth::id(),

            'match_id' => $matchId,

            'team_name' => $request->team_name

        ]);

        // SAVE SELECTED PLAYERS

        foreach ($request->players as $playerId) {
            FantasyTeamPlayers_model::create([

                'fantasy_team_id' => $fantasyTeam->id,

                'player_id' => $playerId

            ]);
        }

        return redirect()

            ->route('user.dashboard')

            ->with(
                'success',
                'Fantasy Team Created Successfully'
            );
    }


    public function myTeams()
    {
        $fantasyTeams = FantasyTeams_model::with([

            'match.team1',
            'match.team2'

        ])->where(

            'user_id',
            Auth::id()

        )->get();

        return view(

            'user.fantasy.myteams',

            compact('fantasyTeams')
        );
    }
}
