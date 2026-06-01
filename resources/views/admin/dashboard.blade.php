<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <!-- Sidebar -->
        <aside class="hidden lg:fixed lg:inset-y-0 lg:left-0 lg:z-40 lg:w-72 lg:overflow-y-auto lg:flex lg:flex-col lg:bg-gradient-to-b lg:from-gray-900 lg:to-gray-800">
            <!-- Sidebar Header -->
            <div class="flex items-center gap-3 px-6 py-8 border-b border-gray-700">
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-center h-12 w-12 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 shadow-lg">
                        <span class="text-white text-lg font-bold">⚽</span>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <h1 class="text-xl font-bold text-white truncate">Fantasy Admin</h1>
                    <p class="text-xs text-gray-400 mt-1">Control Panel</p>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="flex-1 space-y-1 px-4 py-6">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-4 py-3 text-sm font-semibold rounded-lg text-white bg-gradient-to-r from-blue-600 to-blue-700 shadow-md hover:shadow-lg transition-all duration-200">
                    <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4m0 0l4 4m-4-4V3"></path></svg>
                    <span>Dashboard</span>
                </a>

                <!-- Tournaments -->
                <a href="#" class="group flex items-center px-4 py-3 text-sm font-semibold rounded-lg text-gray-300 hover:bg-gray-800/50 hover:text-white transition-all duration-200">
                    <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M5 11a1 1 0 011-1h2V7a4 4 0 014-4h.5a1.5 1.5 0 110 3H10a1 1 0 00-1 1v3a1 1 0 001 1h.5a1.5 1.5 0 110 3H10a4 4 0 01-4-4v-2H6a1 1 0 01-1-1zm12 2a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                    <span>Tournaments</span>
                </a>

                <!-- Teams -->
                <a href="#" class="group flex items-center px-4 py-3 text-sm font-semibold rounded-lg text-gray-300 hover:bg-gray-800/50 hover:text-white transition-all duration-200">
                    <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 11a6 6 0 00-11.86 0v2a1 1 0 001 1h9.86a1 1 0 001-1v-2z"></path></svg>
                    <span>Teams</span>
                </a>

                <!-- Players -->
                <a href="#" class="group flex items-center px-4 py-3 text-sm font-semibold rounded-lg text-gray-300 hover:bg-gray-800/50 hover:text-white transition-all duration-200">
                    <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1z"></path></svg>
                    <span>Players</span>
                </a>

                <!-- Matches -->
                <a href="#" class="group flex items-center px-4 py-3 text-sm font-semibold rounded-lg text-gray-300 hover:bg-gray-800/50 hover:text-white transition-all duration-200">
                    <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H7a1 1 0 01-1-1v-6z" clip-rule="evenodd"></path></svg>
                    <span>Matches</span>
                </a>

                <!-- Fantasy Teams -->
                <a href="#" class="group flex items-center px-4 py-3 text-sm font-semibold rounded-lg text-gray-300 hover:bg-gray-800/50 hover:text-white transition-all duration-200">
                    <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM13 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2h-2zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM13 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2h-2z"></path></svg>
                    <span>Fantasy Teams</span>
                </a>

                <!-- Leaderboard -->
                <a href="#" class="group flex items-center px-4 py-3 text-sm font-semibold rounded-lg text-gray-300 hover:bg-gray-800/50 hover:text-white transition-all duration-200">
                    <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <span>Leaderboard</span>
                </a>

                <!-- Users -->
                <a href="#" class="group flex items-center px-4 py-3 text-sm font-semibold rounded-lg text-gray-300 hover:bg-gray-800/50 hover:text-white transition-all duration-200">
                    <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path></svg>
                    <span>Users</span>
                </a>

                <!-- Settings -->
                <a href="#" class="group flex items-center px-4 py-3 text-sm font-semibold rounded-lg text-gray-300 hover:bg-gray-800/50 hover:text-white transition-all duration-200">
                    <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                    <span>Settings</span>
                </a>
            </nav>

            <!-- Sidebar Footer -->
            <div class="border-t border-gray-700 px-4 py-4">
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-400 to-indigo-600 flex items-center justify-center text-white font-bold text-sm">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-400">Administrator</p>
                    </div>
                </div>
            </div>
        </aside>
                <div class="px-6 py-8 sticky top-0 bg-slate-900/95 backdrop-blur-xl z-10 border-b border-indigo-900/30">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-extrabold uppercase tracking-[0.3em] text-indigo-400">⚽ Fantasy</p>
                            <h1 class="mt-2 text-3xl font-black bg-gradient-to-r from-indigo-300 via-blue-300 to-cyan-300 bg-clip-text text-transparent">Admin</h1>
                        </div>
                    </div>
                </div>

                <nav class="space-y-1.5 px-4 pb-10 pt-6">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 rounded-xl bg-indigo-600/30 border border-indigo-500/50 px-4 py-3.5 text-sm font-bold text-indigo-200 shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500/40 hover:border-indigo-400/70">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path></svg>
                        <span>Dashboard</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3.5 text-sm font-semibold text-slate-300 transition hover:bg-slate-700/50 hover:text-slate-100">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000-2 4 4 0 00-4 4v10a4 4 0 004 4h12a4 4 0 004-4V5a4 4 0 00-4-4 1 1 0 000 2 2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V5z"></path></svg>
                        <span>Tournaments</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3.5 text-sm font-semibold text-slate-300 transition hover:bg-slate-700/50 hover:text-slate-100">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 11a6 6 0 00-11.86 0v2a1 1 0 001 1h9.86a1 1 0 001-1v-2z"></path></svg>
                        <span>Teams</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3.5 text-sm font-semibold text-slate-300 transition hover:bg-slate-700/50 hover:text-slate-100">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 11a6 6 0 00-11.86 0v2a1 1 0 001 1h9.86a1 1 0 001-1v-2z"></path></svg>
                        <span>Players</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3.5 text-sm font-semibold text-slate-300 transition hover:bg-slate-700/50 hover:text-slate-100">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"></path></svg>
                        <span>Matches</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3.5 text-sm font-semibold text-slate-300 transition hover:bg-slate-700/50 hover:text-slate-100">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM13 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2h-2zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM13 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2h-2z"></path></svg>
                        <span>Fantasy Teams</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3.5 text-sm font-semibold text-slate-300 transition hover:bg-slate-700/50 hover:text-slate-100">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <span>Leaderboard</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3.5 text-sm font-semibold text-slate-300 transition hover:bg-slate-700/50 hover:text-slate-100">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path></svg>
                        <span>Users</span>
                    </a>
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 lg:ml-80">
                <header class="border-b border-indigo-900/50 bg-slate-900/60 backdrop-blur-xl px-6 py-6 sticky top-0 z-20">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <p class="text-xs font-extrabold uppercase tracking-[0.25em] text-indigo-400">📊 Control Center</p>
                            <h2 class="mt-2 text-4xl font-black text-white">Dashboard</h2>
                        </div>
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                            <div class="rounded-xl bg-slate-800/70 px-4 py-3 text-sm text-slate-200 border border-slate-700/50 backdrop-blur">
                                Welcome, <span class="font-bold text-indigo-300">{{ auth()->user()->name ?? 'Admin' }}</span>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-red-600/40 hover:bg-red-600/50 border border-red-500/50 hover:border-red-400/70 px-5 py-3 text-sm font-bold text-red-200 transition shadow-lg shadow-red-600/20">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </header>

                <main class="px-6 py-8">
                    <section class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 mb-8">
                        <article class="group relative rounded-2xl border border-indigo-500/40 bg-gradient-to-br from-indigo-500/15 via-slate-800/50 to-slate-900/80 p-6 shadow-xl shadow-indigo-500/10 hover:border-indigo-400/60 transition duration-300 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                            <div class="relative">
                                <div class="flex items-start justify-between mb-3">
                                    <p class="text-xs font-bold uppercase tracking-[0.15em] text-indigo-300">Total Users</p>
                                    <div class="rounded-lg bg-indigo-500/25 p-2.5 border border-indigo-400/40">
                                        <svg class="w-5 h-5 text-indigo-300" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a4 4 0 00-8 0v1h8z"></path></svg>
                                    </div>
                                </div>
                                <p class="text-4xl font-black text-white">1,248</p>
                                <p class="mt-2 text-xs text-slate-400">Active users & members</p>
                            </div>
                        </article>

                        <article class="group relative rounded-2xl border border-emerald-500/40 bg-gradient-to-br from-emerald-500/15 via-slate-800/50 to-slate-900/80 p-6 shadow-xl shadow-emerald-500/10 hover:border-emerald-400/60 transition duration-300 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/10 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                            <div class="relative">
                                <div class="flex items-start justify-between mb-3">
                                    <p class="text-xs font-bold uppercase tracking-[0.15em] text-emerald-300">Tournaments</p>
                                    <div class="rounded-lg bg-emerald-500/25 p-2.5 border border-emerald-400/40">
                                        <svg class="w-5 h-5 text-emerald-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000-2 4 4 0 00-4 4v10a4 4 0 004 4h12a4 4 0 004-4V5a4 4 0 00-4-4 1 1 0 000 2 2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V5z"></path></svg>
                                    </div>
                                </div>
                                <p class="text-4xl font-black text-white">18</p>
                                <p class="mt-2 text-xs text-slate-400">Live & upcoming</p>
                            </div>
                        </article>

                        <article class="group relative rounded-2xl border border-blue-500/40 bg-gradient-to-br from-blue-500/15 via-slate-800/50 to-slate-900/80 p-6 shadow-xl shadow-blue-500/10 hover:border-blue-400/60 transition duration-300 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                            <div class="relative">
                                <div class="flex items-start justify-between mb-3">
                                    <p class="text-xs font-bold uppercase tracking-[0.15em] text-blue-300">Teams</p>
                                    <div class="rounded-lg bg-blue-500/25 p-2.5 border border-blue-400/40">
                                        <svg class="w-5 h-5 text-blue-300" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 11a6 6 0 00-11.86 0v2a1 1 0 001 1h9.86a1 1 0 001-1v-2z"></path></svg>
                                    </div>
                                </div>
                                <p class="text-4xl font-black text-white">64</p>
                                <p class="mt-2 text-xs text-slate-400">Registered teams</p>
                            </div>
                        </article>

                        <article class="group relative rounded-2xl border border-orange-500/40 bg-gradient-to-br from-orange-500/15 via-slate-800/50 to-slate-900/80 p-6 shadow-xl shadow-orange-500/10 hover:border-orange-400/60 transition duration-300 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-orange-500/10 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                            <div class="relative">
                                <div class="flex items-start justify-between mb-3">
                                    <p class="text-xs font-bold uppercase tracking-[0.15em] text-orange-300">Players</p>
                                    <div class="rounded-lg bg-orange-500/25 p-2.5 border border-orange-400/40">
                                        <svg class="w-5 h-5 text-orange-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 11a6 6 0 00-11.86 0v2a1 1 0 001 1h9.86a1 1 0 001-1v-2z"></path></svg>
                                    </div>
                                </div>
                                <p class="text-4xl font-black text-white">512</p>
                                <p class="mt-2 text-xs text-slate-400">In database</p>
                            </div>
                        </article>

                        <article class="group relative rounded-2xl border border-cyan-500/40 bg-gradient-to-br from-cyan-500/15 via-slate-800/50 to-slate-900/80 p-6 shadow-xl shadow-cyan-500/10 hover:border-cyan-400/60 transition duration-300 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/10 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                            <div class="relative">
                                <div class="flex items-start justify-between mb-3">
                                    <p class="text-xs font-bold uppercase tracking-[0.15em] text-cyan-300">Matches</p>
                                    <div class="rounded-lg bg-cyan-500/25 p-2.5 border border-cyan-400/40">
                                        <svg class="w-5 h-5 text-cyan-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"></path></svg>
                                    </div>
                                </div>
                                <p class="text-4xl font-black text-white">276</p>
                                <p class="mt-2 text-xs text-slate-400">Scheduled & done</p>
                            </div>
                        </article>
                    </section>

                    <section class="mt-12">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between mb-6">
                            <div>
                                <p class="text-xs font-bold uppercase tracking-[0.25em] text-indigo-400">📋 Activity</p>
                                <h3 class="mt-2 text-2xl font-black text-white">Recent Matches</h3>
                            </div>
                        </div>

                        <div class="overflow-hidden rounded-2xl border border-slate-700/60 bg-slate-800/40 backdrop-blur shadow-2xl shadow-slate-900/50">
                            <div class="overflow-x-auto">
                                <table class="w-full divide-y divide-slate-700/50">
                                    <thead class="bg-slate-800/80 border-b border-slate-700/60">
                                        <tr>
                                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.12em] text-slate-200">Match</th>
                                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.12em] text-slate-200">Tournament</th>
                                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.12em] text-slate-200">Date</th>
                                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.12em] text-slate-200">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-700/30">
                                        <tr class="hover:bg-slate-700/40 transition duration-200">
                                            <td class="px-6 py-4 text-sm font-semibold text-slate-100">Falcons vs Wolves</td>
                                            <td class="px-6 py-4 text-sm text-slate-400">Summer Cup 2026</td>
                                            <td class="px-6 py-4 text-sm text-slate-400">Jun 03, 2026</td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center gap-2 rounded-lg bg-emerald-500/25 px-3 py-1.5 text-xs font-bold text-emerald-300 border border-emerald-500/40">
                                                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                                    Scheduled
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-slate-700/40 transition duration-200">
                                            <td class="px-6 py-4 text-sm font-semibold text-slate-100">Lions vs Storm</td>
                                            <td class="px-6 py-4 text-sm text-slate-400">Premier League</td>
                                            <td class="px-6 py-4 text-sm text-slate-400">Jun 05, 2026</td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center gap-2 rounded-lg bg-amber-500/25 px-3 py-1.5 text-xs font-bold text-amber-300 border border-amber-500/40">
                                                    <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                                                    In Progress
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-slate-700/40 transition duration-200">
                                            <td class="px-6 py-4 text-sm font-semibold text-slate-100">Raptors vs Titans</td>
                                            <td class="px-6 py-4 text-sm text-slate-400">Champions Series</td>
                                            <td class="px-6 py-4 text-sm text-slate-400">Jun 01, 2026</td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center gap-2 rounded-lg bg-blue-500/25 px-3 py-1.5 text-xs font-bold text-blue-300 border border-blue-500/40">
                                                    <span class="w-2 h-2 rounded-full bg-blue-400"></span>
                                                    Completed
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-slate-700/40 transition duration-200">
                                            <td class="px-6 py-4 text-sm font-semibold text-slate-100">Panthers vs Kings</td>
                                            <td class="px-6 py-4 text-sm text-slate-400">Regional Cup</td>
                                            <td class="px-6 py-4 text-sm text-slate-400">May 28, 2026</td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center gap-2 rounded-lg bg-red-500/25 px-3 py-1.5 text-xs font-bold text-red-300 border border-red-500/40">
                                                    <span class="w-2 h-2 rounded-full bg-red-400"></span>
                                                    Postponed
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
