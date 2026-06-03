<x-app-layout>

    <div class="min-h-screen bg-slate-950 text-slate-300">

        <!-- NAVBAR -->

        <nav class="fixed inset-x-0 top-0 z-50 border-b border-slate-800 bg-slate-900/90 backdrop-blur-md">

            <div class="mx-auto flex h-[72px] max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">

                <!-- LOGO -->

                <div class="flex items-center gap-3">

                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-600 text-lg font-bold text-white shadow-lg shadow-indigo-600/30">

                        FA

                    </div>

                    <div>

                        <h1 class="text-lg font-bold text-white">

                            Fantasy Arena

                        </h1>

                        <p class="text-xs text-slate-400">

                            Play • Score • Win

                        </p>

                    </div>

                </div>

                <!-- MENU -->

                <div class="hidden items-center gap-2 lg:flex">

                    <a href="{{ route('user.dashboard') }}"
                       class="rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white">

                        Dashboard

                    </a>

                    <a href="{{ route('user.tournaments') }}"
                       class="rounded-xl px-4 py-2 text-sm font-semibold text-slate-300 transition hover:bg-slate-800 hover:text-white">

                        Tournaments

                    </a>

                    <a href="#"
                       class="rounded-xl px-4 py-2 text-sm font-semibold text-slate-300 transition hover:bg-slate-800 hover:text-white">

                        My Teams

                    </a>

                    <a href="#"
                       class="rounded-xl px-4 py-2 text-sm font-semibold text-slate-300 transition hover:bg-slate-800 hover:text-white">

                        Leaderboard

                    </a>

                    <a href="#"
                       class="rounded-xl px-4 py-2 text-sm font-semibold text-slate-300 transition hover:bg-slate-800 hover:text-white">

                        Wallet

                    </a>

                    <a href="{{ route('profile.edit') }}"
                       class="rounded-xl px-4 py-2 text-sm font-semibold text-slate-300 transition hover:bg-slate-800 hover:text-white">

                        Profile

                    </a>

                </div>

                <!-- PROFILE -->

                <div class="flex items-center gap-4">

                    <div class="hidden rounded-2xl border border-slate-800 bg-slate-900 px-4 py-2 md:block">

                        <p class="text-xs text-slate-400">

                            Wallet Balance

                        </p>

                        <p class="text-sm font-bold text-green-400">

                            ₹{{ auth()->user()->wallet_balance ?? 0 }}

                        </p>

                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-600 text-sm font-bold text-white shadow-lg shadow-indigo-600/20">

                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                    </div>

                </div>

            </div>

        </nav>

        <!-- MAIN -->

        <main class="pt-24">

            <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

                <!-- HERO -->

                <section class="overflow-hidden rounded-3xl border border-slate-800 bg-gradient-to-br from-slate-900 via-slate-900 to-indigo-950 p-8 shadow-2xl shadow-slate-950/40">

                    <div class="grid gap-8 lg:grid-cols-2 lg:items-center">

                        <!-- LEFT -->

                        <div>

                            <p class="text-sm font-semibold uppercase tracking-wider text-indigo-400">

                                Fantasy Matches Live

                            </p>

                            <h1 class="mt-4 text-4xl font-extrabold leading-tight text-white lg:text-5xl">

                                Welcome Back,
                                {{ auth()->user()->name }}

                            </h1>

                            <p class="mt-5 max-w-2xl text-base leading-7 text-slate-300">

                                Create your dream fantasy team, join contests,
                                earn fantasy points, climb leaderboards and
                                win rewards after every match.

                            </p>

                            <div class="mt-8 flex flex-wrap gap-4">

                                <a href="{{ route('user.tournaments') }}"
                                   class="rounded-2xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-indigo-700">

                                    Explore Tournaments

                                </a>

                                <a href="#"
                                   class="rounded-2xl border border-slate-700 bg-slate-900 px-6 py-3 text-sm font-semibold text-slate-300 transition hover:border-indigo-600 hover:text-white">

                                    My Fantasy Teams

                                </a>

                            </div>

                        </div>

                        <!-- RIGHT -->

                        <div class="rounded-3xl border border-slate-800 bg-slate-900/70 p-6">

                            <div class="flex items-center justify-between">

                                <div>

                                    <p class="text-sm text-slate-400">

                                        Upcoming Match

                                    </p>

                                    <h2 class="mt-1 text-2xl font-bold text-white">

                                        Titans vs Wolves

                                    </h2>

                                </div>

                                <span class="rounded-full bg-indigo-600/20 px-4 py-1 text-xs font-semibold text-indigo-300">

                                    Live Contest

                                </span>

                            </div>

                            <div class="mt-8 grid grid-cols-3 gap-4 text-center">

                                <div class="rounded-2xl bg-slate-800 p-5">

                                    <p class="text-3xl font-bold text-white">

                                        02

                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">

                                        Hours

                                    </p>

                                </div>

                                <div class="rounded-2xl bg-slate-800 p-5">

                                    <p class="text-3xl font-bold text-white">

                                        18

                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">

                                        Minutes

                                    </p>

                                </div>

                                <div class="rounded-2xl bg-slate-800 p-5">

                                    <p class="text-3xl font-bold text-white">

                                        44

                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">

                                        Seconds

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </section>

                <!-- STATS -->

                <section class="mt-8 grid gap-5 sm:grid-cols-2 xl:grid-cols-4">

                    <!-- CARD -->

                    <div class="rounded-2xl border border-slate-800 bg-slate-900 p-6 shadow-xl transition hover:-translate-y-1 hover:border-indigo-600">

                        <p class="text-sm text-slate-400">

                            My Fantasy Teams

                        </p>

                        <h2 class="mt-4 text-4xl font-bold text-white">

                            08

                        </h2>

                        <p class="mt-2 text-sm text-slate-500">

                            Total created teams

                        </p>

                    </div>

                    <!-- CARD -->

                    <div class="rounded-2xl border border-slate-800 bg-slate-900 p-6 shadow-xl transition hover:-translate-y-1 hover:border-indigo-600">

                        <p class="text-sm text-slate-400">

                            Matches Joined

                        </p>

                        <h2 class="mt-4 text-4xl font-bold text-white">

                            15

                        </h2>

                        <p class="mt-2 text-sm text-slate-500">

                            Active fantasy contests

                        </p>

                    </div>

                    <!-- CARD -->

                    <div class="rounded-2xl border border-slate-800 bg-slate-900 p-6 shadow-xl transition hover:-translate-y-1 hover:border-indigo-600">

                        <p class="text-sm text-slate-400">

                            Fantasy Points

                        </p>

                        <h2 class="mt-4 text-4xl font-bold text-white">

                            12,480

                        </h2>

                        <p class="mt-2 text-sm text-slate-500">

                            Overall season points

                        </p>

                    </div>

                    <!-- CARD -->

                    <div class="rounded-2xl border border-slate-800 bg-slate-900 p-6 shadow-xl transition hover:-translate-y-1 hover:border-indigo-600">

                        <p class="text-sm text-slate-400">

                            Current Rank

                        </p>

                        <h2 class="mt-4 text-4xl font-bold text-white">

                            #128

                        </h2>

                        <p class="mt-2 text-sm text-slate-500">

                            Global leaderboard rank

                        </p>

                    </div>

                </section>

            </div>

        </main>

    </div>

</x-app-layout>