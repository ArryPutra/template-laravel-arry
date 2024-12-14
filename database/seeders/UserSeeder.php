<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Arry Kusuma Putra',
            'nama_pengguna' => 'arrykusumaputra',
            'password' => Hash::make('password123'),
            'peran_id' => 1
        ]);
        User::create([
            'nama' => 'Raju Adha Dani',
            'nama_pengguna' => 'rajuadhadani',
            'password' => Hash::make('password123'),
            'peran_id' => 2
        ]);
        foreach (range(25, 1) as $pegawai) {
            User::create([
                'nama' => fake()->name(),
                'nama_pengguna' => fake()->unique()->userName(),
                'password' => Hash::make('password123'),
                'peran_id' => 2
            ]);
        }
    }
}
