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
                    'match' => __('Team creation is closed for this match.')
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

                'captain' => __('Captain and Vice Captain must be selected from your chosen players.')

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
                    'team' => __('You have already created a team for this match.')
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
                __('Fantasy Team Created Successfully')
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




    ////api
    public function playingplayersApi($matchId)
    {
        $match = Matches_model::with([
            'team1.players',
            'team2.players'
        ])->findOrFail($matchId);

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

        

        return response()->json([

            'matchId' => $match->id,

            'team1Name' =>
                $match->team1->team_name,

            'team2Name' =>
                $match->team2->team_name,

            'team1Players' =>
                $team1Players,

            'team2Players' =>
                $team2Players

        ]);
    }
    public function storeApi(Request $request,$matchId) 
    {

        $request->validate([

            'team_name' => 'required',

            'players' => 'required|array|size:11',

            'captain' => 'required',

            'vice_captain' => 'required'

        ]);

        $fantasyTeam = FantasyTeams_model::create([

            'user_id' => Auth::id(),

            'match_id' => $matchId,

            'team_name' => $request->team_name

        ]);

        foreach ($request->players as $playerId) {

            FantasyTeamPlayers_model::create([

                'fantasy_team_id' =>
                $fantasyTeam->id,

                'player_id' =>
                $playerId,

                'is_captain' =>
                $playerId == $request->captain,

                'is_vice_captain' =>
                $playerId == $request->vice_captain

            ]);
        }

        return response()->json([

            'message' =>
            'Fantasy Team Created Successfully'

        ]);
    }

   public function myTeamsApi()
    {
        $fantasyTeams = FantasyTeams_model::with([

            'match.team1',
            'match.team2',
            'players'

        ])->where(
            'user_id',
            Auth::id()
        )->get();

        return response()->json(
            $fantasyTeams
        );
    }
    public function deleteTeamApi($id)
    {
        $team = FantasyTeams_model::findOrFail($id);

        $team->players()->detach();

        $team->delete();

        return response()->json([
            'message' => 'Team deleted successfully'
        ]);
    }
    public function editTeamApi($id)
    {
        $team = FantasyTeams_model::with([
            'players'
        ])->findOrFail($id);

        return response()->json($team);
    }
    public function updateTeamApi(Request $request, $id)
    {
        $request->validate([

            'team_name' => 'required',

            'players' => 'required|array|size:11',

            'captain' => 'required',

            'vice_captain' => 'required'

        ]);

        $team = FantasyTeams_model::findOrFail($id);

        $team->update([

            'team_name' => $request->team_name

        ]);

        FantasyTeamPlayers_model::where(
            'fantasy_team_id',
            $id
        )->delete();

        foreach ($request->players as $playerId) {

            FantasyTeamPlayers_model::create([

                'fantasy_team_id' => $id,

                'player_id' => $playerId,

                'is_captain' =>
                $playerId == $request->captain,

                'is_vice_captain' =>
                $playerId == $request->vice_captain

            ]);
        }

        return response()->json([

            'message' =>
            'Team Updated Successfully'

        ]);
    }
}


