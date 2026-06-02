<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teams_model;
use App\Models\Tournament_model;
class Teamcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teams = Teams_model::with('tournament')->get();

        $tournaments = Tournament_model::all();

        return view(
            'admin.teams.index',
            compact('teams', 'tournaments')
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
            'tournament_id' => 'required',

        ]);

        Teams_model::create([

            'team_name' => $request->name,
            'tournament_id' => $request->tournament_id,

        ]);

        return redirect()->back()
                        ->with('success', 'Team Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
            'tournament_id' => $request->tournament_id,

        ]);

        return redirect()->back()
                        ->with('success', 'Team Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $team = Teams_model::findOrFail($id);

        $team->delete();

        return redirect()->back()
                        ->with('success', 'Team Deleted Successfully');
    }
}
