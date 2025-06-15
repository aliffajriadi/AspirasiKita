<x-Layout :alamat="$profile->alamat_kantor">
    <!-- Report Form Section -->
    <section class="bg-white dark:bg-gray-900 py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white text-center mb-10 sm:text-4xl">
                Lapor Keluhan dan Saran
            </h2>
            <div class="max-w-2xl mx-auto">
                <!-- Success Message -->
                @if (session('success'))
                    <div class="mb-6 text-sm text-green-600 dark:text-green-400">{{ session('success') }}</div>
                @endif

                <form action="/report" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('POST')
                    <!-- Name (Optional) -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nama (Opsional)
                        </label>
                        <input type="text" name="name" id="name"
                               class="mt-1 block w-full border border-gray-300 rounded-md p-2 text-sm text-gray-900 dark:text-white dark:bg-gray-700 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder="Masukkan nama Anda, atau anonim" />
                        @error('name')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contact Number (Optional) -->
                    <div>
                        <label for="phone_no" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nomor Kontak/Wa (Opsional, akan kirim notif lewat whatsapp)
                        </label>
                        <input type="tel" name="phone_no" id="phone_no"
                               class="mt-1 block w-full border border-gray-300 rounded-md p-2 text-sm text-gray-900 dark:text-white dark:bg-gray-700 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder="Contoh: 081234567890" />
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Complaint/Suggestion Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Judul Keluhan/Saran
                        </label>
                        <input type="text" name="title" id="title" required
                               class="mt-1 block w-full border border-gray-300 rounded-md p-2 text-sm text-gray-900 dark:text-white dark:bg-gray-700 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder="Masukkan judul keluhan atau saran" />
                        @error('title')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Kategori Laporan</label>
                        <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Kategori</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>

                    </div>

                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Lokasi perkara (opsional)
                        </label>
                        <textarea name="location" id="location" rows="5" required
                                  class="mt-1 block w-full border border-gray-300 rounded-md p-2 text-sm text-gray-900 dark:text-white dark:bg-gray-700 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                  placeholder="Detail tempat lokasi perkara"></textarea>
                        @error('location')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Complaint Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Deskripsi Keluhan/Saran
                        </label>
                        <textarea name="description" id="description" rows="5" required
                                  class="mt-1 block w-full border border-gray-300 rounded-md p-2 text-sm text-gray-900 dark:text-white dark:bg-gray-700 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                  placeholder="Jelaskan keluhan atau saran Anda"></textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Photo/File Upload -->
                    <div>
                        <label for="files" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Foto/File (Opsional)
                        </label>
                        <input type="file" name="files" id="files"
                               class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-gray-700 dark:file:text-blue-400 dark:hover:file:bg-gray-600"/>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                            Unggah file gambar (JPG, PNG, SVG, GIF) atau PDF (maks. 2MB)
                        </p>
                        @error('file')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit"
                                class="inline-flex items-center px-6 py-3 text-base font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 transition-all duration-200">
                            Kirim Laporan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Success Modal -->
    @if (session('report_code'))
        <div id="success-modal" tabindex="-1" aria-hidden="true"
             class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-gray-900/50 backdrop-blur-sm">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                    <!-- Modal Header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Laporan Berhasil Dikirim
                        </h3>
                        <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="success-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Tutup modal</span>
                        </button>
                    </div>
                    <!-- Modal Body -->
                    <div class="p-4 space-y-4">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            Laporan Anda telah berhasil dikirim. Simpan kode laporan berikut untuk memantau status laporan Anda:
                        </p>
                        <p class="text-lg font-bold text-gray-900 dark:text-white text-center">
                            Kode Laporan: {{ session('report_code') }}
                        </p>
                    </div>
                    <!-- Modal Footer -->
                    <div class="flex items-center justify-center p-4 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="success-modal" type="button"
                                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-Layout>