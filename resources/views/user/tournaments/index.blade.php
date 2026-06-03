@extends('layouts.user')

@section('content')

<div class="p-6">

    <!-- PAGE TITLE -->

    <div class="mb-6">

        <h1 class="text-3xl font-bold text-white">

            Tournaments

        </h1>

        <p class="mt-2 text-slate-400">

            Select a tournament to view matches

        </p>

    </div>

    <!-- TOURNAMENT GRID -->

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

        @foreach($tournaments as $tournament)

            <div class="rounded-2xl border border-slate-700 bg-slate-900 p-6 shadow-lg transition hover:scale-[1.02] hover:bg-slate-800">

                <div class="mb-4">

                    <h2 class="text-2xl font-bold text-white">

                        {{ $tournament->name }}

                    </h2>

                    <p class="mt-2 text-slate-400">

                        Status:
                        <span class="text-green-400">

                            {{ $tournament->status }}

                        </span>

                    </p>

                </div>

                <div class="mt-6">

                    <a href="{{ route('user.matches', $tournament->id) }}"
                       class="inline-flex rounded-xl bg-indigo-600 px-5 py-3 text-white transition hover:bg-indigo-700">

                        View Matches

                    </a>

                </div>

            </div>

        @endforeach

    </div>

</div>

@endsection