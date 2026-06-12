@extends('layouts.admin')

@section('content')

<div class="p-6">

    <div class="mb-6">

        <h1 class="text-3xl font-bold text-white">

            {{ $team->team_name }}

        </h1>

        <p class="text-slate-400 mt-2">

            Total Players:
            {{ $team->players->count() }}

        </p>

    </div>

    <div class="overflow-hidden rounded-2xl border border-slate-700 bg-slate-900">

        <table class="w-full text-white">

            <thead class="bg-slate-800">

                <tr>

                    <th class="p-4 text-left">
                        Player Name
                    </th>

                    <th class="p-4 text-left">
                        Country
                    </th>

                    <th class="p-4 text-left">
                        Age
                    </th>

                    <th class="p-4 text-left">
                        Price
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($team->players as $player)

                <tr class="border-t border-slate-700">

                    <td class="p-4">
                        {{ $player->player_name }}
                    </td>

                    <td class="p-4">
                        {{ $player->country }}
                    </td>

                    <td class="p-4">
                        {{ $player->age }}
                    </td>

                    <td class="p-4">
                        {{ $player->player_price }}
                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4"
                        class="p-6 text-center text-slate-400">

                        No Players Assigned

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">

        <a href="{{ route('teams.index') }}"
           class="rounded-lg bg-slate-700 px-4 py-2 text-white">

            Back

        </a>

    </div>

</div>

@endsection

