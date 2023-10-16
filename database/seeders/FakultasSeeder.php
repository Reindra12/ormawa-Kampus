<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fakultas::create([
            'nama_fakultas' => 'Teknik Informatika',
            'status' => 'y',

        ]);

        Fakultas::create([
            'nama_fakultas' => 'Teknik Elektro',
            'status' => 'y',

        ]);
    }
}
