<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Matches_model;
use App\Models\Playerscore_model;
use App\Models\UserLeaderboard_model;
use App\Models\FantasyTeams_model;
use App\Models\FantasyTeamPlayers_model;

class LeaderboardController extends Controller
{
    public function generate($matchId)
    {
        $match = Matches_model::findOrFail($matchId);

        // PREVENT DUPLICATE GENERATION

        if ($match->leaderboard_generated) {
            return redirect()->back()
                ->with(
                    'error',
                    __('Leaderboard already generated for this match.')
                );
        }

        // CLEAR OLD LEADERBOARD

        UserLeaderboard_model::where(
            'match_id',
            $matchId
        )->delete();

        // GET ALL FANTASY TEAMS OF MATCH

        $fantasyTeams = FantasyTeams_model::where(
            'match_id',
            $matchId
        )->get();

        $leaderboard = [];

        foreach ($fantasyTeams as $team) {
            $selectedPlayers = FantasyTeamPlayers_model::where(
                'fantasy_team_id',
                $team->id
            )->get();

            $totalPoints = 0;

            foreach ($selectedPlayers as $selectedPlayer) {
                $score = Playerscore_model::where(
                    'match_id',
                    $matchId
                )->where(
                    'player_id',
                    $selectedPlayer->player_id
                )->first();

                if ($score) {
                    $totalPoints += $score->fantasy_points;
                    if ($selectedPlayer->is_captain) {
                        $totalPoints += $score->fantasy_points; // DOUBLE POINTS
                    } elseif ($selectedPlayer->is_vice_captain) {
                        $totalPoints += floor($score->fantasy_points) / 2; // HALF POINTS
                    }
                }
            }

            $leaderboard[] = [

                'user_id' => $team->user_id,

                'match_id' => $matchId,

                'total_points' => $totalPoints

            ];
        }

        // SORT HIGHEST TO LOWEST

        usort($leaderboard, function ($a, $b) {

            return $b['total_points'] <=> $a['total_points'];
        });

        // SAVE MATCH LEADERBOARD
        // UPDATE GLOBAL POINTS
        // UPDATE WALLET

        $rank = 1;

        foreach ($leaderboard as $data) {
            UserLeaderboard_model::create([

                'match_id' => $data['match_id'],

                'user_id' => $data['user_id'],

                'total_points' => $data['total_points'],

                'rank' => $rank

            ]);

            $user = User::find($data['user_id']);

            // GLOBAL FANTASY POINTS

            $user->fantasy_points += $data['total_points'];

            // REWARDS

            if ($rank == 1) {
                $user->wallet_balance += 100;
            } elseif ($rank == 2) {
                $user->wallet_balance += 50;
            } elseif ($rank == 3) {
                $user->wallet_balance += 20;
            }

            $user->save();

            $rank++;
        }

        // MARK MATCH AS GENERATED

        $match->leaderboard_generated = true;

        $match->save();

        return redirect()->back()
            ->with(
                'success',
                __('Leaderboard Generated Successfully')
            );
    }

    public function index($matchId)
    {
        $leaderboards = UserLeaderboard_model::with('user')

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


    public function globalLeaderboard()
    {
        $leaderboards = User::where(
            'role',
            'user'
        )
            ->orderByDesc(
                'fantasy_points'
            )
            ->get();

        return view(
            'admin.leaderboard.global',
            compact('leaderboards')
        );
    }


    public function globalLeaderboardApi()
    {
        $users = User::where(
            'role',
            'user'
        )
        ->orderByDesc(
            'fantasy_points'
        )
        ->select(
            'id',
            'name',
            'fantasy_points'
        )
        ->get();

        $users->each(function ($user, $index) {

            $user->rank = $index + 1;

        });

        return response()->json(
            $users
        );
    } 


    //api
    public function generateApi($matchId)
    {
        try {

            $match = Matches_model::findOrFail($matchId);

            // PREVENT DUPLICATE GENERATION

            if ($match->leaderboard_generated) {

                return response()->json([

                    'success' => false,

                    'message' => 'Leaderboard already generated for this match.'

                ], 409);

            }

            // CLEAR OLD LEADERBOARD

            UserLeaderboard_model::where(
                'match_id',
                $matchId
            )->delete();

            // GET ALL FANTASY TEAMS OF MATCH

            $fantasyTeams = FantasyTeams_model::where(
                'match_id',
                $matchId
            )->get();

            $leaderboard = [];

            foreach ($fantasyTeams as $team) {
                $selectedPlayers = FantasyTeamPlayers_model::where(
                    'fantasy_team_id',
                    $team->id
                )->get();

                $totalPoints = 0;

                foreach ($selectedPlayers as $selectedPlayer) {
                    $score = Playerscore_model::where(
                        'match_id',
                        $matchId
                    )->where(
                        'player_id',
                        $selectedPlayer->player_id
                    )->first();

                    if ($score) {
                        $totalPoints += $score->fantasy_points;
                        if ($selectedPlayer->is_captain) {
                            $totalPoints += $score->fantasy_points; // DOUBLE POINTS
                        } elseif ($selectedPlayer->is_vice_captain) {
                            $totalPoints += floor($score->fantasy_points) / 2; // HALF POINTS
                        }
                    }
                }

                $leaderboard[] = [

                    'user_id' => $team->user_id,

                    'match_id' => $matchId,

                    'total_points' => $totalPoints

                ];
            }

            // SORT HIGHEST TO LOWEST

            usort($leaderboard, function ($a, $b) {

                return $b['total_points'] <=> $a['total_points'];
            });

            // SAVE MATCH LEADERBOARD
            // UPDATE GLOBAL POINTS
            // UPDATE WALLET

            $rank = 1;

            foreach ($leaderboard as $data) {
                UserLeaderboard_model::create([

                    'match_id' => $data['match_id'],

                    'user_id' => $data['user_id'],

                    'total_points' => $data['total_points'],

                    'rank' => $rank

                ]);

                $user = User::find($data['user_id']);

                // GLOBAL FANTASY POINTS

                $user->fantasy_points += $data['total_points'];

                // REWARDS

                if ($rank == 1) {
                    $user->wallet_balance += 100;
                } elseif ($rank == 2) {
                    $user->wallet_balance += 50;
                } elseif ($rank == 3) {
                    $user->wallet_balance += 20;
                }

                $user->save();

                $rank++;
            }

            // MARK MATCH AS GENERATED

            $match->leaderboard_generated = true;

            $match->save();

            return response()->json([

                'message' => 'Leaderboard Generated Successfully'

            ]);

        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' => 'Unable to generate leaderboard. Please try again.'

            ], 500);

        }
    }
    public function indexApi($matchId)
    {
        $leaderboards = UserLeaderboard_model::with('user')

            ->where('match_id', $matchId)

            ->orderBy('rank')

            ->get();

        $match = Matches_model::with([
            'team1',
            'team2'
        ])->findOrFail($matchId);

        return response()->json([

            'match' => $match,

            'leaderboards' => $leaderboards

        ]);
    }
    
    public function AdminGlobalLeaderboardApi()
    {
        $users = User::where(
            'role',
            'user'
        )
        ->orderByDesc(
            'fantasy_points'
        )->get();

        $users->each(function ($user, $index) {

            $user->rank = $index + 1;

        });
        return response()->json(
            $users
        );

        
    }

}
