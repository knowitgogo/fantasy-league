
@extends('layouts.admin')

@section('content')

<div class="p-6">

    <!-- HEADER -->

    <div class="mb-8">

        <h1 class="text-3xl font-bold text-white">

            Registered Users

        </h1>

        <p class="mt-2 text-slate-400">

            All fantasy platform users

        </p>

    </div>

    <!-- USERS TABLE -->

    <div class="overflow-x-auto rounded-2xl border border-slate-700 bg-slate-900">

        <table class="w-full text-white">

            <thead class="bg-slate-800">

                <tr>

                    <th class="p-4 text-left">
                        ID
                    </th>

                    <th class="p-4 text-left">
                        Name
                    </th>

                    <th class="p-4 text-left">
                        Email
                    </th>

                    <th class="p-4 text-left">
                        Joined
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($users as $user)

                    <tr class="border-t border-slate-700 hover:bg-slate-800">

                        <td class="p-4">

                            {{ $user->id }}

                        </td>

                        <td class="p-4">

                            {{ $user->name }}

                        </td>

                        <td class="p-4">

                            {{ $user->email }}

                        </td>

                        <td class="p-4 text-slate-400">

                            {{ $user->created_at->format('d M Y') }}

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <div class="mt-6">
        {{ $users->links() }}
    </div>

</div>

@endsection


<a href="{{ route('admin.users') }}"
   class="block rounded-lg px-4 py-2 text-slate-300 hover:bg-slate-800 hover:text-white">

    Users

</a>
