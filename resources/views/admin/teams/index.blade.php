@extends('layouts.admin')

@section('content')
<x-app-layout>

<div class="p-6">

    <!-- HEADER -->

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold text-white">
            Teams
        </h1>

        <button onclick="openCreateModal()"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg">

            Add Team

        </button>

    </div>

    <!-- SUCCESS MESSAGE -->

    @if(session('success'))

        <div class="bg-green-500 text-white p-3 rounded-lg mb-4">

            {{ session('success') }}

        </div>

    @endif

    <!-- TABLE -->

    <div class="overflow-x-auto bg-slate-900 rounded-2xl border border-slate-700">

        <table class="w-full text-white">

            <thead class="bg-slate-800">

                <tr>

                    <th class="p-4 text-left">Team Name</th>
                    <th class="p-4 text-left">Tournament</th>
                    <th class="p-4 text-left">Actions</th>

                </tr>

            </thead>

            <tbody>

                @foreach($teams as $team)

                <tr class="border-t border-slate-700 hover:bg-slate-800 transition">

                    <td class="p-4">

                        {{ $team->team_name }}

                    </td>

                    <td class="p-4">

                        {{ $team->tournament->name }}

                    </td>

                    <td class="p-4 flex gap-2">

                        <!-- EDIT BUTTON -->

                        <button
                            onclick="openEditModal(
                                '{{ $team->id }}',
                                '{{ $team->team_name }}',
                                '{{ $team->tournament_id }}'
                            )"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">

                            Edit

                        </button>

                        <!-- DELETE -->

                        <form action="{{ route('teams.destroy', $team->id) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this team?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">

                                Delete

                            </button>

                        </form>

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

        <h2 class="mb-6 text-2xl font-bold text-white">
            Create Team
        </h2>

        <form action="{{ route('teams.store') }}"
              method="POST"
              class="space-y-4">

            @csrf

            <!-- TEAM NAME -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">

                    Team Name

                </label>

                <input type="text"
                       name="name"
                       class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

            </div>

            <!-- TOURNAMENT -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">

                    Tournament

                </label>

                <select name="tournament_id"
                        class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

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

            <!-- BUTTONS -->

            <div class="flex justify-end gap-3 pt-2">

                <button type="button"
                        onclick="closeCreateModal()"
                        class="rounded-lg bg-slate-700 px-4 py-2 text-white transition hover:bg-slate-600">

                    Cancel

                </button>

                <button type="submit"
                        class="rounded-lg bg-indigo-600 px-4 py-2 text-white transition hover:bg-indigo-700">

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

        <h2 class="mb-6 text-2xl font-bold text-white">
            Edit Team
        </h2>

        <form id="editForm"
              method="POST"
              class="space-y-4">

            @csrf
            @method('PUT')

            <!-- NAME -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">

                    Team Name

                </label>

                <input type="text"
                       id="edit_name"
                       name="name"
                       class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

            </div>

            <!-- TOURNAMENT -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">

                    Tournament

                </label>

                <select id="edit_tournament"
                        name="tournament_id"
                        class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

                    @foreach($tournaments as $tournament)

                        <option value="{{ $tournament->id }}">

                            {{ $tournament->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- BUTTONS -->

            <div class="flex justify-end gap-3 pt-2">

                <button type="button"
                        onclick="closeEditModal()"
                        class="rounded-lg bg-slate-700 px-4 py-2 text-white transition hover:bg-slate-600">

                    Cancel

                </button>

                <button type="submit"
                        class="rounded-lg bg-indigo-600 px-4 py-2 text-white transition hover:bg-indigo-700">

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

function openEditModal(id, name, tournament_id)
{
    document.getElementById('editForm')
            .action = '/admin/teams/' + id;

    document.getElementById('edit_name')
            .value = name;

    document.getElementById('edit_tournament')
            .value = tournament_id;

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

</x-app-layout>
@endsection
