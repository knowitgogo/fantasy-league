@extends('layouts.admin')

@section('content')

<div class="p-6">

    <div class="mb-6">

        <h1 class="text-3xl font-bold text-white">

            Match Leaderboard

        </h1>

        <p class="mt-2 text-slate-400">

            {{ $match->team1->team_name }}
            vs
            {{ $match->team2->team_name }}

        </p>

    </div>

    <div class="overflow-hidden rounded-2xl border border-slate-700 bg-slate-900">

        <table class="w-full text-white">

            <thead class="bg-slate-800">

                <tr>

                    <th class="p-4 text-left">
                        Rank
                    </th>

                    <th class="p-4 text-left">
                        User
                    </th>

                    <th class="p-4 text-left">
                        Fantasy Points
                    </th>

                    <th class="p-4 text-left">
                        Wallet Balance
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($leaderboards as $leaderboard)

                    <tr class="border-t border-slate-700 hover:bg-slate-800">

                        <td class="p-4 font-bold text-yellow-400">

                            #{{ $leaderboard->rank }}

                        </td>

                        <td class="p-4">

                            {{ $leaderboard->user->name }}

                        </td>

                        <td class="p-4 text-green-400 font-bold">

                            {{ $leaderboard->total_points }}

                        </td>

                        <td class="p-4 text-indigo-400 font-bold">

                            ₹{{ $leaderboard->user->wallet_balance }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4"
                            class="p-6 text-center text-slate-400">

                            No leaderboard data available.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection