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
            'team1.players',
            'team2.players'
        ])->findOrFail($matchId);

        if ($match->status != 'Upcoming') {
            return redirect()->back()
                ->withErrors([
                    'match' => 'Team creation is closed for this match.'
                ]);
        }

        $team1Players = MatchPlayers_model::with('player')
            ->where('match_id', $matchId)
            ->whereIn(
                'player_id',
                $match->team1->players->pluck('id')
            )
            ->get();

        $team2Players = MatchPlayers_model::with('player')
            ->where('match_id', $matchId)
            ->whereIn(
                'player_id',
                $match->team2->players->pluck('id')
            )
            ->get();

        return view(
            'user.fantasy.create',
            compact(
                'match',
                'team1Players',
                'team2Players'
            )
        );
    }
    public function store(Request $request, $matchId)
    {
        $request->validate([

            'team_name' => 'required',

            'players' => 'required|array|size:11',

            'captain' => 'required',

            'vice_captain' => 'required|different:captain'

        ]);

        if (
            !in_array($request->captain, $request->players)
            ||
            !in_array($request->vice_captain, $request->players)
        ) {
            return back()->withErrors([

                'captain' => 'Captain and Vice Captain must be selected from your chosen players.'

            ]);
        }

        // CREATE FANTASY TEAM
        $alreadyExists = FantasyTeams_model::where(
            'user_id',
            auth::id()
        )
            ->where(
                'match_id',
                $matchId
            )
            ->exists();

        if ($alreadyExists) {
            return redirect()->back()
                ->withErrors([
                    'team' => 'You have already created a team for this match.'
                ]);
        }
        $fantasyTeam = FantasyTeams_model::create([

            'user_id' => Auth::id(),

            'match_id' => $matchId,

            'team_name' => $request->team_name

        ]);

        // SAVE SELECTED PLAYERS

        foreach ($request->players as $playerId) {
            FantasyTeamPlayers_model::create([

                'fantasy_team_id' => $fantasyTeam->id,

                'player_id' => $playerId,

                'is_captain' => $playerId == $request->captain,

                'is_vice_captain' => $playerId == $request->vice_captain

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


    public function show($id)
    {
        $team = FantasyTeams_model::with([

            'match.team1',
            'match.team2',

            'players.player'

        ])->findOrFail($id);

        return view(

            'user.fantasy.show',

            compact('team')
        );
    }
}
