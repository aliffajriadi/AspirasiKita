<x-LayoutAuth title="Dashboard" nama="Admin" email="admin@gmail.com">
    <div class="w-full">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <!-- Welcome Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Dashboard Admin</h1>
                <p class="text-gray-600 dark:text-gray-400">Kelola laporan masyarakat dengan mudah</p>
            </div>

            
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Total Laporan -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900">
                            <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a2 2 0 002 2h8a2 2 0 002-2V3a2 2 0 012 2v6h-3a3 3 0 00-3 3v4a1 1 0 01-1 1H6a2 2 0 01-2-2V5z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-5">
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $fr_count + $ufr_count }}</p>
                            <p class="text-gray-600 dark:text-gray-400 font-medium">Total Laporan</p>
                            <p class="text-sm text-gray-500 dark:text-gray-500">Sejak awal tahun</p>
                        </div>
                    </div>
                </div>

                <!-- Laporan Belum Diselesaikan -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-orange-100 dark:bg-orange-900">
                            <svg class="w-8 h-8 text-orange-600 dark:text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-5">
                            <p class="text-3xl font-bold text-orange-600 dark:text-orange-400">{{ $ufr_count }}</p>
                            <p class="text-gray-600 dark:text-gray-400 font-medium">Belum Diselesaikan</p>
                            <p class="text-sm text-gray-500 dark:text-gray-500">Memerlukan tindakan</p>
                        </div>
                    </div>
                </div>

                <!-- Laporan Sudah Diselesaikan -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 dark:bg-green-900">
                            <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-5">
                            <p class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $fr_count }}</p>
                            <p class="text-gray-600 dark:text-gray-400 font-medium">Sudah Diselesaikan</p>
                            <p class="text-sm text-gray-500 dark:text-gray-500">Berhasil ditangani</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Section -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 mb-8">
                <div class="text-center">
                    <div class="mb-4">
                        <img class="w-20 h-20 rounded-full mx-auto border-4 border-blue-500" src="https://via.placeholder.com/80x80/3B82F6/FFFFFF?text=LOGO" alt="Logo Kelurahan">
                    </div>
                

                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $user->nama_kelurahan }}</h2>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $user->nama_kecamatan }}, {{ $user->nama_kota }}, {{ $user->nama_provinsi }}</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                        <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                            <p class="font-semibold text-gray-900 dark:text-white">Jumlah Penduduk</p>
                            <p class="text-gray-600 dark:text-gray-400">{{ $user->total_populasi }} Jiwa</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                            <p class="font-semibold text-gray-900 dark:text-white">Luas Wilayah</p>
                            <p class="text-gray-600 dark:text-gray-400">{{ $user->luas_area }} km²</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                            <p class="font-semibold text-gray-900 dark:text-white">Jumlah RW/RT</p>
                            <p class="text-gray-600 dark:text-gray-400">{{ $user->jumlah_rw }} RW / {{ $user->jumlah_rt }} RT</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Laporan Belum Selesai Table -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Laporan Belum Diselesaikan</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Daftar laporan yang memerlukan tindakan segera</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="bg-orange-100 text-orange-800 text-xs font-medium px-3 py-1 rounded-full dark:bg-orange-900 dark:text-orange-300">{{ $ufr_count }} Laporan</span>

                            <a href="/laporan" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 text-sm font-medium bg-blue-50 dark:bg-blue-900 px-3 py-1 rounded-lg transition-colors">
                                Lihat Semua
                            </a>

                            <button type="button" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 text-sm font-medium bg-blue-50 dark:bg-blue-900 px-3 py-1 rounded-lg transition-colors">
                                Lihat Semua
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-4">ID Laporan</th>
                                <th scope="col" class="px-6 py-4">Pelapor</th>
                                <th scope="col" class="px-6 py-4">Kategori</th>
                                <th scope="col" class="px-6 py-4">Judul Laporan</th>
                                <th scope="col" class="px-6 py-4">Lokasi</th>
                                <th scope="col" class="px-6 py-4">Tanggal</th>
                                <th scope="col" class="px-6 py-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($unfinished_reports as $report)
                            
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $report->code }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-xs font-medium mr-3">
                                            AS
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900 dark:text-white">{{ $report->name === null ? 'anonymous' : $report->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $report->phone_no === null ? 'anonymous' : $report->phone_no }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="bg-{{ $report->category->color }}-100 text-{{ $report->category->color }}-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-{{ $report->category->color }}-900 dark:text-{{ $report->category->color }}-300">Infrastruktur</span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="font-medium text-gray-900 dark:text-white">{{ $report->title }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $report->description }}</p>
                                </td>
                                <td class="px-6 py-4">{{ $report->location === null ? '-' : $report->location }}</td>
                                <td class="px-6 py-4">
                                    <p class="text-gray-900 dark:text-white">{{ $report->created_at }}</p>
                                    <p class="text-xs text-gray-500">14:30 WIB</p>
                                </td>
                
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button type="button" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 text-xs bg-blue-50 dark:bg-blue-900 px-2 py-1 rounded">Detail</button>
                                        <button type="button" class="text-green-600 hover:text-green-800 dark:text-green-400 text-xs bg-green-50 dark:bg-green-900 px-2 py-1 rounded">Proses</button>
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer -->
                <div class="p-4 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600">
                    <div class="flex items-center justify-between">
              

                        {{ $unfinished_reports->links() }}
{{-- 
                        <div class="flex items-center space-x-2">
                            <button class="px-3 py-1 text-sm bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600">Previous</button>
                            <button class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700">1</button>
                            <button class="px-3 py-1 text-sm bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600">2</button>
                            <button class="px-3 py-1 text-sm bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600">Next</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Dashboard functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Auto refresh data setiap 30 detik
            setInterval(function() {
                // Bisa ditambahkan AJAX call untuk refresh data
                console.log('Auto refresh data...');
            }, 30000);

            // Handle button clicks
            document.querySelectorAll('button[data-action="detail"]').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const laporanId = this.getAttribute('data-id');
                    // Handle detail view
                    console.log('View detail untuk laporan:', laporanId);
                });
            });

            document.querySelectorAll('button[data-action="process"]').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const laporanId = this.getAttribute('data-id');
                    // Handle process action
                    console.log('Proses laporan:', laporanId);
                });
            });
        });
    </script>
    @endpush
</x-LayoutAuth>