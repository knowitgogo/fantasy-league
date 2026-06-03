@extends('layouts.admin')

@section('content')

<div class="p-6">

    <!-- PAGE HEADER -->

    <div class="mb-6">

        <h1 class="text-3xl font-bold text-white">

            Manage Playing XI

        </h1>

        <p class="mt-2 text-slate-400">

            {{ $match->team1->team_name }}
            vs
            {{ $match->team2->team_name }}

        </p>

    </div>

    <!-- SUCCESS MESSAGE -->

    @if(session('success'))

        <div class="mb-4 rounded-lg bg-green-600 p-4 text-white">

            {{ session('success') }}

        </div>

    @endif

    <!-- ERROR MESSAGE -->

    @if($errors->any())

        <div class="mb-4 rounded-lg bg-red-600 p-4 text-white">

            {{ $errors->first() }}

        </div>

    @endif

    <form action="{{ route('matches.players.save', $match->id) }}"
          method="POST">

        @csrf

        <!-- TEAM 1 PLAYERS -->

        <div class="mb-8 overflow-hidden rounded-2xl border border-slate-700 bg-slate-900">

            <div class="bg-indigo-600 px-6 py-4">

                <h2 class="text-xl font-bold text-white">

                    {{ $match->team1->team_name }} Players

                </h2>

            </div>

            <table class="w-full text-white">

                <thead class="bg-slate-800">

                    <tr>

                        <th class="p-4 text-left">
                            Select
                        </th>

                        <th class="p-4 text-left">
                            Player
                        </th>

                        <th class="p-4 text-left">
                            Country
                        </th>

                        <th class="p-4 text-left">
                            Age
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($team1Players as $player)

                        <tr class="border-t border-slate-700 hover:bg-slate-800">

                            <td class="p-4">

                                <input type="checkbox"
                                       name="players[]"
                                       value="{{ $player->id }}"

                                       @if(in_array($player->id, $selectedPlayers))
                                           checked
                                       @endif

                                       class="h-5 w-5 rounded border-slate-600 bg-slate-800 text-indigo-600">

                            </td>

                            <td class="p-4 font-medium">

                                {{ $player->player_name }}

                            </td>

                            <td class="p-4 text-slate-400">

                                {{ $player->country }}

                            </td>

                            <td class="p-4 text-slate-400">

                                {{ $player->age }}

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>


        <!-- TEAM 2 PLAYERS -->

        <div class="overflow-hidden rounded-2xl border border-slate-700 bg-slate-900">

            <div class="bg-green-600 px-6 py-4">

                <h2 class="text-xl font-bold text-white">

                    {{ $match->team2->team_name }} Players

                </h2>

            </div>

            <table class="w-full text-white">

                <thead class="bg-slate-800">

                    <tr>

                        <th class="p-4 text-left">
                            Select
                        </th>

                        <th class="p-4 text-left">
                            Player
                        </th>

                        <th class="p-4 text-left">
                            Country
                        </th>

                        <th class="p-4 text-left">
                            Age
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($team2Players as $player)

                        <tr class="border-t border-slate-700 hover:bg-slate-800">

                            <td class="p-4">

                                <input type="checkbox"
                                       name="players[]"
                                       value="{{ $player->id }}"

                                       @if(in_array($player->id, $selectedPlayers))
                                           checked
                                       @endif

                                       class="h-5 w-5 rounded border-slate-600 bg-slate-800 text-green-600">

                            </td>

                            <td class="p-4 font-medium">

                                {{ $player->player_name }}

                            </td>

                            <td class="p-4 text-slate-400">

                                {{ $player->country }}

                            </td>

                            <td class="p-4 text-slate-400">

                                {{ $player->age }}

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <!-- SAVE BUTTON -->

        <div class="mt-6 flex justify-end">

            <button type="submit"
                    class="rounded-xl bg-indigo-600 px-6 py-3 text-white transition hover:bg-indigo-700">

                Save Players

            </button>

        </div>

    </form>

</div>

@endsection