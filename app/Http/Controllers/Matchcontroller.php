<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matches_model;
use App\Models\Tournament_model;
use App\Models\Teams_model;
class Matchcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matches = Matches_model::with([
            'tournament',
            'team1',
            'team2'
        ])->get();

        $tournaments = Tournament_model::all();

        $teams = Teams_model::all();

        return view(
            'admin.matches.index',
            compact(
                'matches',
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'tournament_id' => 'required',
            'team1_id' => 'required',
            'team2_id' => 'required',
            'match_date' => 'required',
            'status' => 'required',

        ]);

        Matches_model::create([

            'tournament_id' => $request->tournament_id,
            'team1_id' => $request->team1_id,
            'team2_id' => $request->team2_id,
            'match_date' => $request->match_date,
            'status' => $request->status,

        ]);

        return redirect()->back()
                        ->with('success', 'Match Created Successfully');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $match = Matches_model::findOrFail($id);

        $match->delete();

        return redirect()->back()
                        ->with('success', 'Match Deleted Successfully');
    }
}
