<?php

namespace App\Http\Controllers;

use App\Models\Tournament_model;

class UserTournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament_model::paginate(10);

        return view(
            'user.tournaments.index',
            compact('tournaments')
        );
    }

    public function tournamentsApi()
    {
        $tournaments =
            Tournament_model::orderBy('start_date')
                ->get();

        return response()->json(
            $tournaments
        );
    }
}


