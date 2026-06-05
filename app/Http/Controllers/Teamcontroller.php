<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teams_model;
use App\Models\Tournament_model;
use App\Models\Players_model;

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
            ->with('success', 'Team Created Successfully');
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
