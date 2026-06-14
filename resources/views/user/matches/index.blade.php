@extends('layouts.user')

@section('content')

<div class="p-6">

    <!-- PAGE HEADER -->

    <div class="mb-6">

        <h1 class="text-3xl font-bold text-white">

            {{ __('Tournament Matches') }}

        </h1>

        <p class="mt-2 text-slate-400">

            {{ __('Select a match to create your fantasy team') }}

        </p>

    </div>

    <!-- MATCHES -->

    <div class="grid gap-6 md:grid-cols-2">

        @foreach($matches as $match)

            <div class="rounded-2xl border border-slate-700 bg-slate-900 p-6 shadow-lg transition hover:bg-slate-800">

                <div class="mb-4">

                    <h2 class="text-2xl font-bold text-white">

                        {{ $match->team1->team_name }}
                        {{ __('vs') }}
                        {{ $match->team2->team_name }}

                    </h2>

                    <p class="mt-2 text-slate-400">

                        {{ __('Match Date') }}:
                        {{ $match->match_date }}

                    </p>

                    <p class="mt-1 text-slate-400">

                        {{ __('Status') }}:
                        <span class="text-green-400">

                            {{ __($match->status) }}

                        </span>

                    </p>

                </div>

                <div class="mt-6 flex gap-4">

                    <a href="{{ route('fantasy.team.create', $match->id) }}"
                       class="rounded-xl bg-indigo-600 px-5 py-3 text-white transition hover:bg-indigo-700">

                        {{ __('Create Fantasy Team') }}

                    </a>

                    <a href="{{ route('user.leaderboard') }}"
                       class="rounded-xl bg-yellow-600 px-5 py-3 text-white transition hover:bg-yellow-700">

                        {{ __('View Leaderboard') }}

                    </a>

                </div>

            </div>

        @endforeach

    </div>

    <div class="mt-6">
        {{ $matches->links() }}
    </div>

</div>

@endsection
