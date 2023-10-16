<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prodi::create([
            'nama_prodi' => 'Teknik Informasi',
            'status' => 'y',
            'id_fakultas' => '1',
        ]);

        Prodi::create([
            'nama_prodi' => 'RPL',
            'status' => 'y',
            'id_fakultas' => '1',
        ]);
    }
}
