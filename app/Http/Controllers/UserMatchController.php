<?php

namespace App\Http\Controllers;

use App\Models\Matches_model;
use App\Services\MatchStatusService;
class UserMatchController extends Controller
{
    private MatchStatusService $matchStatusService;

    public function __construct(
        MatchStatusService $matchStatusService
    )
    {
        $this->matchStatusService = $matchStatusService;
    }
    public function index($id)
    {
        $this->matchStatusService->updateStatuses();
        $matches = Matches_model::with([

            'team1',
            'team2'

        ])->where(

            'tournament_id',
            $id

        )->paginate(10);

        return view(

            'user.matches.index',

            compact('matches')
        );
    }

    public function matchesApi($id)
    {
        $this->matchStatusService->updateStatuses();
        $matches = Matches_model::with([

            'team1',
            'team2'

        ])
        ->where(
            'tournament_id',
            $id
        )
        ->get();

        return response()->json(
            $matches
        );
    }
}
