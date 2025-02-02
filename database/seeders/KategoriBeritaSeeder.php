<?php

namespace Database\Seeders;

use App\Models\KategoriBerita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $daftarKategoriBerita = [
            'Teknologi',
            'Pendidikan',
            'Politik'
        ];

        foreach ($daftarKategoriBerita as $kategori) {
            KategoriBerita::create([
                'nama_kategori' => $kategori
            ]);
        }
    }
}
