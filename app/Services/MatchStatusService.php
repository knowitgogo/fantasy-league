<?php

namespace App\Services;

use App\Models\Matches_model;
use Carbon\Carbon;

class MatchStatusService
{
    public function updateStatuses()
    {
        $now = Carbon::now();

        $matches = Matches_model::all();

        foreach ($matches as $match) {

            $start = Carbon::parse($match->match_date);

            $end = $start->copy()->addHours(4);

            if ($now->lt($start)) {

                $status = 'Upcoming';

            } elseif ($now->between($start, $end)) {

                $status = 'Live';

            } else {

                $status = 'Completed';

            }

            if ($match->status != $status) {

                $match->update([
                    'status' => $status
                ]);

            }
        }
    }
}