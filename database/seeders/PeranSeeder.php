<?php

namespace Database\Seeders;

use App\Models\Peran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $daftarPeran = [
            'Admin',
            'Pegawai'
            // tambahkan peran lainnya
        ];

        foreach ($daftarPeran as $peran) {
            Peran::create([
                'nama_peran' => $peran,
            ]);
        }
    }
}
