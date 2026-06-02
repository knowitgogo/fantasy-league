@extends('layouts.admin')

@section('content')

<div class="p-6">

    <!-- HEADER -->

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold text-white">
            Players
        </h1>

        <button onclick="openCreateModal()"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg">

            Add Player

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

                    <th class="p-4 text-left">Player Name</th>
                    <th class="p-4 text-left">Team</th>
                    <th class="p-4 text-left">Price</th>
                    <th class="p-4 text-left">Age</th>
                    <th class="p-4 text-left">Country</th>
                    <th class="p-4 text-left">Actions</th>

                </tr>

            </thead>

            <tbody>

                @foreach($players as $player)

                <tr class="border-t border-slate-700 hover:bg-slate-800 transition">

                    <td class="p-4">

                        {{ $player->player_name }}

                    </td>

                    <td class="p-4">

                        {{ $player->team->team_name }}

                    </td>


                    <td class="p-4">

                        {{ $player->player_price }}

                    </td>

                    <td class="p-4">

                        {{ $player->age }}

                    </td>

                    <td class="p-4">

                        {{ $player->country }}

                    </td>

                    <td class="p-4 flex gap-2">

                        <!-- EDIT -->

                        <button
                            onclick="openEditModal(
                                '{{ $player->id }}',
                                '{{ $player->player_name }}',
                                '{{ $player->team_id }}',
                                '{{ $player->age }}',
                                '{{ $player->country }}',

                                '{{ $player->player_price }}'
                            )"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">

                            Edit

                        </button>

                        <!-- DELETE -->

                        <form action="{{ route('players.destroy', $player->id) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this player?')">

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
            Create Player
        </h2>

        <form action="{{ route('players.store') }}"
              method="POST"
              class="space-y-4">

            @csrf

            <!-- PLAYER NAME -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Player Name
                </label>

                <input type="text"
                       name="player_name"
                       class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

            </div>

            <!-- TEAM -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Team
                </label>

                <select name="team_id"
                        class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

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

            <!-- AGE -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Age
                </label>

                <input type="number"
                       name="age"
                       class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

            </div>

            <!-- COUNTRY -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Country
                </label>

                <input type="text"
                       name="country"
                       class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

            </div>

            <!-- PRICE -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Player Price
                </label>

                <input type="number"
                    step="0.1"
                    name="player_price"
                    placeholder="Enter player price"
                    class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

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
            Edit Player
        </h2>

        <form id="editForm"
              method="POST"
              class="space-y-4">

            @csrf
            @method('PUT')

            <!-- PLAYER NAME -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Player Name
                </label>

                <input type="text"
                       id="edit_player_name"
                       name="player_name"
                       class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

            </div>

            <!-- TEAM -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Team
                </label>

                <select id="edit_team"
                        name="team_id"
                        class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

                    @foreach($teams as $team)

                        <option value="{{ $team->id }}">

                            {{ $team->team_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            

            <!-- PRICE -->

            <div>

                <label class="mb-2 block font-semibold text-slate-300">
                    Price
                </label>

                <input type="number"
                       step="0.1"
                       id="edit_player_price"
                       name="player_price"
                       class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">

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

function openEditModal(id, player_name, team_id, price)
{
    document.getElementById('editForm')
            .action = '/admin/players/' + id;

    document.getElementById('edit_player_name')
            .value = player_name;

    document.getElementById('edit_team')
            .value = team_id;

    document.getElementById('edit_player_price')
            .value = price;

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
