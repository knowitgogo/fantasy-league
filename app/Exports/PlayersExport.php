<?php

namespace App\Exports;

use App\Models\Teams_model;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PlayersExport implements FromCollection, WithHeadings
{
    protected $teamId;

    public function __construct($teamId)
    {
        $this->teamId = $teamId;
    }

    public function collection()
    {
        $team = Teams_model::with('players')->findOrFail($this->teamId);

        return $team->players->map(function ($player) {
            return [
                $player->player_name,
                $player->country,
                $player->age,
                $player->player_price,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Player',
            'Country',
            'Age',
            'Price',
        ];
    }
}