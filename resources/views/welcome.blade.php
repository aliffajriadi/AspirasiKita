<x-Layout>
    <!-- Hero Section -->
    <section class="relative h-screen bg-cover bg-center opacity-30" style="background-image: url('{{ asset('images/bgHero.jpg') }}')">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-white dark:to-gray-900 opacity-100"></div>
    </section>
    <div class="absolute inset-0 z-10 flex items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-6 max-w-3xl mx-auto">
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-800 dark:text-white md:text-5xl lg:text-6xl">
                Sampaikan <span class="text-blue-600 dark:text-blue-500">aspirasimu.</span> Bantu kami membenahi lingkungan Kelurahan Mawar.
            </h1>
            <p class="text-lg font-normal text-gray-500 dark:text-gray-400 lg:text-xl">
                AspirasiKita adalah platform pelaporan warga Kelurahan Mawar. Laporkan keluhan, saran, atau permasalahan di lingkungan sekitar dengan mudah dan cepat.
            </p>
            <a href=""
               class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-white bg-gradient-to-br from-purple-600 to-blue-500 rounded-lg hover:from-purple-700 hover:to-blue-600 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 transition-all duration-200">
                Lapor Sekarang
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>

    <!-- About Kelurahan Section -->
    <section class="bg-white dark:bg-gray-900 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">
                    Tentang Kelurahan Mawar
                </h2>
                <p class="mt-4 text-lg text-gray-500 dark:text-gray-400 max-w-3xl mx-auto">
                    Kelurahan Mawar adalah komunitas dinamis di jantung kota, dengan populasi lebih dari 10.000 jiwa. Kami berkomitmen menciptakan lingkungan yang bersih, aman, dan nyaman bagi seluruh warga. Melalui platform AspirasiKita, kami mengundang partisipasi aktif warga untuk melaporkan masalah dan memberikan saran demi kemajuan bersama.
                </p>
            </div>

            <!-- Statistics -->
            @php
                $totalReports = 3;
                $resolvedReports = 3;
                $activeUsers = 150; // Placeholder for active users
            @endphp
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-50 dark:bg-gray-800 p-8 rounded-lg shadow-md text-center transition-transform hover:scale-105">
                    <h3 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $totalReports }}</h3>
                    <p class="mt-2 text-gray-500 dark:text-gray-400 text-lg">Total Laporan</p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 p-8 rounded-lg shadow-md text-center transition-transform hover:scale-105">
                    <h3 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $resolvedReports }}</h3>
                    <p class="mt-2 text-gray-500 dark:text-gray-400 text-lg">Laporan Selesai</p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 p-8 rounded-lg shadow-md text-center transition-transform hover:scale-105">
                    <h3 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $activeUsers }}</h3>
                    <p class="mt-2 text-gray-500 dark:text-gray-400 text-lg">Pengguna Aktif</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How to Report Section -->
    <section class="bg-blue-50 dark:bg-gray-800 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white text-center mb-12">
                Cara Melapor
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <h3 class="text-xl font-semibold text-blue-600 dark:text-blue-400 mb-3">1. Isi Form</h3>
                    <p class="text-gray-600 dark:text-gray-300">Tulis keluhan atau aspirasi lengkap dengan lokasi dan kategori.</p>
                </div>
                <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <h3 class="text-xl font-semibold text-blue-600 dark:text-blue-400 mb-3">2. Tunggu Tanggapan</h3>
                    <p class="text-gray-600 dark:text-gray-300">Laporanmu akan dibaca oleh admin Kelurahan dan diproses.</p>
                </div>
                <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <h3 class="text-xl font-semibold text-blue-600 dark:text-blue-400 mb-3">3. Lihat Status</h3>
                    <p class="text-gray-600 dark:text-gray-300">Pantau status laporanmu langsung dari sistem.</p>
                </div>
            </div>
            <div class="mt-12 text-center">
                <a href=""
                   class="inline-flex items-center px-6 py-3 text-base font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 transition-all duration-200">
                    Mulai Melapor
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
</x-Layout>