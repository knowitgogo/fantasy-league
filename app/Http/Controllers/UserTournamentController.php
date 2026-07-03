<?php

namespace App\Http\Controllers;

use App\Models\Tournament_model;
use App\Services\TournamentStatusService;
class UserTournamentController extends Controller
{
    private TournamentStatusService $statusService;

    public function __construct(TournamentStatusService $statusService)
    {
        $this->statusService = $statusService;
    }
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
        $this->statusService->updateStatuses();
        $tournaments =
            Tournament_model::orderBy('start_date')
                ->get();

        return response()->json(
            $tournaments
        );
    }
}


