@extends('layouts.admin')

@section('content')

<div class="p-6">

    <!-- TOURNAMENT HEADER -->

    <div class="mb-8">

        <h1 class="text-3xl font-bold text-white">

            {{ $tournament->name }}

        </h1>

        <p class="mt-2 text-slate-400">

            {{ __('Status') }}: {{ __($tournament->status) }}

        </p>

        <p class="text-slate-400">

            {{ $tournament->start_date }}
            -
            {{ $tournament->end_date }}

        </p>

        <div class="mt-6 rounded-2xl border border-slate-700 bg-slate-900 p-6">

            <h2 class="mb-4 text-xl font-bold text-white">

                {{ __('Participating Teams') }}

            </h2>

            <div class="flex flex-wrap gap-3">

                @foreach($tournament->teams as $team)

                <span
                    class="rounded-lg bg-indigo-600 px-4 py-2 text-white">

                    {{ $team->team_name }}

                </span>

                @endforeach

            </div>

        </div>

    </div>

    <!-- SUCCESS MESSAGE -->

    @if(session('success'))

    <div class="mb-6 rounded-lg bg-green-600 p-4 text-white">

        {{ session('success') }}

    </div>

    @endif

    <!-- VALIDATION ERROR -->

    @if($errors->any())

    <div class="mb-6 rounded-lg bg-red-600 p-4 text-white">

        {{ $errors->first() }}

    </div>

    @endif

    <!-- CREATE MATCH FORM -->

    <div class="mb-8 rounded-2xl border border-slate-700 bg-slate-900 p-6">

        <h2 class="mb-6 text-xl font-bold text-white">

            {{ __('Create Match') }}

        </h2>
        

        <form action="{{ route('tournaments.matches.store', $tournament->id) }}"
            method="POST">

            @csrf

            <div class="grid gap-4 md:grid-cols-2">

                <!-- TEAM 1 -->

                <div>

                    <label class="mb-2 block text-sm text-slate-300">

                        Team 1

                    </label>

                    <select name="team1_id"
                        class="w-full rounded-lg border border-slate-700 bg-slate-800 p-3 text-white">

                        <option value="">

                            {{ __('Select Team') }}

                        </option>

                        @foreach($teams as $team)

                        <option value="{{ $team->id }}">

                            {{ $team->team_name }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <!-- TEAM 2 -->

                <div>

                    <label class="mb-2 block text-sm text-slate-300">

                        Team 2

                    </label>

                    <select name="team2_id"
                        class="w-full rounded-lg border border-slate-700 bg-slate-800 p-3 text-white">

                        <option value="">

                            {{ __('Select Team') }}

                        </option>

                        @foreach($teams as $team)

                        <option value="{{ $team->id }}">

                            {{ $team->team_name }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <!-- DATE -->

                <div>

                    <label class="mb-2 block text-sm text-slate-300">

                        {{ __('Match Date') }}

                    </label>

                    <input type="datetime-local"
                        name="match_date"
                        class="w-full rounded-lg border border-slate-700 bg-slate-800 p-3 text-white">

                </div>

                <!-- STATUS -->

                <div>

                    <label class="mb-2 block text-sm text-slate-300">

                        {{ __('Status') }}

                    </label>

                    <select name="status"
                        class="w-full rounded-lg border border-slate-700 bg-slate-800 p-3 text-white">

                        <option value="Upcoming">

                            {{ __('Upcoming') }}

                        </option>

                        <option value="Live">

                            {{ __('Live') }}

                        </option>

                        <option value="Completed">

                            {{ __('Completed') }}

                        </option>

                    </select>

                </div>

            </div>

            <button type="submit"
                class="mt-6 rounded-lg bg-indigo-600 px-5 py-3 text-white hover:bg-indigo-700">

                {{ __('Create Match') }}

            </button>

        </form>

    </div>

    <!-- MATCHES TABLE -->

    <div class="overflow-hidden rounded-2xl border border-slate-700 bg-slate-900">

        <table class="w-full text-white">

            <thead class="bg-slate-800">

                <tr>

                    <th class="p-4 text-left">

                        {{ __('Match') }}

                    </th>

                    <th class="p-4 text-left">

                        {{ __('Date') }}

                    </th>

                    <th class="p-4 text-left">

                        {{ __('Status') }}

                    </th>

                    <th class="p-4 text-left">

                        {{ __('Actions') }}

                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($tournament->matches as $match)

                <tr class="border-t border-slate-700">

                    <td class="p-4">

                        {{ $match->team1?->team_name ?? __('Unknown Team') }}
                        {{ __('vs') }}
                        {{ $match->team2?->team_name ?? __('Unknown Team') }}

                    </td>

                    <td class="p-4">

                        {{ $match->match_date }}

                    </td>

                    <td class="p-4">

                        {{ __($match->status) }}

                    </td>

                    <td class="p-4">

                        <div class="flex flex-wrap gap-2">

                            <a href="{{ route('matches.players.manage', $match->id) }}"
                                class="rounded-lg bg-green-600 px-3 py-2 text-sm text-white">

                                {{ __('Playing XI') }}

                            </a>

                            <a href="{{ route('matches.scores', $match->id) }}"
                                class="rounded-lg bg-blue-600 px-3 py-2 text-sm text-white">

                                {{ __('Update Scores') }}

                            </a>

                            <a href="{{ route('leaderboard.generate', $match->id) }}"
                                class="rounded-lg bg-yellow-600 px-3 py-2 text-sm text-white">

                                {{ __('Generate Leaderboard') }}

                            </a>

                            <!-- <a href="{{ route('leaderboard.index', $match->id) }}"
                                class="rounded-lg bg-purple-600 px-3 py-2 text-sm text-white">

                                {{ __('View Leaderboard') }}

                            </a> -->

                            <form action="/admin/matches/{{ $match->id }}"
                                method="POST"
                                data-confirm="{{ __('Delete this match?') }}"
                                onsubmit="return confirm(this.dataset.confirm)">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="rounded-lg bg-red-600 px-3 py-2 text-sm text-white">

                                    {{ __('Delete') }}

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4"
                        class="p-6 text-center text-slate-400">

                        {{ __('No Matches Found') }}

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
