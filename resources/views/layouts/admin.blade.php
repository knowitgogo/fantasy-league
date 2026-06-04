<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Fantasy Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-slate-950 text-slate-300">

    <div class="min-h-screen bg-slate-950 text-slate-300">

        <aside class="hidden lg:fixed lg:inset-y-0 lg:left-0 lg:z-40 lg:flex lg:w-64 lg:flex-col lg:border-r lg:border-slate-700 lg:bg-slate-900">

            <div class="flex items-center gap-3 border-b border-slate-700 px-5 py-5">

                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-600 text-sm font-semibold text-white">

                    FA

                </div>

                <div>

                    <h1 class="text-base font-semibold text-white">

                        Fantasy Admin

                    </h1>

                    <p class="text-xs text-slate-400">

                        Control Panel

                    </p>

                </div>

            </div>

            <nav class="flex-1 space-y-1 px-3 py-4">

                <a href="{{ route('admin.dashboard') }}"
                    class="group flex items-center rounded-xl px-3 py-3 text-sm font-medium text-slate-400 transition hover:bg-indigo-600 hover:text-white">

                    Dashboard

                </a>

                <a href="{{ route('tournaments.index') }}"
                    class="group flex items-center rounded-xl px-3 py-3 text-sm font-medium text-slate-400 transition hover:bg-indigo-600 hover:text-white">

                    Tournaments

                </a>

                <a href="{{ route('teams.index') }}"
                    class="group flex items-center rounded-xl px-3 py-3 text-sm font-medium text-slate-400 transition hover:bg-indigo-600 hover:text-white">

                    Teams

                </a>

                <a href="{{ route('players.index') }}"
                    class="group flex items-center rounded-xl px-3 py-3 text-sm font-medium text-slate-400 transition hover:bg-indigo-600 hover:text-white">

                    Players

                </a>

                <a href="{{ route('admin.users') }}"
                    class="group flex items-center rounded-xl px-3 py-3 text-sm font-medium text-slate-400 transition hover:bg-indigo-600 hover:text-white">

                    Users

                </a>

                <a href="{{ route('leaderboard.global') }}"
                    class="group flex items-center rounded-xl px-3 py-3 text-sm font-medium text-slate-400 transition hover:bg-indigo-600 hover:text-white">

                    Global Leaderboard

                </a>



            </nav>

            <div class="border-t border-slate-700 px-4 py-4">

                <div class="flex items-center justify-between">

                    <div class="flex items-center gap-3">

                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-800 text-sm font-semibold text-white">

                            {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                        </div>

                        <div>

                            <p class="text-sm font-medium text-white">

                                {{ auth()->user()->name }}

                            </p>

                            <p class="text-xs text-slate-400">

                                Administrator

                            </p>

                        </div>

                    </div>

                    <a href="{{ route('recycle.bin') }}"
                        class="group flex items-center rounded-lg px-3 py-2.5 text-sm font-medium text-slate-400 hover:bg-slate-800 hover:text-white">

                        Recycle Bin

                    </a>

                </div>

            </div>

        </aside>

        <div class="lg:ml-64 min-h-screen">

            <!-- TOP BAR -->

            <header class="sticky top-0 z-20 border-b border-slate-700 bg-slate-950/95 backdrop-blur">

                <div class="flex items-center justify-between px-6 py-4">

                    <h2 class="text-xl font-semibold text-white">

                        Fantasy League Admin

                    </h2>

                    <div class="flex items-center gap-4">

                        <div class="hidden sm:block text-sm text-slate-400">

                            Welcome,

                            <span class="font-medium text-white">

                                {{ auth()->user()->name }}

                            </span>

                        </div>

                        <form method="POST"
                            action="{{ route('logout') }}">

                            @csrf

                            <button type="submit"
                                class="rounded-lg border border-slate-700 bg-slate-900 px-4 py-2 text-sm text-slate-300 transition hover:bg-slate-800 hover:text-white">

                                Logout

                            </button>

                        </form>

                    </div>

                </div>

            </header>

            <!-- PAGE CONTENT -->

            <main class="px-6 py-6 lg:px-8">

                @yield('content')

            </main>

        </div>

    </div>

</body>

</html>