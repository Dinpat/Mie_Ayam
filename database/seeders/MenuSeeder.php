<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
        ['nama' => 'Mie Ayam Original', 'harga' => 12000, 'deskripsi' => 'Mie ayam'],
        ['nama' => 'Mie Ayam Bakso', 'harga' => 15000, 'deskripsi' => 'Mie ayam'],
        ['nama' => 'Mie Ayam Ceker', 'harga' => 16000, 'deskripsi' => 'Mie ayam']
    ]);
    }
}
