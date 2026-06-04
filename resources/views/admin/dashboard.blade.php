@extends('layouts.admin')

@section('content')

<div>

    <!-- PAGE HEADER -->

    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>

            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">

                Control Center

            </p>

            <h1 class="mt-1 text-3xl font-bold text-white">

                Dashboard

            </h1>

        </div>

        <div class="rounded-xl border border-slate-700 bg-slate-900 px-4 py-3 text-sm text-slate-300">

            Welcome,
            <span class="font-semibold text-white">

                {{ auth()->user()->name }}

            </span>

        </div>

    </div>

    <!-- STATS CARDS -->

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-5">

        <!-- USERS -->

        <a href="{{ route('admin.users') }}"
           class="rounded-2xl border border-slate-700 bg-slate-900 p-6 shadow-lg transition duration-200 hover:scale-[1.03] hover:border-indigo-500">

            <div class="flex items-center justify-between">

                <p class="text-sm text-slate-400">

                    Total Users

                </p>

                <svg class="h-5 w-5 text-slate-400"
                     fill="currentColor"
                     viewBox="0 0 20 20">

                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1z"></path>

                </svg>

            </div>

            <p class="mt-4 text-4xl font-bold text-white">

                {{ $totalUsers }}

            </p>

            <p class="mt-2 text-sm text-slate-400">

                Active users

            </p>

        </a>

        <!-- TOURNAMENTS -->

        <a href="{{ route('tournaments.index') }}"
           class="rounded-2xl border border-slate-700 bg-slate-900 p-6 shadow-lg transition duration-200 hover:scale-[1.03] hover:border-indigo-500">

            <div class="flex items-center justify-between">

                <p class="text-sm text-slate-400">

                    Tournaments

                </p>

            </div>

            <p class="mt-4 text-4xl font-bold text-white">

                {{ $totalTournaments }}

            </p>

            <p class="mt-2 text-sm text-slate-400">

                Live & Upcoming

            </p>

        </a>

        <!-- TEAMS -->

        <a href="{{ route('teams.index') }}"
           class="rounded-2xl border border-slate-700 bg-slate-900 p-6 shadow-lg transition duration-200 hover:scale-[1.03] hover:border-indigo-500">

            <div class="flex items-center justify-between">

                <p class="text-sm text-slate-400">

                    Teams

                </p>

            </div>

            <p class="mt-4 text-4xl font-bold text-white">

                {{ $totalTeams }}

            </p>

            <p class="mt-2 text-sm text-slate-400">

                Registered Teams

            </p>

        </a>

        <!-- PLAYERS -->

        <a href="{{ route('players.index') }}"
           class="rounded-2xl border border-slate-700 bg-slate-900 p-6 shadow-lg transition duration-200 hover:scale-[1.03] hover:border-indigo-500">

            <div class="flex items-center justify-between">

                <p class="text-sm text-slate-400">

                    Players

                </p>

            </div>

            <p class="mt-4 text-4xl font-bold text-white">

                {{ $totalPlayers }}

            </p>

            <p class="mt-2 text-sm text-slate-400">

                In Database

            </p>

        </a>

        <!-- MATCHES -->

        <a href="{{ route('tournaments.index') }}"
           class="rounded-2xl border border-slate-700 bg-slate-900 p-6 shadow-lg transition duration-200 hover:scale-[1.03] hover:border-indigo-500">

            <div class="flex items-center justify-between">

                <p class="text-sm text-slate-400">

                    Matches

                </p>

            </div>

            <p class="mt-4 text-4xl font-bold text-white">

                {{ $totalMatches }}

            </p>

            <p class="mt-2 text-sm text-slate-400">

                Managed Through Tournaments

            </p>

        </a>

    </div>

    <!-- RECENT MATCHES -->

    <div class="mt-12">

        <h2 class="mb-6 text-2xl font-bold text-white">

            Recent Matches

        </h2>

        <div class="rounded-2xl border border-slate-700 bg-slate-900 p-6">

            <p class="text-slate-400">

                Recent matches will appear here.

            </p>

        </div>

    </div>

</div>

@endsection