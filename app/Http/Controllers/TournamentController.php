<?php

namespace App\Http\Controllers;

use App\Models\Teams_model;
use App\Models\Tournament_model;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tournaments = Tournament_model::paginate(10);

        $teams = Teams_model::all();

        return view(
            'admin.tournaments.index',
            compact(
                'tournaments',
                'teams'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tournaments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
            'teams' => 'array'
        ]);

        $tournament = Tournament_model::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
        ]);

        if ($request->teams) {
            $tournament->teams()->sync(
                $request->teams
            );
        }

        return redirect()->route('tournaments.index')
            ->with('success', 'Tournament Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tournament = Tournament_model::with([
            'teams',
            'matches.team1',
            'matches.team2'
        ])->findOrFail($id);

        $teams = $tournament->teams;

        return view(
            'admin.tournaments.show',
            compact(
                'tournament',
                'teams'
            )
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
        $tournament = Tournament_model::findOrFail($id);

        $tournament->update([

            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,

        ]);

        $tournament->teams()->sync(
            $request->teams ?? []
        );

        return redirect()->back()
            ->with('success', 'Tournament Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tournament = Tournament_model::findOrFail($id);

        $tournament->delete();

        return redirect()->back()
            ->with('success', 'Tournament Deleted');
    }
}
