<?php

namespace App\Http\Controllers;

use App\Models\Tournament_model;
use App\Models\Matches_model;
use App\Models\Teams_model;
use App\Models\Players_model;
use App\Models\User;

class RecycleBinController extends Controller
{
    public function index()
    {
        $tournaments = Tournament_model::onlyTrashed()->paginate(10, ['*'], 'tournaments_page');

        $matches = Matches_model::onlyTrashed()->with([
            'team1',
            'team2'
        ])->paginate(10, ['*'], 'matches_page');

        $teams = Teams_model::onlyTrashed()->paginate(10, ['*'], 'teams_page');

        $players = Players_model::onlyTrashed()->paginate(10, ['*'], 'players_page');

        $users = User::onlyTrashed()->paginate(10, ['*'], 'users_page');

        return view(
            'admin.recycle-bin.index',
            compact(
                'tournaments',
                'matches',
                'teams',
                'players',
                'users'
            )
        );
    }
}
