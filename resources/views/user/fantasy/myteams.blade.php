@extends('layouts.user')

@section('content')

<div class="p-6">

    <!-- PAGE HEADER -->

    <div class="mb-6">

        <h1 class="text-3xl font-bold text-white">

            My Fantasy Teams

        </h1>

        <p class="mt-2 text-slate-400">

            View all your created fantasy teams

        </p>

    </div>

    <!-- TEAMS GRID -->

    <div class="grid gap-6 md:grid-cols-2">

        @forelse($fantasyTeams as $team)

            <div class="rounded-2xl border border-slate-700 bg-slate-900 p-6 shadow-lg">

                <div class="mb-4">

                    <h2 class="text-2xl font-bold text-white">

                        {{ $team->team_name }}

                    </h2>

                    <p class="mt-2 text-slate-400">

                        Match:

                        <span class="text-indigo-400">

                            {{ $team->match->team1->team_name }}
                            vs
                            {{ $team->match->team2->team_name }}

                        </span>

                    </p>

                </div>

                <div class="mt-6">

                    <span class="rounded-full bg-green-600/20 px-4 py-2 text-sm font-semibold text-green-400">

                        Team Created Successfully

                    </span>

                </div>

            </div>

        @empty

            <div class="rounded-2xl border border-slate-700 bg-slate-900 p-8 text-center text-slate-400">

                No fantasy teams created yet.

            </div>

        @endforelse

    </div>

</div>

@endsection