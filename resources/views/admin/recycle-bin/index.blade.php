@extends('layouts.admin')

@section('content')

<div class="p-6">

    <h1 class="mb-8 text-3xl font-bold text-white">

        Recycle Bin

    </h1>

    <!-- TOURNAMENTS -->

    <div class="mb-8 rounded-2xl border border-slate-700 bg-slate-900 p-6">

        <h2 class="mb-4 text-xl font-bold text-red-400">

            Deleted Tournaments

        </h2>

        @forelse($tournaments as $tournament)

            <div class="mb-2 rounded-lg bg-slate-800 p-3">

                {{ $tournament->name }}

            </div>

        @empty

            <p class="text-slate-400">

                No deleted tournaments

            </p>

        @endforelse

        <div class="mt-6">
            {{ $tournaments->links() }}
        </div>

    </div>

    <!-- MATCHES -->

    <div class="mb-8 rounded-2xl border border-slate-700 bg-slate-900 p-6">

        <h2 class="mb-4 text-xl font-bold text-red-400">

            Deleted Matches

        </h2>

        @forelse($matches as $match)

            <div class="mb-2 rounded-lg bg-slate-800 p-3">

                {{ $match->team1->team_name }}
                vs
                {{ $match->team2->team_name }}

            </div>

        @empty

            <p class="text-slate-400">

                No deleted matches

            </p>

        @endforelse

        <div class="mt-6">
            {{ $matches->links() }}
        </div>

    </div>

    <!-- TEAMS -->

    <div class="mb-8 rounded-2xl border border-slate-700 bg-slate-900 p-6">

        <h2 class="mb-4 text-xl font-bold text-red-400">

            Deleted Teams

        </h2>

        @forelse($teams as $team)

            <div class="mb-2 rounded-lg bg-slate-800 p-3">

                {{ $team->team_name }}

            </div>

        @empty

            <p class="text-slate-400">

                No deleted teams

            </p>

        @endforelse

        <div class="mt-6">
            {{ $teams->links() }}
        </div>

    </div>

    <!-- PLAYERS -->

    <div class="mb-8 rounded-2xl border border-slate-700 bg-slate-900 p-6">

        <h2 class="mb-4 text-xl font-bold text-red-400">

            Deleted Players

        </h2>

        @forelse($players as $player)

            <div class="mb-2 rounded-lg bg-slate-800 p-3">

                {{ $player->player_name }}

            </div>

        @empty

            <p class="text-slate-400">

                No deleted players

            </p>

        @endforelse

        <div class="mt-6">
            {{ $players->links() }}
        </div>

    </div>

    <!-- USERS -->

    <div class="rounded-2xl border border-slate-700 bg-slate-900 p-6">

        <h2 class="mb-4 text-xl font-bold text-red-400">

            Deleted Users

        </h2>

        @forelse($users as $user)

            <div class="mb-2 rounded-lg bg-slate-800 p-3">

                {{ $user->name }}

            </div>

        @empty

            <p class="text-slate-400">

                No deleted users

            </p>

        @endforelse

        <div class="mt-6">
            {{ $users->links() }}
        </div>

    </div>

</div>

@endsection
