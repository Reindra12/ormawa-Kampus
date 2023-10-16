<?php

namespace Database\Seeders;

use App\Models\JenisKegiatan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MahasiswaTableSeeder::class,
            OrmawaTableSeeder::class,
            JenisKegiatanSeeder::class,
            KegiatanSeeder::class,
            FakultasSeeder::class,
            ProdiSeeder::class,
            PelangganSeeder::class,
            TagihanSeeder::class
        ]);
    }
}
