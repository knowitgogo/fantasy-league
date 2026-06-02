@extends('layouts.user')

@section('content')

<div class="min-h-screen bg-slate-950 px-6 py-24">

    <!-- PAGE HEADER -->

    <div class="mb-10">

        <h1 class="text-4xl font-bold text-white">

            Upcoming Matches

        </h1>

        <p class="mt-2 text-slate-400">

            Create your fantasy teams and join contests

        </p>

    </div>

    <!-- MATCHES GRID -->

    <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">

        @foreach($matches as $match)

            <div class="rounded-3xl border border-slate-800 bg-slate-900 p-6 shadow-xl transition hover:-translate-y-1 hover:border-indigo-500 hover:shadow-indigo-500/10">

                <!-- TOURNAMENT -->

                <div class="mb-5 flex items-center justify-between">

                    <span class="rounded-full bg-indigo-600/20 px-4 py-1 text-sm font-medium text-indigo-400">

                        {{ $match->tournament->name }}

                    </span>

                    <span class="text-sm text-slate-400">

                        {{ $match->status }}

                    </span>

                </div>

                <!-- TEAMS -->

                <div class="mb-8">

                    <div class="flex items-center justify-between">

                        <!-- TEAM 1 -->

                        <div class="text-center">

                            <div class="mx-auto mb-3 flex h-16 w-16 items-center justify-center rounded-full bg-slate-800 text-2xl font-bold text-white">

                                {{ substr($match->team1->team_name, 0, 1) }}

                            </div>

                            <h2 class="text-lg font-semibold text-white">

                                {{ $match->team1->team_name }}

                            </h2>

                        </div>

                        <!-- VS -->

                        <div class="px-4">

                            <span class="text-2xl font-bold text-indigo-400">

                                VS

                            </span>

                        </div>

                        <!-- TEAM 2 -->

                        <div class="text-center">

                            <div class="mx-auto mb-3 flex h-16 w-16 items-center justify-center rounded-full bg-slate-800 text-2xl font-bold text-white">

                                {{ substr($match->team2->team_name, 0, 1) }}

                            </div>

                            <h2 class="text-lg font-semibold text-white">

                                {{ $match->team2->team_name }}

                            </h2>

                        </div>

                    </div>

                </div>

                <!-- MATCH DATE -->

                <div class="mb-6 rounded-2xl bg-slate-800 p-4 text-center">

                    <p class="text-sm text-slate-400">

                        Match Starts

                    </p>

                    <p class="mt-1 text-lg font-bold text-white">

                        {{ \Carbon\Carbon::parse($match->match_date)->format('d M Y, h:i A') }}

                    </p>

                </div>

                <!-- BUTTON -->

                <a href="#"
                   class="block rounded-2xl bg-indigo-600 px-5 py-3 text-center font-semibold text-white transition hover:bg-indigo-700">

                    Create Fantasy Team

                </a>

            </div>

        @endforeach

    </div>

</div>

@endsection