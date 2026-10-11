<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LaporanSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        for ($i = 0; $i < 15; $i++) {
            DB::table('laporan')->insert([
                'nama_pelapor' => $faker->name,
                'lokasi' => $faker->randomElement(['Dayeuhkolot', 'Baleendah', 'Bojongsoang', 'Rancaekek', 'Majalaya']),
                'tinggi_genangan' => $faker->numberBetween(10, 150),
                'tanggal_kejadian' => $faker->dateTimeThisMonth()->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}