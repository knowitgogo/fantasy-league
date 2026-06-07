<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Fantasy User Panel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-slate-950 text-white">

    <!-- TOP NAVBAR -->

    <nav class="fixed top-0 z-50 w-full border-b border-slate-800 bg-slate-900/80 backdrop-blur-md">

        <div class="mx-auto flex h-[70px] items-center justify-between px-6">

            <!-- LOGO -->

            <div>

                <h1 class="text-2xl font-bold text-indigo-500">

                    Fantasy League

                </h1>

            </div>

            <!-- MENU -->

            <div class="hidden items-center gap-8 md:flex">

                <a href="{{ route('user.dashboard') }}"
                    class="text-slate-300 transition hover:text-white">

                    Dashboard

                </a>

                <a href="{{ route('user.tournaments') }}"
                    class="text-slate-300 transition hover:text-white">

                    Matches

                </a>

                <a href="{{ route('fantasy.myteams') }}"
                    class="text-slate-300 transition hover:text-white">

                    My Teams

                </a>

                <a href="#"
                    class="text-slate-300 transition hover:text-white">

                    Leaderboard

                </a>

                <a href="#"
                    class="text-slate-300 transition hover:text-white">

                    Profile

                </a>



            </div>

            <!-- USER -->

            <div class="flex items-center gap-4">

                <div class="relative">

                    <button onclick="toggleDropdown()"
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-600 font-bold text-white">

                        {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                    </button>

                    <div id="userDropdown"
                        class="absolute right-0 mt-2 hidden w-48 overflow-hidden rounded-xl border border-slate-700 bg-slate-900 shadow-xl">

                        <div class="border-b border-slate-700 px-4 py-3">

                            <p class="font-medium text-white">

                                {{ auth()->user()->name }}

                            </p>

                            <p class="text-xs text-slate-400">

                                {{ auth()->user()->email }}

                            </p>

                        </div>

                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-3 text-sm text-slate-300 hover:bg-slate-800">

                            My Profile

                        </a>

                        <a href="{{ route('fantasy.myteams') }}"
                            class="block px-4 py-3 text-sm text-slate-300 hover:bg-slate-800">

                            My Teams

                        </a>
                        <a href="{{ route('lang.switch', 'en') }}"
                        class="px-3 py-2 bg-blue-600 rounded text-white">

                            EN

                        </a>

                        <a href="{{ route('lang.switch', 'nl') }}"
                        class="px-3 py-2 bg-orange-600 rounded text-white">

                            NL

                        </a>

                        <form method="POST"
                            action="{{ route('logout') }}">

                            @csrf

                            <button type="submit"
                                class="w-full px-4 py-3 text-left text-sm text-red-400 hover:bg-slate-800">

                                Logout

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </nav>

    <!-- PAGE CONTENT -->

    <main>

        @yield('content')

    </main>

</body>

</html>

<script>

function toggleDropdown()
{
    document
        .getElementById('userDropdown')
        .classList
        .toggle('hidden');
}

document.addEventListener('click', function(event)
{
    const dropdown =
        document.getElementById('userDropdown');

    const button =
        event.target.closest('button');

    if (!button && dropdown)
    {
        dropdown.classList.add('hidden');
    }
});

</script>