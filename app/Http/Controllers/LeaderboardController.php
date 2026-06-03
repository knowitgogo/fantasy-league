<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Matches_model;
use App\Models\Playerscore_model;
use App\Models\Leaderboards_model;
use App\Models\FantasyTeams_model;
use App\Models\FantasyTeamPlayers_model;

class LeaderboardController extends Controller
{
    public function generate($matchId)
    {
        // CLEAR OLD LEADERBOARD

        Leaderboards_model::where(
            'match_id',
            $matchId
        )->delete();

        // GET ALL FANTASY TEAMS OF MATCH

        $fantasyTeams = FantasyTeams_model::where(
            'match_id',
            $matchId
        )->get();

        $leaderboard = [];

        // CALCULATE USER TOTAL POINTS

        foreach ($fantasyTeams as $team)
        {
            $selectedPlayers = FantasyTeamPlayers_model::where(
                'fantasy_team_id',
                $team->id
            )->get();

            $totalPoints = 0;

            foreach ($selectedPlayers as $selectedPlayer)
            {
                $score = Playerscore_model::where(

                    'match_id',
                    $matchId

                )->where(

                    'player_id',
                    $selectedPlayer->player_id

                )->first();

                if ($score)
                {
                    $totalPoints += $score->fantasy_points;
                }
            }

            $leaderboard[] = [

                'user_id' => $team->user_id,

                'match_id' => $matchId,

                'total_points' => $totalPoints

            ];
        }

        // SORT HIGHEST POINTS FIRST

        usort($leaderboard, function ($a, $b) {

            return $b['total_points'] <=> $a['total_points'];

        });

        // SAVE RANKS

        $rank = 1;

        foreach ($leaderboard as $data)
        {
            Leaderboards_model::create([

                'match_id' => $data['match_id'],

                'user_id' => $data['user_id'],

                'total_points' => $data['total_points'],

                'rank' => $rank

            ]);

            // UPDATE USER WALLET

            $user = User::find($data['user_id']);

            if ($rank == 1)
            {
                $user->wallet_balance += 100;
            }
            elseif ($rank == 2)
            {
                $user->wallet_balance += 50;
            }
            elseif ($rank == 3)
            {
                $user->wallet_balance += 20;
            }

            $user->save();

            $rank++;
        }

        return redirect()->back()
                        ->with(
                            'success',
                            'Leaderboard Generated Successfully'
                        );
    }

    public function index($matchId)
    {
        $leaderboards = Leaderboards_model::with('user')

            ->where('match_id', $matchId)

            ->orderBy('rank')

            ->get();

        $match = Matches_model::with([
            'team1',
            'team2'
        ])->findOrFail($matchId);

        return view(
            'admin.leaderboard.index',
            compact(
                'leaderboards',
                'match'
            )
        );
    }
}