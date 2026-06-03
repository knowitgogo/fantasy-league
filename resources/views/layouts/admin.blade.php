<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Admin Panel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-slate-950 text-white">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->

    <aside class="w-64 bg-slate-900 border-r border-slate-800">

        <!-- MENU -->

        <div class="p-6 text-2xl font-bold">

            Fantasy Admin

        </div>

        <nav class="px-4 space-y-2">

            <a href="{{ route('admin.dashboard') }}"
               class="block px-4 py-2 rounded hover:bg-slate-800">

                Dashboard

            </a>

            <a href="{{ route('tournaments.index') }}"
               class="block px-4 py-2 rounded hover:bg-slate-800">

                Tournaments

            </a>

            <a href="{{ route('teams.index') }}"
               class="block px-4 py-2 rounded hover:bg-slate-800">

                Teams

            </a>

            <a href="{{ route('players.index') }}"
               class="block px-4 py-2 rounded hover:bg-slate-800">

                Players

            </a>
            

                <a href="{{ route('matches.index') }}"
                class="block px-4 py-2 rounded hover:bg-slate-800">
    
                    Matches
                </a>

                <a href="{{ route('admin.users') }}"
                class="block px-4 py-2 rounded hover:bg-slate-800">
    
                    Users
                </a>

        </nav>

    </aside>

    <!-- MAIN CONTENT -->

    <main class="flex-1 p-6">

        @yield('content')

    </main>

</div>

</body>
</html>