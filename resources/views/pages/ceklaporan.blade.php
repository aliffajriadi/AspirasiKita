<x-Layout :alamat="$profile->alamat_kantor">
    <!-- Track Report Section -->
    <section class="bg-white dark:bg-gray-900 py-36">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white text-center mb-10 sm:text-4xl">
                Cek Status Laporan
            </h2>
            <div class="max-w-2xl mx-auto">
                <!-- Form to Input Report Code -->
                <form action="{{ route('reports.track') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="report_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Kode Laporan
                        </label>
                        <input type="text" name="report_code" id="report_code" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2 text-sm text-gray-900 dark:text-white dark:bg-gray-700 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan kode laporan (contoh: Lap-3XAMPLE)" title="Kode laporan hanya boleh berisi huruf besar, angka, dan tanda hubung" />
                        @error('report_code')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="inline-flex items-center px-6 py-3 text-base font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 transition-all duration-200">
                            Cek Laporan
                        </button>
                    </div>
                </form>

        
                @if (isset($report))
                    <div class="mt-10 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 transition-all duration-300">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2-12H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2z"></path>
                            </svg>
                            Detail Laporan
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                </svg>
                                <div>
                                    <span class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kode Laporan</span>
                                    <span class="text-gray-900 dark:text-gray-100 font-semibold">{{ e($report->code) }}</span>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                <div>
                                    <span class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul</span>
                                    <span class="text-gray-900 dark:text-gray-100 font-semibold">{{ e($report->title) }}</span>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3 sm:col-span-2">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                </svg>
                                <div>
                                    <span class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</span>
                                    <p class="text-gray-900 dark:text-gray-100">{{ e($report->description) }}</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <span class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</span>
                                    @php
                                        $statusMap = [
                                            0 => ['label' => 'Pending', 'classes' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300'],
                                            1 => ['label' => 'In Progress', 'classes' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300'],
                                            2 => ['label' => 'Completed', 'classes' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300'],
                                        ];
                                        $status = $statusMap[$report->status] ?? ['label' => 'Unknown', 'classes' => 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300'];
                                    @endphp
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $status['classes'] }}">
                                        {{ $status['label'] }}
                                    </span>
                                </div>
                            </div>
                            @if ($report->name)
                                <div class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <div>
                                        <span class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Pelapor</span>
                                        <span class="text-gray-900 dark:text-gray-100 font-semibold">{{ e($report->name) }}</span>
                                    </div>
                                </div>
                            @endif
                            @if ($report->phone)
                                <div class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <div>
                                        <span class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor Kontak</span>
                                        <span class="text-gray-900 dark:text-gray-100 font-semibold">{{ e($report->phone) }}</span>
                                    </div>
                                </div>
                            @endif
                            @if ($report->file_path)
                                <div class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.586-6.586a4 4 0 00-5.656-5.656l-6.586 6.586a6 6 0 008.486 8.486l6.586-6.586"></path>
                                    </svg>
                                    <div>
                                        <span class="block text-sm font-medium text-gray-700 dark:text-gray-300">File Terlampir</span>
                                        <a href="{{ asset('storage/' . $report->file_path) }}" target="_blank"
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 transition-all duration-200">
                                            Lihat File
                                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            @endif
                            @if ($report->comment)
                                <div class="flex items-start space-x-3 sm:col-span-2">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    <div>
                                        <span class="block text-sm font-medium text-gray-700 dark:text-gray-300">Komentar dari Admin</span>
                                        <span class="text-gray-900 dark:text-gray-100">{{ e($report->comment) }}</span>
                                    </div>
                                </div>
                            @endif
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <div>
                                    <span class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Laporan</span>
                                    <span class="text-gray-900 dark:text-gray-100 font-semibold">
                                        {{ $report->created_at->translatedFormat('d F Y, H:i') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                
            </div>
        </div>
    </section>

    
</x-Layout>