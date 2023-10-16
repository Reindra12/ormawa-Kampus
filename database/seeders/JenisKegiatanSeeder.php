<?php

namespace Database\Seeders;

use App\Models\JenisKegiatan;
use Illuminate\Database\Seeder;

class JenisKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisKegiatan::create([
            'nama_jenis_kegiatan' => 'Kegiatan',
            'gambar_jenis_kegiatan' => 'seminar.png',

        ]);

        JenisKegiatan::create([
            'nama_jenis_kegiatan' => 'Absensi',
            'gambar_jenis_kegiatan' => 'absen.png',

        ]);
    }


}
