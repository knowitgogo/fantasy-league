<?php

namespace App\Http\Controllers;

use App\Models\Tournament_model;

class UserTournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament_model::all();

        return view(
            'user.tournaments.index',
            compact('tournaments')
        );
    }
}