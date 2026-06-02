<?php

namespace App\Http\Controllers;

use App\Models\Matches_model;

class UserMatchController extends Controller
{
    public function index()
    {
        $matches = Matches_model::with([
            'team1',
            'team2',
            'tournament'
        ])
        ->where('status', 'Upcoming')
        ->get();

        return view(
            'user.matches.index',
            compact('matches')
        );
    }
}