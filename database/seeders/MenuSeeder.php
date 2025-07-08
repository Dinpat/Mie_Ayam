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
        DB::table('menu')->insert([
        ['nama_menu' => 'Mie Ayam Original', 'harga' => 12000],
        ['nama_menu' => 'Mie Ayam Bakso', 'harga' => 15000],
        ['nama_menu' => 'Mie Ayam Ceker', 'harga' => 16000]
    ]);
    }
}
