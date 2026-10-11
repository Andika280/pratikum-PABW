<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AgrilinkSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori')->insert([
            ['nama_kategori' => 'Sayuran Organik', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Buah-buahan', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Biji-bijian & Palawija', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $faker = Faker::create('id_ID');
        
        for ($i = 0; $i < 10; $i++) {
            DB::table('produk')->insert([
                'kategori_id' => $faker->numberBetween(1, 3), // Acak kategori dari 1 sampai 3
                'nama_produk' => $faker->randomElement(['Tomat Cherry', 'Cabai Rawit Merah', 'Bawang Merah', 'Padi Ciherang', 'Mangga Harum Manis', 'Jagung Manis', 'Kentang']),
                'harga_per_kg' => $faker->numberBetween(10000, 50000),
                'stok_kg' => $faker->numberBetween(20, 300),
                'deskripsi' => $faker->sentence(8),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}