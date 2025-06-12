{{-- @dd($reports) --}}

<x-Layout>
    <!-- Track Report Section -->
    <section class="bg-white dark:bg-gray-900 py-36">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white text-center mb-10 sm:text-4xl">
                Cek Status Laporan
            </h2>
            <div class="max-w-2xl mx-auto">
                <!-- Form to Input Report Code -->
                <form action="" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="report_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Kode Laporan
                        </label>
                        <input type="text" name="report_code" id="report_code" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2 text-sm text-gray-900 dark:text-white dark:bg-gray-700 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan kode laporan (contoh: RPT-20250608-ABC)" />
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


                <!-- Report Details (if found) -->
                @php
                    $report = (object) [
                        'report_code' => 'RPT123456',
                        'title' => 'Sampah Menumpuk di Halaman Belakang',
                        'description' => 'Terdapat tumpukan sampah di halaman belakang gedung kuliah yang belum dibersihkan selama 3 hari.',
                        'status' => 'pending', // 'in_progres' atau 'pending' / 'resolved'
                        'name' => 'Alif Fajriadi',
                        'phone' => '081234567890',
                        'file_path' => 'laporan/sampah123.jpg', // pastikan file dummy ada di storage
                        'created_at' => now(),
                        'comment' => 'Kami sudah coba membersihkann'
                    ];
                @endphp

                {{-- @if (isset($report)) --}}
                <div class="mt-10 bg-gray-50 dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                        Detail Laporan
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <span class="font-medium text-gray-700 dark:text-gray-300">Kode Laporan:</span>
                            <span class="text-gray-900 dark:text-gray-100">{{ $report->report_code }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700 dark:text-gray-300">Judul:</span>
                            <span class="text-gray-900 dark:text-gray-100">{{ $report->title }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700 dark:text-gray-300">Deskripsi:</span>
                            <p class="text-gray-900 dark:text-gray-100">{{ $report->description }}</p>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700 dark:text-gray-300">Status:</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                {{ ($report->status === 'pending' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300' :
    ($report->status === 'in_progress' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300' :
        'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300')) }}">
                                {{ ucfirst(str_replace('_', ' ', $report->status)) }}
                            </span>
                        </div>
                        @if ($report->name)
                            <div>
                                <span class="font-medium text-gray-700 dark:text-gray-300">Nama Pelapor:</span>
                                <span class="text-gray-900 dark:text-gray-100">{{ $report->name }}</span>
                            </div>
                        @endif
                        @if ($report->phone)
                            <div>
                                <span class="font-medium text-gray-700 dark:text-gray-300">Nomor Kontak:</span>
                                <span class="text-gray-900 dark:text-gray-100">{{ $report->phone }}</span>
                            </div>
                        @endif
                        @if ($report->file_path)
                            <div>
                                <span class="font-medium text-gray-700 dark:text-gray-300">File Terlampir:</span>
                                <a href="{{ asset('storage/' . $report->file_path) }}" target="_blank"
                                    class="text-blue-600 hover:underline dark:text-blue-400">
                                    Lihat File
                                </a>
                            </div>
                        @endif
                        @if ($report->comment)
                            <div>
                                <span class="font-medium text-gray-700 dark:text-gray-300">Komentar dari Admin:</span>
                                <span class="text-gray-900 dark:text-gray-100">{{ $report->comment }}</span>
                            </div>
                        @endif
                       
                        <div>
                            <span class="font-medium text-gray-700 dark:text-gray-300">Tanggal Laporan:</span>
                            <span
                                class="text-gray-900 dark:text-gray-100">{{ $report->created_at->format('d M Y, H:i') }}</span>
                        </div>
                        
                    </div>
                </div>
                {{-- @endif --}}
            </div>
        </div>
    </section>

    <!-- Error Modal -->
    @if (session('error'))
        <div id="error-modal" tabindex="-1" aria-hidden="true"
            class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-gray-900 bg-opacity-50">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                    <!-- Modal Header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Kode Laporan Tidak Ditemukan
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="error-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Tutup modal</span>
                        </button>
                    </div>
                    <!-- Modal Body -->
                    <div class="p-4 space-y-4">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            Kode laporan yang Anda masukkan tidak ditemukan. Silakan periksa kembali kode laporan Anda.
                        </p>
                    </div>
                    <!-- Modal Footer -->
                    <div
                        class="flex items-center justify-center p-4 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="error-modal" type="button"
                            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-Layout>