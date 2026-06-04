<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserLeaderboardController extends Controller
{
    public function index()
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

            'user.leaderboards.index',

            compact(
                'leaderboards'
            )
        );
    }
}