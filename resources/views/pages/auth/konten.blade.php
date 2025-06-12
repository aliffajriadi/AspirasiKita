<x-LayoutAuth title="Manajemen Konten" nama="auth()->user()->name" email="auth()->user()->email">
    <div class="w-full">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Konten Kelurahan</h1>
                <p class="text-gray-600 dark:text-gray-400">Kelola informasi dan data profil kelurahan</p>
            </div>

            <!-- Form Informasi Kelurahan -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 mb-8">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Informasi Kelurahan</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Edit dan perbarui data profil kelurahan</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                <svg class="w-3 h-3 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Aktif
                            </span>
                        </div>
                    </div>
                </div>

                <form class="p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Logo Kelurahan -->
                        <div class="lg:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Logo Kelurahan</label>
                            <div class="flex items-center space-x-6">
                                <div class="shrink-0">
                                    <img class="h-20 w-20 object-cover rounded-full border-4 border-blue-500" 
                                         src="https://via.placeholder.com/80x80/3B82F6/FFFFFF?text=LOGO" 
                                         alt="Logo Kelurahan">
                                </div>
                                <div class="flex-1">
                                    <input type="file" name="logo" accept="image/*" disabled
                                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-blue-900 dark:file:text-blue-300">
                                    <p class="text-xs text-gray-500 mt-1">PNG, JPG maksimal 2MB. Ukuran optimal 200x200px</p>
                                </div>
                            </div>
                        </div>

                        <!-- Nama Kelurahan -->
                        <div>
                            <label for="nama_kelurahan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Kelurahan</label>
                            <input type="text" id="nama_kelurahan" name="nama_kelurahan" value="{{ $user->nama_kelurahan }}" readonly
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <!-- Kecamatan -->
                        <div>
                            <label for="kecamatan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kecamatan</label>
                            <input type="text" id="kecamatan" name="{{ $user->nama_kecamatan }}" value="Batam Kota" readonly
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <!-- Kota -->
                        <div>
                            <label for="kota" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kota/Kabupaten</label>
                            <input type="text" id="kota" name="kota" value="{{ $user->nama_kota }}" readonly
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <!-- Provinsi -->
                        <div>
                            <label for="provinsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Provinsi</label>
                            <input type="text" id="provinsi" name="provinsi" value="{{ $user->nama_provinsi }}" readonly
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <!-- Alamat Kantor -->
                        <div class="lg:col-span-2">
                            <label for="alamat_kantor" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Alamat Kantor Kelurahan</label>
                            <textarea id="alamat_kantor" name="alamat_kantor" rows="3" readonly
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                      placeholder="Masukkan alamat lengkap kantor kelurahan">{{ $user->alamat_kantor }}</textarea>
                        </div>

                        <!-- Jumlah Penduduk -->
                        <div>
                            <label for="jumlah_penduduk" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jumlah Penduduk</label>
                            <div class="relative">
                                <input type="number" id="jumlah_penduduk" name="jumlah_penduduk" value="{{ $user->total_populasi }}" readonly
                                       class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <span class="absolute right-4 top-3 text-gray-500 dark:text-gray-400 text-sm">Jiwa</span>
                            </div>
                        </div>

                        <!-- Luas Wilayah -->
                        <div>
                            <label for="luas_wilayah" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Luas Wilayah</label>
                            <div class="relative">
                                <input type="number" step="0.1" id="luas_wilayah" name="luas_wilayah" value="{{ $user->luas_area }}" readonly
                                       class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <span class="absolute right-4 top-3 text-gray-500 dark:text-gray-400 text-sm">km²</span>
                            </div>
                        </div>

                        <!-- Jumlah RW -->
                        <div>
                            <label for="jumlah_rw" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jumlah RW</label>
                            <input type="number" id="jumlah_rw" name="jumlah_rw" value="{{ $user->jumlah_rw }}" readonly
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <!-- Jumlah RT -->
                        <div>
                            <label for="jumlah_rt" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jumlah RT</label>
                            <input type="number" id="jumlah_rt" name="jumlah_rt" value="{{ $user->jumlah_rt }}" readonly
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <!-- Kode Pos -->
                        <div>
                            <label for="kode_pos" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kode Pos</label>
                            <input type="text" id="kode_pos" name="kode_pos" value="29444" readonly
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <!-- No Telepon -->
                        <div>
                            <label for="no_telepon" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">No. Telepon Kantor</label>
                            <input type="tel" id="no_telepon" name="no_telepon" value="{{ $user->no_telp }}" readonly
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <!-- Email -->
                        <div class="lg:col-span-2">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" readonly
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <!-- Website -->
                        <div class="lg:col-span-2">
                            <label for="website" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Website (Opsional)</label>
                            <input type="url" id="website" name="website" value="{{ $user->website }}" readonly
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                   placeholder="https://example.com">
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-between pt-6 mt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            Terakhir diperbarui: {{ $user->updated_at }}
                        </div>
                        <div class="flex items-center space-x-3">
                            <button type="button" disabled
                                    class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 rounded-lg font-medium">
                                Reset
                            </button>
                            <button type="button" disabled
                                    class="px-6 py-3 bg-blue-600 text-white rounded-lg font-medium flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6a1 1 0 10-2 0v5.586l-1.293-1.293z"/>
                                    <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"/>
                                </svg>
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Preview Card -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Preview Tampilan</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Ini adalah tampilan yang akan terlihat di dashboard</p>
                </div>
                
                <div class="p-6">
                    <div class="text-center">
                        <div class="mb-4">
                            <img class="w-20 h-20 rounded-full mx-auto border-4 border-blue-500" 
                                 src="https://via.placeholder.com/80x80/3B82F6/FFFFFF?text=LOGO" 
                                 alt="Logo Kelurahan">
                        </div>
                        <h4 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Kelurahan Sungai Panas</h4>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Kecamatan Batam Kota, Kota Batam, Kepulauan Riau
                        </p>spo
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
            </div>
        </div>
    </div>
</x-LayoutAuth>