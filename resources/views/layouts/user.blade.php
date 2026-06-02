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

                <a href="#"
                   class="text-slate-300 transition hover:text-white">

                    Dashboard

                </a>

                <a href="{{ route('user.matches') }}"
                   class="text-slate-300 transition hover:text-white">

                    Matches

                </a>

                <a href="#"
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

                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-600 font-bold text-white">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

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