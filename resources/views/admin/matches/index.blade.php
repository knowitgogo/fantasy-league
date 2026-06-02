@extends('layouts.admin')

@section('content')

<div class="p-6">

    <!-- HEADER -->

    <div class="mb-6 flex items-center justify-between">

        <h1 class="text-3xl font-bold text-white">
            Matches
        </h1>

        <button onclick="openCreateModal()"
                class="rounded-lg bg-indigo-600 px-5 py-2 text-white hover:bg-indigo-700">

            Add Match

        </button>

    </div>

    <!-- SUCCESS MESSAGE -->

    @if(session('success'))

        <div class="mb-4 rounded-lg bg-green-500 p-3 text-white">

            {{ session('success') }}

        </div>

    @endif

    <!-- TABLE -->

    <div class="overflow-x-auto rounded-2xl border border-slate-700 bg-slate-900">

        <table class="w-full text-white">

            <thead class="bg-slate-800">

                <tr>

                    <th class="p-4 text-left">Tournament</th>
                    <th class="p-4 text-left">Team 1</th>
                    <th class="p-4 text-left">Team 2</th>
                    <th class="p-4 text-left">Date</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Actions</th>

                </tr>

            </thead>

            <tbody>

                @foreach($matches as $match)

                <tr class="border-t border-slate-700 hover:bg-slate-800">

                    <td class="p-4">

                        {{ $match->tournament->name }}

                    </td>

                    <td class="p-4">

                        {{ $match->team1->team_name }}

                    </td>

                    <td class="p-4">

                        {{ $match->team2->team_name }}

                    </td>

                    <td class="p-4">

                        {{ $match->match_date }}

                    </td>

                    <td class="p-4">

                        {{ $match->status }}

                    </td>

                    <td class="flex gap-2 p-4">

                        <!-- EDIT -->

                        <button
                            onclick="openEditModal(
                                '{{ $match->id }}',
                                '{{ $match->tournament_id }}',
                                '{{ $match->team1_id }}',
                                '{{ $match->team2_id }}',
                                '{{ $match->match_date }}',
                                '{{ $match->status }}'
                            )"
                            class="rounded bg-yellow-500 px-3 py-1 text-white hover:bg-yellow-600">

                            Edit

                        </button>

                        <!-- DELETE -->

                        <form action="{{ route('matches.destroy', $match->id) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this match?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="rounded bg-red-600 px-3 py-1 text-white hover:bg-red-700">

                                Delete

                            </button>

                        </form>

                        <a href="{{ route('matches.scores', $match->id) }}"
                        class="rounded bg-green-600 px-3 py-1 text-white hover:bg-green-700">

                            Update Scores

                        </a>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

<!-- CREATE MODAL -->

<div id="createModal"
     class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 p-4 backdrop-blur-sm">

    <div class="w-full max-w-lg rounded-2xl border border-slate-700 bg-slate-900 p-6 text-white shadow-2xl">

        <h2 class="mb-6 text-2xl font-bold">
            Create Match
        </h2>

        <form action="{{ route('matches.store') }}"
              method="POST"
              class="space-y-4">

            @csrf

            <!-- TOURNAMENT -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Tournament
                </label>

                <select name="tournament_id"
                        class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white">

                    <option value="">
                        Select Tournament
                    </option>

                    @foreach($tournaments as $tournament)

                        <option value="{{ $tournament->id }}">

                            {{ $tournament->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- TEAM 1 -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Team 1
                </label>

                <select name="team1_id"
                        class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white">

                    <option value="">
                        Select Team
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

                <label class="mb-2 block font-semibold text-slate-300">
                    Team 2
                </label>

                <select name="team2_id"
                        class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white">

                    <option value="">
                        Select Team
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

                <label class="mb-2 block font-semibold text-slate-300">
                    Match Date
                </label>

                <input type="datetime-local"
                       name="match_date"
                       class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white">

            </div>

            <!-- STATUS -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Status
                </label>

                <select name="status"
                        class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white">

                    <option value="Upcoming">Upcoming</option>
                    <option value="Live">Live</option>
                    <option value="Completed">Completed</option>

                </select>

            </div>

            <!-- BUTTONS -->

            <div class="flex justify-end gap-3 pt-2">

                <button type="button"
                        onclick="closeCreateModal()"
                        class="rounded-lg bg-slate-700 px-4 py-2 text-white hover:bg-slate-600">

                    Cancel

                </button>

                <button type="submit"
                        class="rounded-lg bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">

                    Save

                </button>

            </div>

        </form>

    </div>

</div>

<!-- EDIT MODAL -->

<div id="editModal"
     class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 p-4 backdrop-blur-sm">

    <div class="w-full max-w-lg rounded-2xl border border-slate-700 bg-slate-900 p-6 text-white shadow-2xl">

        <h2 class="mb-6 text-2xl font-bold">
            Edit Match
        </h2>

        <form id="editForm"
              method="POST"
              class="space-y-4">

            @csrf
            @method('PUT')

            <!-- TOURNAMENT -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Tournament
                </label>

                <select id="edit_tournament"
                        name="tournament_id"
                        class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white">

                    @foreach($tournaments as $tournament)

                        <option value="{{ $tournament->id }}">

                            {{ $tournament->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- TEAM 1 -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Team 1
                </label>

                <select id="edit_team1"
                        name="team1_id"
                        class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white">

                    @foreach($teams as $team)

                        <option value="{{ $team->id }}">

                            {{ $team->team_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- TEAM 2 -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Team 2
                </label>

                <select id="edit_team2"
                        name="team2_id"
                        class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white">

                    @foreach($teams as $team)

                        <option value="{{ $team->id }}">

                            {{ $team->team_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- DATE -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Match Date
                </label>

                <input type="datetime-local"
                       id="edit_match_date"
                       name="match_date"
                       class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white">

            </div>

            <!-- STATUS -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Status
                </label>

                <select id="edit_status"
                        name="status"
                        class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white">

                    <option value="Upcoming">Upcoming</option>
                    <option value="Live">Live</option>
                    <option value="Completed">Completed</option>

                </select>

            </div>

            <!-- BUTTONS -->

            <div class="flex justify-end gap-3 pt-2">

                <button type="button"
                        onclick="closeEditModal()"
                        class="rounded-lg bg-slate-700 px-4 py-2 text-white hover:bg-slate-600">

                    Cancel

                </button>

                <button type="submit"
                        class="rounded-lg bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">

                    Update

                </button>

            </div>

        </form>

    </div>

</div>

<!-- JAVASCRIPT -->

<script>

function openCreateModal()
{
    document.getElementById('createModal')
            .classList.remove('hidden');

    document.getElementById('createModal')
            .classList.add('flex');
}

function closeCreateModal()
{
    document.getElementById('createModal')
            .classList.add('hidden');
}

function openEditModal(id, tournament_id, team1_id, team2_id, match_date, status)
{
    document.getElementById('editForm')
            .action = '/admin/matches/' + id;

    document.getElementById('edit_tournament')
            .value = tournament_id;

    document.getElementById('edit_team1')
            .value = team1_id;

    document.getElementById('edit_team2')
            .value = team2_id;

    document.getElementById('edit_match_date')
            .value = match_date;

    document.getElementById('edit_status')
            .value = status;

    document.getElementById('editModal')
            .classList.remove('hidden');

    document.getElementById('editModal')
            .classList.add('flex');
}

function closeEditModal()
{
    document.getElementById('editModal')
            .classList.add('hidden');
}

</script>

@endsection