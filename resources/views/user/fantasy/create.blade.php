@extends('layouts.user')

@section('content')

<div class="p-6">

    <!-- PAGE HEADER -->

    <div class="mb-6">

        <h1 class="text-3xl font-bold text-white">

            Create Fantasy Team

        </h1>

        <p class="mt-2 text-slate-400">

            {{ $match->team1->team_name }}
            vs
            {{ $match->team2->team_name }}

        </p>

    </div>

    <!-- ERROR MESSAGE -->

    @if($errors->any())

        <div class="mb-6 rounded-xl bg-red-600 p-4 text-white">

            {{ $errors->first() }}

        </div>

    @endif

    <!-- FORM -->

    <form action="{{ route('fantasy.team.store', $match->id) }}"
          method="POST">

        @csrf

        <!-- TEAM NAME -->

        <div class="mb-8 rounded-2xl border border-slate-700 bg-slate-900 p-6">

            <label class="mb-3 block text-lg font-semibold text-white">

                Fantasy Team Name

            </label>

            <input type="text"
                   name="team_name"
                   placeholder="Enter your fantasy team name"
                   class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

        </div>

        <!-- TEAM 1 PLAYERS -->

        <div class="mb-8 overflow-hidden rounded-2xl border border-slate-700 bg-slate-900">

            <div class="bg-indigo-600 px-6 py-4">

                <h2 class="text-xl font-bold text-white">

                    {{ $match->team1->team_name }} Playing XI

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
                            Price
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($players as $matchPlayer)

                        @if($matchPlayer->player->team_id == $match->team1_id)

                            <tr class="border-t border-slate-700 hover:bg-slate-800">

                                <!-- CHECKBOX -->

                                <td class="p-4">

                                    <input type="checkbox"
                                           name="players[]"
                                           value="{{ $matchPlayer->player->id }}"
                                           class="h-5 w-5 rounded border-slate-600 bg-slate-800 text-indigo-600">

                                </td>

                                <!-- PLAYER NAME -->

                                <td class="p-4 font-medium">

                                    {{ $matchPlayer->player->player_name }}

                                </td>

                                <!-- COUNTRY -->

                                <td class="p-4 text-slate-400">

                                    {{ $matchPlayer->player->country }}

                                </td>

                                <!-- PRICE -->

                                <td class="p-4 text-green-400 font-semibold">

                                    ₹{{ $matchPlayer->player->player_price }}

                                </td>

                            </tr>

                        @endif

                    @endforeach

                </tbody>

            </table>

        </div>

        <!-- TEAM 2 PLAYERS -->

        <div class="overflow-hidden rounded-2xl border border-slate-700 bg-slate-900">

            <div class="bg-green-600 px-6 py-4">

                <h2 class="text-xl font-bold text-white">

                    {{ $match->team2->team_name }} Playing XI

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
                            Price
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($players as $matchPlayer)

                        @if($matchPlayer->player->team_id == $match->team2_id)

                            <tr class="border-t border-slate-700 hover:bg-slate-800">

                                <!-- CHECKBOX -->

                                <td class="p-4">

                                    <input type="checkbox"
                                           name="players[]"
                                           value="{{ $matchPlayer->player->id }}"
                                           class="h-5 w-5 rounded border-slate-600 bg-slate-800 text-green-600">

                                </td>

                                <!-- PLAYER NAME -->

                                <td class="p-4 font-medium">

                                    {{ $matchPlayer->player->player_name }}

                                </td>

                                <!-- COUNTRY -->

                                <td class="p-4 text-slate-400">

                                    {{ $matchPlayer->player->country }}

                                </td>

                                <!-- PRICE -->

                                <td class="p-4 text-green-400 font-semibold">

                                    ₹{{ $matchPlayer->player->player_price }}

                                </td>

                            </tr>

                        @endif

                    @endforeach

                </tbody>

            </table>

        </div>

        <!-- SAVE BUTTON -->

        <div class="mt-8 flex justify-end">

            <button type="submit"
                    class="rounded-2xl bg-indigo-600 px-8 py-3 text-white transition hover:bg-indigo-700">

                Create Fantasy Team

            </button>

        </div>

    </form>

</div>

@endsection