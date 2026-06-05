@extends('layouts.admin')

@php
use App\Models\Playerscore_model;
@endphp

@section('content')

<div class="p-6">

    <div class="mb-6">

        <h1 class="text-3xl font-bold text-white">

            Update Match Scores

        </h1>

        <p class="mt-2 text-slate-400">

            {{ $match->team1->team_name }}
            vs
            {{ $match->team2->team_name }}

        </p>

    </div>

    @if(session('success'))

        <div class="mb-4 rounded-lg bg-green-600 p-4 text-white">

            {{ session('success') }}

        </div>

    @endif

    <form action="{{ route('matches.scores.save', $match->id) }}"
          method="POST">

        @csrf

        <div class="overflow-hidden rounded-2xl border border-slate-700 bg-slate-900">

            <div class="bg-indigo-600 px-6 py-4">

                <h2 class="text-xl font-bold text-white">

                    Playing XI Players

                </h2>

            </div>

            <table class="w-full text-white">

                <thead class="bg-slate-800">

                    <tr>

                        <th class="p-4 text-left">

                            Player

                        </th>

                        <th class="p-4 text-left">

                            Existing Score

                        </th>

                        <th class="p-4 text-left">

                            Update Score

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($players as $matchPlayer)

                        @php

                            $player = $matchPlayer->player;

                            $existingScore = Playerscore_model::where(
                                'match_id',
                                $match->id
                            )->where(
                                'player_id',
                                $player->id
                            )->first();

                        @endphp

                        <tr class="border-t border-slate-700 hover:bg-slate-800">

                            <td class="p-4 font-medium">

                                {{ $player->player_name }}

                            </td>

                            <td class="p-4 text-green-400 font-bold">

                                {{ $existingScore->fantasy_points ?? 0 }}

                            </td>

                            <td class="p-4">

                                <input
                                    type="number"
                                    name="scores[{{ $player->id }}]"
                                    value="{{ $existingScore->fantasy_points ?? 0 }}"
                                    class="w-32 rounded-lg border border-slate-700 bg-slate-800 px-4 py-2 text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="mt-6 flex justify-end">

            <button type="submit"
                    class="rounded-xl bg-indigo-600 px-6 py-3 text-white transition hover:bg-indigo-700">

                Save Scores

            </button>

        </div>

    </form>

</div>

@endsection