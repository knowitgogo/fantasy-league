<?php

namespace App\Http\Controllers;

use App\Models\Matches_model;

class UserMatchController extends Controller
{
    public function index($id)
    {
        $matches = Matches_model::with([

            'team1',
            'team2'

        ])->where(

            'tournament_id',
            $id

        )->get();

        return view(

            'user.matches.index',

            compact('matches')
        );
    }
}