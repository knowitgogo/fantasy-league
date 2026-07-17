<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teams_model;
use App\Models\Tournament_model;
use App\Models\Players_model;
use App\Exports\PlayersExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Teams_model::with('players')
            ->paginate(10);

        $players = Players_model::all();

        $tournaments = Tournament_model::all();

        return view(
            'admin.teams.index',
            compact(
                'teams',
                'players',
                'tournaments'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'players' => 'required|array|min:1'
        ]);

        $team = Teams_model::create([

            'team_name' => $request->name
        ]);

        if ($request->players) {
            $team->players()->sync(
                $request->players
            );
        }

        return redirect()->back()
            ->with('success', __('Team Created Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $team = Teams_model::with([
            'players',
            'tournaments'
        ])->findOrFail($id);

        return view(
            'admin.teams.show',
            compact('team')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $team = Teams_model::findOrFail($id);

        $team->update([

            'team_name' => $request->name,

        ]);

        $team->players()->sync(
            $request->players ?? []
        );

        return redirect()->back()
            ->with('success', __('Team Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $team = Teams_model::findOrFail($id);

        $team->delete();

        return redirect()->back()
            ->with('success', __('Team Deleted Successfully'));
    }

    /**
     * Downloads the list of players belonging to a specific team as a CSV file.
     * Fetches the team and related players, creates a streamed CSV file writing headers 
     * and player columns, and returns it as a browser attachment download.
     * 
     * Route: GET /api/admin/teams-api/{id}/download
     * 
     * @param string|int $id
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function downloadCsv($id)
    {
        $team = Teams_model::with('players')->findOrFail($id);

        $fileName = $team->team_name . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ];

        $callback = function () use ($team) {

            $file = fopen('php://output', 'w');

            fputcsv($file, [
                'Player',
                'Country',
                'Age',
                'Price'
            ]);

            foreach ($team->players as $player) {

                fputcsv($file, [
                    $player->player_name,
                    $player->country,
                    $player->age,
                    $player->player_price
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function downloadExcel($id)
    {
        return Excel::download(
            new PlayersExport($id),
            'players.xlsx'
        );
    }
    public function downloadPdf($id)
    {
        $team = Teams_model::with('players')->findOrFail($id);

        $pdf = Pdf::loadView(
            'pdf.team',
            compact('team')
        );

        return $pdf->download(
            $team->team_name . '.pdf'
        );
    }


    //api
    public function getTeams()
    {
        return response()->json(
            Teams_model::all()
        );
    }
    public function getTeamsApi()
    {
        $teams = Teams_model::with('players')->get();

        return response()->json($teams);
    }
    
    public function addTeamApi(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'players' => 'required|array|min:1'
        ]);

        $team = Teams_model::create([
            'team_name' => $request->name
        ]);

        $team->players()->sync($request->players);

        return response()->json([
            'message' => 'Team Created Successfully'
        ]);
    }
    public function updateTeamApi(Request $request, $id)
    {
        $team = Teams_model::findOrFail($id);

        $team->update([
            'team_name' => $request->name
        ]);

        $team->players()->sync($request->players ?? []);

        return response()->json([
            'message' => 'Team Updated Successfully'
        ]);
    }
    public function deleteTeamApi($id)
    {
        $team = Teams_model::findOrFail($id);

        $team->delete();

        return response()->json([
            'message' => 'Team Deleted Successfully'
        ]);
    }
    public function showApi($id)
    {
        $team = Teams_model::with([
            'players',
            'tournaments'
        ])->findOrFail($id);

        return response()->json($team);
    }
}
