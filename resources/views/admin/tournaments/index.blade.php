@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-slate-950 px-6 py-8 text-slate-300">
    <div class="mx-auto max-w-7xl">
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-medium text-slate-400">Admin</p>
                <h1 class="mt-1 text-2xl font-semibold text-white">
                    Tournaments
                </h1>
            </div>

            <button onclick="openCreateModal()"
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg">

                Add Tournament

            </button>
        </div>

        @if(session('success'))
        <div class="mb-5 rounded-lg border border-slate-700 bg-slate-900 px-4 py-3 text-sm font-medium text-white">
            {{ session('success') }}
        </div>
        @endif

        <div class="overflow-hidden rounded-lg border border-slate-700 bg-slate-900 shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[760px] divide-y divide-slate-700">
                    <thead class="bg-slate-800">
                        <tr>
                            <th class="px-5 py-3 text-left text-xs font-medium uppercase text-slate-400">Name</th>
                            <th class="px-5 py-3 text-left text-xs font-medium uppercase text-slate-400">Start Date</th>
                            <th class="px-5 py-3 text-left text-xs font-medium uppercase text-slate-400">End Date</th>
                            <th class="px-5 py-3 text-left text-xs font-medium uppercase text-slate-400">Status</th>
                            <th class="px-5 py-3 text-left text-xs font-medium uppercase text-slate-400">Teams</th>
                            <th class="px-5 py-3 text-left text-xs font-medium uppercase text-slate-400">view</th>
                            <th class="px-5 py-3 text-left text-xs font-medium uppercase text-slate-400">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-700">
                        @foreach($tournaments as $tournament)
                        <tr class="transition hover:bg-slate-800">
                            <td class="px-5 py-4 text-sm font-medium text-white">
                                {{ $tournament->name }}
                            </td>

                            <td class="px-5 py-4 text-sm text-slate-400">
                                {{ $tournament->start_date }}
                            </td>

                            <td class="px-5 py-4 text-sm text-slate-400">
                                {{ $tournament->end_date }}
                            </td>

                            <td class="px-5 py-4 text-sm text-slate-300">
                                <span class="inline-flex rounded-lg border border-slate-700 bg-slate-800 px-2.5 py-1 text-xs font-medium text-slate-300">
                                    {{ $tournament->status }}
                                </span>

                            
                            </td>


                            <td class="px-5 py-4 text-sm text-slate-300">
                                {{ $tournament->teams()->count() }}
                            </td>
                            <td>

                                <a href="{{ route('tournaments.show', $tournament->id) }}"
                                    class="rounded-lg bg-indigo-600 px-4 py-2 text-white">

                                    View Matches

                                </a>

                            </td>

                            <td class="px-5 py-4">
                                <div class="flex items-center gap-2">
                                    <button
                                        onclick="openEditModal(
                                                    '{{ $tournament->id }}',
                                                    '{{ $tournament->name }}',
                                                    '{{ $tournament->start_date }}',
                                                    '{{ $tournament->end_date }}',
                                                    '{{ $tournament->status }}'
                                                )"
                                        class="bg-yellow-500 text-white px-3 py-1 rounded">

                                        Edit

                                    </button>

                                    <form action="{{ route('tournaments.destroy', $tournament->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this tournament?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="bg-red-600 text-white px-3 py-1 rounded">

                                            Delete

                                        </button>

                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6">
            {{ $tournaments->links() }}
        </div>
    </div>
</div>

<!-- CREATE MODAL -->

<div id="createModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 p-4 backdrop-blur-sm">

    <div class="w-full max-w-lg rounded-2xl border border-slate-700 bg-slate-900 p-6 text-white shadow-2xl">

        <h2 class="mb-6 text-2xl font-bold text-white">
            Create Tournament
        </h2>

        <form action="{{ route('tournaments.store') }}"
            method="POST"
            class="space-y-4">

            @csrf

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Tournament Name
                </label>

                <input type="text"
                    name="name"
                    class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

            </div>

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Start Date
                </label>

                <input type="date"
                    name="start_date"
                    class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

            </div>

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    End Date
                </label>

                <input type="date"
                    name="end_date"
                    class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

            </div>

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Status
                </label>

                <select name="status"
                    class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

                    <option value="upcoming">Upcoming</option>
                    <option value="active">Active</option>
                    <option value="completed">Completed</option>

                </select>

            </div>
            <div>

                <label class="mb-2 block font-semibold text-slate-300">

                    Select Teams

                </label>

                <div class="max-h-60 overflow-y-auto rounded-lg border border-slate-700 p-3">

                    @foreach($teams as $team)

                    <label class="mb-2 flex items-center gap-2">

                        <input type="checkbox"
                            name="teams[]"
                            value="{{ $team->id }}">

                        {{ $team->team_name }}

                    </label>

                    @endforeach

                </div>

            </div>

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
            Edit Tournament
        </h2>

        <form id="editForm"
            method="POST"
            class="space-y-4">

            @csrf
            @method('PUT')

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Tournament Name
                </label>

                <input type="text"
                    id="edit_name"
                    name="name"
                    class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

            </div>

            <div>

                <label class="mb-2 block font-semibold text-slate-300">

                    Teams

                </label>

                <div class="max-h-60 overflow-y-auto rounded-lg border border-slate-700 p-3">

                    @foreach($teams as $team)

                    <label class="mb-2 flex items-center gap-2">

                        <input type="checkbox"
                            name="teams[]"
                            value="{{ $team->id }}">

                        {{ $team->team_name }}

                    </label>

                    @endforeach

                </div>

            </div>

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Start Date
                </label>

                <input type="date"
                    id="edit_start_date"
                    name="start_date"
                    class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

            </div>

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    End Date
                </label>

                <input type="date"
                    id="edit_end_date"
                    name="end_date"
                    class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

            </div>

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Status
                </label>

                <select id="edit_status"
                    name="status"
                    class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

                    <option value="upcoming">Upcoming</option>
                    <option value="active">Active</option>
                    <option value="completed">Completed</option>

                </select>

            </div>

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



<script>
    function openCreateModal() {
        document.getElementById('createModal')
            .classList.remove('hidden');

        document.getElementById('createModal')
            .classList.add('flex');
    }

    function closeCreateModal() {
        document.getElementById('createModal')
            .classList.add('hidden');
    }

    function openEditModal(id, name, start, end, status) {
        document.getElementById('editForm')
            .action = '/admin/tournaments/' + id;

        document.getElementById('edit_name').value = name;
        document.getElementById('edit_start_date').value = start;
        document.getElementById('edit_end_date').value = end;
        document.getElementById('edit_status').value = status;

        document.getElementById('editModal')
            .classList.remove('hidden');

        document.getElementById('editModal')
            .classList.add('flex');
    }

    function closeEditModal() {
        document.getElementById('editModal')
            .classList.add('hidden');
    }
</script>
@endsection