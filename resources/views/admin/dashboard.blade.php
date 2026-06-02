<x-app-layout>
    <div class="min-h-screen bg-slate-950 text-slate-300">
        <aside class="hidden lg:fixed lg:inset-y-0 lg:left-0 lg:z-40 lg:flex lg:w-64 lg:flex-col lg:border-r lg:border-slate-700 lg:bg-slate-900">
            <div class="flex items-center gap-3 border-b border-slate-700 px-5 py-5">
                <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-indigo-600 text-sm font-semibold text-white">
                    FA
                </div>
                <div class="min-w-0 flex-1">
                    <h1 class="truncate text-base font-semibold text-white">Fantasy Admin</h1>
                    <p class="mt-0.5 text-xs text-slate-400">Control Panel</p>
                </div>
            </div>

            <nav class="flex-1 space-y-1 px-3 py-4">
                

                <a href="{{ route('tournaments.index') }}" class="group flex items-center rounded-lg px-3 py-2.5 text-sm font-medium text-slate-400 transition hover:bg-slate-800 hover:text-white">
                    <svg class="mr-3 h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M5 11a1 1 0 011-1h2V7a4 4 0 014-4h.5a1.5 1.5 0 110 3H10a1 1 0 00-1 1v3a1 1 0 001 1h.5a1.5 1.5 0 110 3H10a4 4 0 01-4-4v-2H6a1 1 0 01-1-1zm12 2a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                    <span>Tournaments</span>
                </a>

                <a href="{{ route('teams.index') }}" class="group flex items-center rounded-lg px-3 py-2.5 text-sm font-medium text-slate-400 transition hover:bg-slate-800 hover:text-white">
                    <svg class="mr-3 h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 11a6 6 0 00-11.86 0v2a1 1 0 001 1h9.86a1 1 0 001-1v-2z"></path></svg>
                    <span>Teams</span>
                </a>

                <a href="{{ route('players.index') }}" class="group flex items-center rounded-lg px-3 py-2.5 text-sm font-medium text-slate-400 transition hover:bg-slate-800 hover:text-white">
                    <svg class="mr-3 h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1z"></path></svg>
                    <span>Players</span>
                </a>

                <a href="{{ route('matches.index') }}" class="group flex items-center rounded-lg px-3 py-2.5 text-sm font-medium text-slate-400 transition hover:bg-slate-800 hover:text-white">
                    <svg class="mr-3 h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H7a1 1 0 01-1-1v-6z" clip-rule="evenodd"></path></svg>
                    <span>Matches</span>
                </a>

               

                <a href="#" class="group flex items-center rounded-lg px-3 py-2.5 text-sm font-medium text-slate-400 transition hover:bg-slate-800 hover:text-white">
                    <svg class="mr-3 h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <span>Leaderboard</span>
                </a>

                <a href="{{ route('admin.usermanagement') }}" class="group flex items-center rounded-lg px-3 py-2.5 text-sm font-medium text-slate-400 transition hover:bg-slate-800 hover:text-white">
                    <svg class="mr-3 h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path></svg>
                    <span>Users</span>
                </a>

                <a href="#" class="group flex items-center rounded-lg px-3 py-2.5 text-sm font-medium text-slate-400 transition hover:bg-slate-800 hover:text-white">
                    <svg class="mr-3 h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                    <span>Settings</span>
                </a>
            </nav>

            <div class="border-t border-slate-700 px-4 py-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-800 text-sm font-semibold text-white">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-sm font-medium text-white">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-slate-400">Administrator</p>
                    </div>
                </div>
            </div>
        </aside>

        <div class="lg:ml-64">
            <header class="sticky top-0 z-20 border-b border-slate-700 bg-slate-950">
                <div class="flex flex-col gap-4 px-5 py-4 sm:flex-row sm:items-center sm:justify-between lg:px-8">
                    <div>
                        <p class="text-xs font-semibold uppercase text-slate-400">Control Center</p>
                        <h2 class="mt-1 text-2xl font-semibold text-white">Dashboard</h2>
                    </div>
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                        <div class="rounded-lg border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-slate-300">
                            Welcome, <span class="font-medium text-white">{{ auth()->user()->name ?? 'Admin' }}</span>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center justify-center rounded-lg border border-slate-700 bg-slate-900 px-4 py-2 text-sm font-medium text-slate-300 transition hover:bg-slate-800 hover:text-white">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="px-5 py-6 lg:px-8">
                <section class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
                    <article class="rounded-lg border border-slate-700 bg-slate-900 p-5 shadow-sm transition hover:bg-slate-800">
                        <div class="flex items-center justify-between gap-4">
                            <p class="text-sm font-medium text-slate-400">Total Users</p>
                            <svg class="h-5 w-5 flex-shrink-0 text-slate-400" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a4 4 0 00-8 0v1h8z"></path></svg>
                        </div>
                        <p class="mt-4 text-3xl font-semibold text-white">{{ $totalUsers }}</p>
                        <p class="mt-1 text-sm text-slate-400">Active users & members</p>
                    </article>

                    <article class="rounded-lg border border-slate-700 bg-slate-900 p-5 shadow-sm transition hover:bg-slate-800">
                        <div class="flex items-center justify-between gap-4">
                            <p class="text-sm font-medium text-slate-400">Tournaments</p>
                            <svg class="h-5 w-5 flex-shrink-0 text-slate-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000-2 4 4 0 00-4 4v10a4 4 0 004 4h12a4 4 0 004-4V5a4 4 0 00-4-4 1 1 0 000 2 2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V5z"></path></svg>
                        </div>
                        <p class="mt-4 text-3xl font-semibold text-white">{{ $totalTournaments }}</p>
                        <p class="mt-1 text-sm text-slate-400">Live & upcoming</p>
                    </article>

                    <article class="rounded-lg border border-slate-700 bg-slate-900 p-5 shadow-sm transition hover:bg-slate-800">
                        <div class="flex items-center justify-between gap-4">
                            <p class="text-sm font-medium text-slate-400">Teams</p>
                            <svg class="h-5 w-5 flex-shrink-0 text-slate-400" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 11a6 6 0 00-11.86 0v2a1 1 0 001 1h9.86a1 1 0 001-1v-2z"></path></svg>
                        </div>
                        <p class="mt-4 text-3xl font-semibold text-white">{{ $totalTeams }}</p>
                        <p class="mt-1 text-sm text-slate-400">Registered teams</p>
                    </article>

                    <article class="rounded-lg border border-slate-700 bg-slate-900 p-5 shadow-sm transition hover:bg-slate-800">
                        <div class="flex items-center justify-between gap-4">
                            <p class="text-sm font-medium text-slate-400">Players</p>
                            <svg class="h-5 w-5 flex-shrink-0 text-slate-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 11a6 6 0 00-11.86 0v2a1 1 0 001 1h9.86a1 1 0 001-1v-2z"></path></svg>
                        </div>
                        <p class="mt-4 text-3xl font-semibold text-white">{{ $totalPlayers }}</p>
                        <p class="mt-1 text-sm text-slate-400">In database</p>
                    </article>

                    <article class="rounded-lg border border-slate-700 bg-slate-900 p-5 shadow-sm transition hover:bg-slate-800">
                        <div class="flex items-center justify-between gap-4">
                            <p class="text-sm font-medium text-slate-400">Matches</p>
                            <svg class="h-5 w-5 flex-shrink-0 text-slate-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"></path></svg>
                        </div>
                        <p class="mt-4 text-3xl font-semibold text-white">{{ $totalMatches }}</p>
                        <p class="mt-1 text-sm text-slate-400">Scheduled & done</p>
                    </article>
                </section>

                <section class="mt-8">
                    <div class="mb-4 flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
                        <div>
                            <p class="text-xs font-semibold uppercase text-slate-400">Activity</p>
                            <h3 class="mt-1 text-xl font-semibold text-white">Recent Matches</h3>
                        </div>
                    </div>

                    
                </section>
            </main>
        </div>
    </div>
</x-app-layout>
