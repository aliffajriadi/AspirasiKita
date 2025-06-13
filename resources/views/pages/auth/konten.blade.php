<x-LayoutAuth title="Manajemen Konten" :nama="$user->nama_kelurahan" :email="$user->email" :foto="$user->profile_pic">
    <div class="w-full">
        <div class="p-6 border-2 border-gray-200 border-dashed rounded-xl dark:border-gray-700">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
                    <svg class="w-6 h-6 mr-2 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2-12H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2z"></path>
                    </svg>
                    Manajemen Konten Kelurahan
                </h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Kelola informasi dan data profil kelurahan</p>
            </div>

            <!-- Form Informasi Kelurahan -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 mb-8">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Informasi Kelurahan</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Edit dan perbarui data profil kelurahan</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full dark:bg-blue-900 dark:text-blue-300 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Aktif
                            </span>
                        </div>
                    </div>
                </div>

                <form action="/konten/update" method="POST" enctype="multipart/form-data" class="p-6">
                    @csrf
                    @method('PATCH')
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Logo Kelurahan -->
                        <div class="lg:col-span-2">
                            <label for="logo" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Foto Landing Page Kelurahan</label>
                            <div class="flex items-center space-x-6">
                                <div class="shrink-0">
                                    <img class="h-20 w-20 object-cover rounded-full border-4 border-blue-500" 
                                         src="{{ asset('storage/' . $user->profile_pic) }}" 
                                         alt="Logo Kelurahan {{ e($user->nama_kelurahan) }}">
                                </div>
                                <div class="flex-1">
                                    <input type="file" id="logo" name="profile_pic" accept="image/png,image/jpeg"
                                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-blue-900 dark:file:text-blue-300">
                                    @error('logo')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                    <p class="text-xs text-gray-500 mt-1">PNG, JPG maksimal 2MB. Ukuran optimal 200x200px</p>
                                </div>
                            </div>
                        </div>

                        <!-- Nama Kelurahan -->
                        <div>
                            <label for="nama_kelurahan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Kelurahan</label>
                            <input type="text" id="nama_kelurahan" name="nama_kelurahan" value="{{ old('nama_kelurahan', $user->nama_kelurahan) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            @error('nama_kelurahan')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kecamatan -->
                        <div>
                            <label for="kecamatan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kecamatan</label>
                            <input type="text" id="kecamatan" name="kecamatan" value="{{ old('kecamatan', $user->nama_kecamatan) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            @error('kecamatan')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kota -->
                        <div>
                            <label for="kota" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kota/Kabupaten</label>
                            <input type="text" id="kota" name="kota" value="{{ old('kota', $user->nama_kota) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            @error('kota')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Provinsi -->
                        <div>
                            <label for="provinsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Provinsi</label>
                            <input type="text" id="provinsi" name="provinsi" value="{{ old('provinsi', $user->nama_provinsi) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            @error('provinsi')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Alamat Kantor -->
                        <div class="lg:col-span-2">
                            <label for="alamat_kantor" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Alamat Kantor Kelurahan</label>
                            <textarea id="alamat_kantor" name="alamat_kantor" rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-600 focus:outline-none"
                                placeholder="Masukkan alamat lengkap kantor kelurahan">{{ old('alamat_kantor', $user->alamat_kantor) }}</textarea>
                            @error('alamat_kantor')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jumlah Penduduk -->
                        <div>
                            <label for="jumlah_penduduk" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jumlah Penduduk</label>
                            <div class="relative">
                                <input type="number" id="jumlah_penduduk" name="total_populasi" value="{{ old('jumlah_penduduk', $user->total_populasi) }}" min="1"
                                       class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <span class="absolute right-4 top-3 text-sm text-gray-500 dark:text-gray-400">Jiwa</span>
                                @error('jumlah_penduduk')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Luas Wilayah -->
                        <div>
                            <label for="luas_wilayah" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Luas Wilayah</label>
                            <div class="relative">
                                <input type="number" step="0.1" id="luas_wilayah" name="luas_wilayah" value="{{ old('luas_wilayah', $user->luas_area) }}" min="0"
                                       class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <span class="absolute right-4 top-3 text-sm text-gray-500 dark:text-gray-400">km²</span>
                                @error('luas_wilayah')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Jumlah RW -->
                        <div>
                            <label for="jumlah_rw" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jumlah RW</label>
                            <input type="number" id="jumlah_rw" name="jumlah_rw" value="{{ old('jumlah_rw', $user->jumlah_rw) }}" min="1"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            @error('jumlah_rw')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jumlah RT -->
                        <div>
                            <label for="jumlah_rt" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jumlah RT</label>
                            <input type="number" id="jumlah_rt" name="jumlah_rt" value="{{ old('jumlah_rt', $user->jumlah_rt) }}" min="1"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            @error('jumlah_rt')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kode Pos -->
                        <div>
                            <label for="kode_pos" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kode Pos</label>
                            <input type="text" id="kode_pos" name="kode_pos" value="{{ old('kode_pos', $user->kode_pos) }}"
                                   pattern="[0-9]{5}" title="Kode pos harus terdiri dari 5 angka"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            @error('kode_pos')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- No Telepon -->
                        <div>
                            <label for="no_telepon" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">No. Telepon Kantor</label>
                            <input type="tel" id="no_telepon" name="no_telp" value="{{ old('no_telepon', $user->no_telp) }}"
                                    title="Nomor telepon harus terdiri dari 10-12 angka"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            @error('no_telepon')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="lg:col-span-2">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Website -->
                        <div class="lg:col-span-2">
                            <label for="website" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Website (Opsional)</label>
                            <input type="url" id="website" name="website" value="{{ old('website', $user->website) }}"
                                   placeholder="https://example.com"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            @error('website')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-between pt-6 mt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            Terakhir diperbarui: {{ $user->updated_at->translatedFormat('d F Y, H:i') }}
                        </div>
                        <div class="flex items-center space-x-3">
                            <button type="reset"
                                    class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 rounded-lg font-medium hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200">
                                Reset
                            </button>
                            <button type="submit"
                                    class="px-6 py-3 bg-blue-600 text-white rounded-lg font-medium flex items-center hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all duration-200">
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
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-3 3 3 0 011 3zM3 21l4.5-4.5M21 3l-6 6m2-2l4 5-9 9-5-5 9-9z"></path>
                        </svg>
                        Preview Tampilan
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Tampilan yang akan terlihat di dashboard</p>
                </div>
                <div class="p-6">
                    <div class="text-center">
                        <div class="mb-4">
                            <img class="w-20 h-20 rounded-lg mx-auto border-4 border-blue-600 dark:border-blue-800" 
                                 src="{{ asset('storage/' . $user->profile_pic) }}"
                                 alt="Logo Kelurahan {{ e($user->nama_kelurahan) }}">
                        </div>
                        <h4 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ e($user->nama_kelurahan) }}</h4>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            {{ e($user->kecamatan) }}, {{ e($user->kota) }}, {{ e($user->provinsi) }}
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-sm">
                                <p class="font-semibold text-gray-900 dark:text-white flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m0 0l-6-3m6 3l6-3m-6-12a7.5 7.5 0 110 15 7.5 7.5 0 010-15z"></path>
                                    </svg>
                                    Jumlah Penduduk
                                </p>
                                <p class="text-gray-600 dark:text-gray-400">{{ number_format($user->total_populasi, 0, ',', '.') }} Jiwa</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-sm">
                                <p class="font-semibold text-gray-900 dark:text-white flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 11l3-3m0 0l3 3m-3-3v8m0-13a9 9 0 110 18 9 9 0 010-18z"></path>
                                    </svg>
                                    Luas Wilayah
                                </p>
                                <p class="text-gray-600 dark:text-gray-400">{{ number_format($user->luas_wilayah, 2, ',', '.') }} km²</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-sm">
                                <p class="font-semibold text-gray-900 dark:text-white flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2-12H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2z"></path>
                                    </svg>
                                    Jumlah RW/RT
                                </p>
                                <p class="text-gray-600 dark:text-gray-400">{{ $user->jumlah_rw }} RW / {{ $user->jumlah_rt }} RT</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-LayoutAuth>
