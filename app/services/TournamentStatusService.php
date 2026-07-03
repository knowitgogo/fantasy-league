<?php

namespace App\Services;

use App\Models\Tournament_model;

class TournamentStatusService
{
    public function updateStatuses()
    {
        $today = now();

        $tournaments = Tournament_model::all();

        foreach ($tournaments as $tournament) {

            if ($today->lt($tournament->start_date)) {

                $status = 'Upcoming';

            } elseif (
                $today->between(
                    $tournament->start_date,
                    $tournament->end_date
                )
            ) {

                $status = 'Live';

            } else {

                $status = 'Completed';

            }

            if ($tournament->status != $status) {

                $tournament->update([
                    'status' => $status
                ]);
            }
        }
    }
}