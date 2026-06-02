<x-app-layout>
    <div class="min-h-screen bg-slate-950 text-slate-300">
        <nav class="fixed inset-x-0 top-0 z-50 border-b border-slate-800 bg-slate-900/80 backdrop-blur-md">
            <div class="mx-auto flex h-[70px] max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
                <a href="#" class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-indigo-600 text-base font-bold text-white shadow-lg shadow-indigo-600/20">
                        FA
                    </div>
                    <div class="hidden sm:block">
                        <p class="text-base font-bold text-white">Fantasy Arena</p>
                        <p class="text-xs text-slate-400">Play. Score. Win.</p>
                    </div>
                </a>

                <div class="hidden items-center gap-1 lg:flex">
                    <a href="#" class="rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-700">
                        Dashboard
                    </a>
                    <a href="#fantasy-teams" class="rounded-xl px-4 py-2 text-sm font-semibold text-slate-300 transition hover:bg-slate-800 hover:text-white">
                        My Teams
                    </a>
                    <a href="{{ route('user.matches') }}" class="rounded-xl px-4 py-2 text-sm font-semibold text-slate-300 transition hover:bg-slate-800 hover:text-white">
                        Matches
                    </a>
                    <a href="#leaderboard" class="rounded-xl px-4 py-2 text-sm font-semibold text-slate-300 transition hover:bg-slate-800 hover:text-white">
                        Leaderboard
                    </a>
                    <a href="{{ route('profile.edit') }}" class="rounded-xl px-4 py-2 text-sm font-semibold text-slate-300 transition hover:bg-slate-800 hover:text-white">
                        Profile
                    </a>
                </div>

                <div class="flex items-center gap-3">
                    <div class="relative hidden md:block">
                        <svg class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.1-5.15a6.25 6.25 0 11-12.5 0 6.25 6.25 0 0112.5 0z" />
                        </svg>
                        <input type="search" placeholder="Search contests..." class="w-56 rounded-2xl border border-slate-800 bg-slate-950 py-2.5 pl-10 pr-4 text-sm text-white placeholder:text-slate-400 transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <button class="relative flex h-10 w-10 items-center justify-center rounded-2xl border border-slate-800 bg-slate-950 text-slate-300 transition hover:border-indigo-600 hover:text-white">
                        <span class="absolute right-2.5 top-2.5 h-2 w-2 rounded-full bg-indigo-600"></span>
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 01-6 0" />
                        </svg>
                    </button>

                    <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-indigo-600 text-sm font-bold text-white shadow-lg shadow-indigo-600/20">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-800 px-4 py-3 lg:hidden">
                <div class="mx-auto flex max-w-7xl gap-2 overflow-x-auto">
                    <a href="#" class="whitespace-nowrap rounded-xl bg-indigo-600 px-3 py-2 text-xs font-semibold text-white">Dashboard</a>
                    <a href="#fantasy-teams" class="whitespace-nowrap rounded-xl bg-slate-800 px-3 py-2 text-xs font-semibold text-slate-300">My Teams</a>
                    <a href="#matches" class="whitespace-nowrap rounded-xl bg-slate-800 px-3 py-2 text-xs font-semibold text-slate-300">Matches</a>
                    <a href="#leaderboard" class="whitespace-nowrap rounded-xl bg-slate-800 px-3 py-2 text-xs font-semibold text-slate-300">Leaderboard</a>
                    <a href="{{ route('profile.edit') }}" class="whitespace-nowrap rounded-xl bg-slate-800 px-3 py-2 text-xs font-semibold text-slate-300">Profile</a>
                </div>
            </div>
        </nav>

        <main class="pt-[118px] lg:pt-[70px]">
            <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                <section class="overflow-hidden rounded-3xl border border-slate-800 bg-gradient-to-br from-slate-900 via-slate-900 to-indigo-950/50 p-6 shadow-2xl shadow-slate-950/40 sm:p-8 lg:p-10">
                    <div class="grid gap-8 lg:grid-cols-[1.45fr_0.85fr] lg:items-center">
                        <div>
                            <p class="text-sm font-semibold uppercase text-indigo-300">Fantasy gameweek is live</p>
                            <h1 class="mt-3 max-w-3xl text-3xl font-bold tracking-tight text-white sm:text-5xl">
                                Welcome back, {{ auth()->user()->name ?? 'Captain' }}
                            </h1>
                            <p class="mt-4 max-w-2xl text-base leading-7 text-slate-300">
                                Pick your strongest lineup, join high-value contests, and climb the leaderboard before the next match starts.
                            </p>

                            <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                                <a href="#matches" class="inline-flex items-center justify-center rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:-translate-y-0.5 hover:bg-indigo-700">
                                    Join Contest
                                </a>
                                <a href="#fantasy-teams" class="inline-flex items-center justify-center rounded-2xl border border-slate-800 bg-slate-900 px-5 py-3 text-sm font-semibold text-slate-300 transition hover:-translate-y-0.5 hover:border-indigo-600 hover:text-white">
                                    Manage Teams
                                </a>
                            </div>
                        </div>

                        <div class="rounded-3xl border border-slate-800 bg-slate-950/50 p-5">
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <p class="text-sm text-slate-400">Next Match</p>
                                    <p class="mt-1 text-xl font-bold text-white">Falcons vs Wolves</p>
                                </div>
                                <span class="rounded-full bg-indigo-600/20 px-3 py-1 text-xs font-semibold text-indigo-300">Mega Contest</span>
                            </div>

                            <div class="mt-6 grid grid-cols-3 gap-3 text-center">
                                <div class="rounded-2xl bg-slate-900 p-4">
                                    <p class="text-2xl font-bold text-white">02</p>
                                    <p class="text-xs text-slate-400">Hours</p>
                                </div>
                                <div class="rounded-2xl bg-slate-900 p-4">
                                    <p class="text-2xl font-bold text-white">18</p>
                                    <p class="text-xs text-slate-400">Minutes</p>
                                </div>
                                <div class="rounded-2xl bg-slate-900 p-4">
                                    <p class="text-2xl font-bold text-white">44</p>
                                    <p class="text-xs text-slate-400">Seconds</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mt-8 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    <article class="rounded-2xl border border-slate-800 bg-gradient-to-br from-slate-900 to-slate-900/70 p-5 shadow-xl shadow-slate-950/30 transition hover:scale-[1.02] hover:border-indigo-600/60">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-slate-400">Total Teams</p>
                            <div class="rounded-2xl bg-indigo-600/20 p-3 text-indigo-300">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-5-4M9 20H4v-2a4 4 0 015-4m8-4a4 4 0 10-8 0 4 4 0 008 0z" />
                                </svg>
                            </div>
                        </div>
                        <p class="mt-5 text-3xl font-bold text-white">08</p>
                        <p class="mt-1 text-sm text-slate-400">2 teams created this week</p>
                    </article>

                    <article class="rounded-2xl border border-slate-800 bg-gradient-to-br from-slate-900 to-slate-900/70 p-5 shadow-xl shadow-slate-950/30 transition hover:scale-[1.02] hover:border-indigo-600/60">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-slate-400">Matches Joined</p>
                            <div class="rounded-2xl bg-indigo-600/20 p-3 text-indigo-300">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M5 11h14M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                        <p class="mt-5 text-3xl font-bold text-white">24</p>
                        <p class="mt-1 text-sm text-slate-400">6 contests currently live</p>
                    </article>

                    <article class="rounded-2xl border border-slate-800 bg-gradient-to-br from-slate-900 to-slate-900/70 p-5 shadow-xl shadow-slate-950/30 transition hover:scale-[1.02] hover:border-indigo-600/60">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-slate-400">Total Points</p>
                            <div class="rounded-2xl bg-indigo-600/20 p-3 text-indigo-300">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.2 3.692a1 1 0 00.95.69h3.883c.969 0 1.371 1.24.588 1.81l-3.142 2.283a1 1 0 00-.364 1.118l1.2 3.692c.3.921-.755 1.688-1.54 1.118l-3.142-2.283a1 1 0 00-1.175 0L8.267 17.33c-.784.57-1.838-.197-1.539-1.118l1.2-3.692a1 1 0 00-.364-1.118L4.422 9.119c-.783-.57-.38-1.81.588-1.81h3.883a1 1 0 00.95-.69l1.206-3.692z" />
                                </svg>
                            </div>
                        </div>
                        <p class="mt-5 text-3xl font-bold text-white">12,840</p>
                        <p class="mt-1 text-sm text-slate-400">Top 8% this season</p>
                    </article>

                    <article class="rounded-2xl border border-slate-800 bg-gradient-to-br from-slate-900 to-slate-900/70 p-5 shadow-xl shadow-slate-950/30 transition hover:scale-[1.02] hover:border-indigo-600/60">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-slate-400">Current Rank</p>
                            <div class="rounded-2xl bg-indigo-600/20 p-3 text-indigo-300">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 16v-3m7 3V8m7 8v-6M4 20h16" />
                                </svg>
                            </div>
                        </div>
                        <p class="mt-5 text-3xl font-bold text-white">#128</p>
                        <p class="mt-1 text-sm text-slate-400">Rising fast today</p>
                    </article>
                </section>

                <div class="mt-8 grid gap-6 xl:grid-cols-[1.45fr_0.9fr]">
                    

                    <section id="leaderboard" class="rounded-2xl border border-slate-800 bg-slate-900 p-5 shadow-xl shadow-slate-950/30">
                        <div class="mb-5">
                            <p class="text-sm font-semibold text-indigo-400">Weekly Standings</p>
                            <h3 class="text-xl font-bold text-white">Leaderboard Preview</h3>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full min-w-[360px]">
                                <thead>
                                    <tr class="border-b border-slate-800 text-left text-xs uppercase text-slate-400">
                                        <th class="pb-3 font-semibold">Rank</th>
                                        <th class="pb-3 font-semibold">Username</th>
                                        <th class="pb-3 text-right font-semibold">Points</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-800">
                                    <tr>
                                        <td class="py-4 text-sm font-bold text-white">#1</td>
                                        <td class="py-4 text-sm text-slate-300">PowerCaptain</td>
                                        <td class="py-4 text-right text-sm font-semibold text-white">18,420</td>
                                    </tr>
                                    <tr>
                                        <td class="py-4 text-sm font-bold text-white">#2</td>
                                        <td class="py-4 text-sm text-slate-300">GoalMachine</td>
                                        <td class="py-4 text-right text-sm font-semibold text-white">17,980</td>
                                    </tr>
                                    <tr>
                                        <td class="py-4 text-sm font-bold text-white">#3</td>
                                        <td class="py-4 text-sm text-slate-300">DreamEleven</td>
                                        <td class="py-4 text-right text-sm font-semibold text-white">17,650</td>
                                    </tr>
                                    <tr>
                                        <td class="py-4 text-sm font-bold text-indigo-400">#128</td>
                                        <td class="py-4 text-sm text-white">{{ auth()->user()->name ?? 'You' }}</td>
                                        <td class="py-4 text-right text-sm font-semibold text-white">12,840</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>

                <section id="fantasy-teams" class="mt-8 pb-8">
                    <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm font-semibold text-indigo-400">Squads</p>
                            <h3 class="text-xl font-bold text-white">My Fantasy Teams</h3>
                        </div>
                        <button class="rounded-xl border border-slate-800 bg-slate-900 px-4 py-2 text-sm font-semibold text-slate-300 transition hover:border-indigo-600 hover:text-white">
                            Create Team
                        </button>
                    </div>

                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                        <article class="rounded-2xl border border-slate-800 bg-slate-900 p-5 shadow-xl shadow-slate-950/30 transition hover:-translate-y-1 hover:border-indigo-600/60">
                            <div class="flex items-center justify-between">
                                <h4 class="text-lg font-bold text-white">Night Strikers</h4>
                                <span class="rounded-full bg-indigo-600/20 px-3 py-1 text-xs font-semibold text-indigo-300">Active</span>
                            </div>
                            <p class="mt-3 text-sm text-slate-400">Captain: Arjun Mehta</p>
                            <p class="mt-1 text-sm text-slate-400">Vice Captain: Liam Brown</p>
                            <div class="mt-5 flex items-center justify-between border-t border-slate-800 pt-4">
                                <span class="text-sm text-slate-400">Team Points</span>
                                <span class="text-lg font-bold text-white">1,245</span>
                            </div>
                        </article>

                        <article class="rounded-2xl border border-slate-800 bg-slate-900 p-5 shadow-xl shadow-slate-950/30 transition hover:-translate-y-1 hover:border-indigo-600/60">
                            <div class="flex items-center justify-between">
                                <h4 class="text-lg font-bold text-white">Elite XI</h4>
                                <span class="rounded-full bg-slate-800 px-3 py-1 text-xs font-semibold text-slate-300">Locked</span>
                            </div>
                            <p class="mt-3 text-sm text-slate-400">Captain: Virat Sharma</p>
                            <p class="mt-1 text-sm text-slate-400">Vice Captain: Ayaan Reddy</p>
                            <div class="mt-5 flex items-center justify-between border-t border-slate-800 pt-4">
                                <span class="text-sm text-slate-400">Team Points</span>
                                <span class="text-lg font-bold text-white">1,102</span>
                            </div>
                        </article>

                        <article class="rounded-2xl border border-slate-800 bg-slate-900 p-5 shadow-xl shadow-slate-950/30 transition hover:-translate-y-1 hover:border-indigo-600/60">
                            <div class="flex items-center justify-between">
                                <h4 class="text-lg font-bold text-white">Rank Hunters</h4>
                                <span class="rounded-full bg-indigo-600/20 px-3 py-1 text-xs font-semibold text-indigo-300">Active</span>
                            </div>
                            <p class="mt-3 text-sm text-slate-400">Captain: Daniel Smith</p>
                            <p class="mt-1 text-sm text-slate-400">Vice Captain: Zane Patel</p>
                            <div class="mt-5 flex items-center justify-between border-t border-slate-800 pt-4">
                                <span class="text-sm text-slate-400">Team Points</span>
                                <span class="text-lg font-bold text-white">986</span>
                            </div>
                        </article>
                    </div>
                </section>
            </div>
        </main>
    </div>
</x-app-layout>
