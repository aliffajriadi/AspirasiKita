<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use function PHPSTORM_META\map;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'email' => 'sungaipanas@gmail.com',
            'password' => Hash::make('password'),
            'nama_kelurahan' => 'Kelurahan Sungai Panas',
            'nama_kecamatan' => 'Kecamatan Batam Kota',
            'nama_kota' => 'Kota Batam',
            'nama_provinsi' => 'Kepulauan Riau',
            'alamat_kantor' => 'Jl. Sungai Panas Raya No. 25, Batam Kota, Kota Batam, Kepulauan Riau 29444',
            'total_populasi'=> '15234',
            'luas_area' => 12.5,
            'jumlah_rw' => 8,
            'jumlah_rt' => 45,
            'no_telp' => '0778-123456',
            'kode_pos' => 29444
        ]);

        Category::insert([
            ['name' => 'Infrastruktur', 'color' => 'red'],
            ['name' => 'Lingkungan', 'color' => 'blue'],
            ['name' => 'Keamanan', 'color' => 'orange'],
            ['name' => 'Fasilitas', 'color' => 'cyan']
        ]);
    }
}
