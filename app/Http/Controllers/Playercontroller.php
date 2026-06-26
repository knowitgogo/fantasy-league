<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Players_model;
use App\Models\Teams_model;
use App\Models\PlayerMatchPoints_model;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $players = Players_model::with('teams')
        //     ->paginate(10);

        // // $teams = Teams_model::all();

        // return view(
        //     'admin.players.index',
        //     compact('players')
        //     // compact('players', 'teams')
        // );
        $players = Players_model::paginate(10);

        return view('admin.players.index', compact('players'));
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

            'player_name' => 'required',
            // 'team_id' => 'required',
            'player_price' => 'required',

        ]);

        //$team = Teams_model::find($request->team_id);

        Players_model::create([

            'player_name' => $request->player_name,
            'player_price' => $request->player_price,
            'age' => $request->age,
            'country' => $request->country,

        ]);

        return redirect()->back()
            ->with('success', __('Player Added Successfully'));
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
        $player = Players_model::findOrFail($id);

        //its not used $team = Teams_model::find($request->team_id);

        $player->update([

            'player_name' => $request->player_name,
            'player_price' => $request->player_price,
            'age' => $request->age,
            'country' => $request->country,

        ]);

        return redirect()->back()
            ->with('success', __('Player Updated Successfully'));
    }


    //searching players
    public function search(Request $request)
    {
        $players = Players_model::where(
            'player_name',
            'LIKE',
            '%' . $request->keyword . '%'
        )->get();

        return response()->json($players);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $player = Players_model::findOrFail($id);

        $player->delete();

        return redirect()->back()
            ->with('success', __('Player Deleted Successfully'));
    }

    //api
    public function getPlayers()
    {
        $players = Players_model::all();

        return response()->json($players);
    }
    public function addPlayerApi(Request $request)
    {
        $request->validate([

            'player_name' => 'required',

            'player_price' => 'required',

        ]);

        $player = Players_model::create([

            'player_name' => $request->player_name,

            'player_price' => $request->player_price,

            'age' => $request->age,

            'country' => $request->country,

        ]);

        return response()->json([
            'success' => true,

            'message' => 'Player Added Successfully',

            'player' => $player,

        ]);
    }
    public function updatePlayerApi(Request $request, $id)
    {
        $request->validate([
            'player_name' => 'required',
            'player_price' => 'required',
        ]);

        $player = Players_model::findOrFail($id);

        $player->update([
            'player_name' => $request->player_name,
            'player_price' => $request->player_price,
            'age' => $request->age,
            'country' => $request->country,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Player Updated Successfully',
            'player' => $player,
        ]);
    }
    public function deletePlayerApi($id)
    {
        $player = Players_model::findOrFail($id);

        $player->delete();

        return response()->json([
            'success' => true,
            'message' => 'Player Deleted Successfully'
        ]);
    }
}
