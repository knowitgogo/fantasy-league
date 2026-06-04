@extends('layouts.user')

@section('content')

<div class="p-6">

    <div class="mb-8">

        <h1 class="text-3xl font-bold text-white">

            {{ $team->team_name }}

        </h1>

        <p class="mt-2 text-slate-400">

            {{ $team->match->team1->team_name }}
            vs
            {{ $team->match->team2->team_name }}

        </p>

    </div>

    <div class="overflow-hidden rounded-2xl border border-slate-700 bg-slate-900">

        <table class="w-full text-white">

            <thead class="bg-slate-800">

                <tr>

                    <th class="p-4 text-left">
                        Player
                    </th>

                    <th class="p-4 text-left">
                        Team
                    </th>

                    <th class="p-4 text-left">
                        Role
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($team->players as $player)

                    <tr class="border-t border-slate-700">

                        <td class="p-4">

                            {{ $player->player->player_name }}

                        </td>

                        <td class="p-4">

                            {{ $player->player->team_name }}

                        </td>

                        <td class="p-4">

                            @if($player->is_captain)

                                <span class="rounded-lg bg-yellow-600 px-3 py-1 text-sm">

                                    Captain

                                </span>

                            @elseif($player->is_vice_captain)

                                <span class="rounded-lg bg-green-600 px-3 py-1 text-sm">

                                    Vice Captain

                                </span>

                            @else

                                Player

                            @endif

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection