<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link id="favicon" rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 dark:bg-gray-800">

    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl px-5 flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('images/whitelogo.png') }}" class="h-8 md:h-12 hidden dark:block" alt="AspirasiKita" />
                <img src="{{ asset('images/logo.png') }}" class="h-8 md:h-12 dark:hidden" alt="AspirasiKita" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">AspirasiKita</span>
            </a>
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>

                    <img class="w-8 h-8 rounded-full" src="{{asset('storage/' . $foto)}}" alt=" user">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">{{$nama}}</span>
                        <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{$email}}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="/dashboard"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Beranda</a>
                        </li>
                        <li>
                            <a href="/konten"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Konten
                                Manajemen</a>
                        </li>
                        <li>
                            <a href="/laporan"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Laporan</a>
                        </li>

                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Logout
                                </button>
                            </form>

                        </li>
                    </ul>
                </div>
                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">

                    <li>
                        <a href="/dashboard"
                            class="block py-2 px-3 rounded-sm md:p-0
            {{ request()->is('dashboard') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:dark:text-blue-500' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700' }}"
                            aria-current="{{ request()->is('dashboard') ? 'page' : '' }}">Dashboard</a>
                    </li>

                    <li>
                        <a href="/konten"
                            class="block py-2 px-3 rounded-sm md:p-0
            {{ request()->is('konten') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:dark:text-blue-500' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700' }}">
                            Konten Edit</a>
                    </li>

                    <li>
                        <a href="/laporan"
                            class="block py-2 px-3 rounded-sm md:p-0
            {{ request()->is('laporan') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:dark:text-blue-500' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700' }}">
                            Laporan</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <section class="md:px-20 md:py-10 text-slate-50 dark:text-gray-900">
        {{$slot}}
    </section>
    <x-toast />
</body>
<script>
    const favicon = document.getElementById('favicon');

    function setFaviconBasedOnMode() {
        const isDark = document.documentElement.classList.contains('dark') ||
            window.matchMedia('(prefers-color-scheme: dark)').matches;

        const lightIcon = "{{ asset('images/logo.png') }}";
        const darkIcon = "{{ asset('images/whitelogo.png') }}";

        favicon.href = isDark ? darkIcon : lightIcon;
    }

    // Jalankan saat page load
    setFaviconBasedOnMode();

    // Deteksi perubahan preferensi sistem (opsional)
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', setFaviconBasedOnMode);

    // Atur ulang favicon saat toggle dark mode manual (jika ada tombol toggle)
    const observer = new MutationObserver(setFaviconBasedOnMode);
    observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
</script>


</html>